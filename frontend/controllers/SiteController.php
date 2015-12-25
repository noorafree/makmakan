<?php

namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\widgets\ActiveForm;
use common\models\User;
use mcms\cart\Cart;
use yii\web\UploadedFile;

/**
 * Site controller
 */
class SiteController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex() {
        return $this->render('index');
    }

    /**
     * Renders Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin() {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if (!$model->load(Yii::$app->request->post())) {
            return $this->renderAjax('login', [
                        'model' => $model,
            ]);
        }
    }

    public function actionSubmitLogin() {
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->login()) {
                echo "success";
            } else {
                echo "Incorrect email or password.";
            }
        }
    }

    /**
     * Render Signs user up.
     *
     * @return mixed
     */
    public function actionSignup() {
        $model = new SignupForm();
        $model->setScenario('user-create');
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = 'json';
            return ActiveForm::validate($model);
        } else {
            return $this->renderAjax('signup', [
                        'model' => $model,
            ]);
        }
    }

    public function actionSubmitSignup() {
        $model = new SignupForm();
        $model->setScenario('user-create');
        $submitResponse[] = '';
        if ($model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = 'json';
            if ($model->validate() && $model->signup()) {
                $model->sendEmailActivation();
                $submitResponse = ['isSuccess' => true,
                    'message' => 'Registrasi Berhasil, Silahkan aktifkan akun anda melalui email.'];
                return $submitResponse;
            } else {
                $submitResponse = ['isSuccess' => false,
                    'message' => 'Registrasi Gagal'];
                echo $submitResponse;
            }
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact() {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout() {
        return $this->render('about');
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset() {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
//                return $this->refresh();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
                    'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token) {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
//            Yii::$app->session->setFlash('success', 'New password was saved.');
            return $this->render('resetPasswordVerification');
        }

        return $this->render('resetPassword', [
                    'model' => $model,
        ]);
    }

    public function actionProduct() {
        if (!isset($_GET['Search'])) {
            $_GET['Search'] = '';
        }
        $searchModel = new \common\models\ProductSearch();

        $dataProvider = $searchModel->searchBy($_GET['Search']);

        return $this->render('product', array(
                    'dataProvider' => $dataProvider,
        ));
    }

    public function actionDetail($id) {
        $product = \common\models\Product::findOne($id);

        $productForm = new \common\models\ProductForm();
        $productForm->id = $product->id;
        $productForm->name = $product->name;
        $productForm->description = $product->description;
        $productForm->price = $product->selling_price;
        $productForm->filename = $product->productPhotos[0]->id;

        if ($productForm->load(Yii::$app->request->post())) {
           $productForm->attributes = Yii::$app->request->post();
            $this->addToCart($productForm);
            
            Yii::$app->response->redirect(array('cart/cart'));
        }

        return $this->render('detail', array(
                    'product' => $product,
                    'productForm' => $productForm
        ));
    }
    
    public function actionTest() {
        $model = new \common\models\ProductForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($this->addToCart($model)) {
                echo "success";
            } else {
                echo "Incorrect email or password.";
            }
        }
    }

    /**
     * activate user.
     *
     * @param string $code
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionUserActivation($code) {
//        try {
//            $model = new ResetPasswordForm($token);
//        } catch (InvalidParamException $e) {
//            throw new BadRequestHttpException($e->getMessage());
//        }
        $user = User::findByActivationCode($code);
        if ($user != NULL) {
            $user->setScenario('user-update-status');
            $user->status = User::STATUS_ACTIVE;
            if ($user->save()) {
//                Yii::$app->session->setFlash('success', 'Aktifasi User Berhasil.');
            } else {
//                Yii::$app->session->setFlash('error', 'Aktifasi User Gagal.');
            }
            return $this->render("userVerification");
        } else {
            Yii::$app->session->setFlash('error', 'Aktifasi User Sudah melebihi batas waktu.');
            return $this->render("userVerification");
        }
    }

    public function addToCart($productForm) {
        $cart = new \common\models\Cart();

        $data = array(
            'id' => $productForm->id,
            'qty' => $productForm->quantity,
            'price' => $productForm->price,
            'name' => $productForm->name,
            'options' => array('Featured' => 'L', 'Nope' => 'Red')
        );

        $cart->insert($data);
    }

    public function actionProfile() {
        $model = User::findOne(Yii::$app->user->id);
        $model->setScenario('user-update');
//        $model = $model->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            $model->modified_by = $model->email;
            $model->modified_date = date('Y-m-d h:m:s');
            $imageName = substr(md5(rand()), 0, 7);
            if (UploadedFile::getInstance($model, 'file')) {
                $model->file = UploadedFile::getInstance($model, 'file');
                $model->image_path = 'uploads/user/' . $model->file->baseName . $imageName . '.' . $model->file->extension;
            }

            if ($model->save()) {
                if($model->file!= null){
                    $basePath = str_replace(DIRECTORY_SEPARATOR.'protected', "", str_replace('frontend', '', Yii::$app->basePath));
                    $uploadDir = 'backend' . DIRECTORY_SEPARATOR . 'web' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'user' . DIRECTORY_SEPARATOR;
                    
                    $model->file->saveAs($basePath . $uploadDir . $model->file->baseName . $imageName . '.' . $model->file->extension);
                }
                Yii::$app->session->setFlash('success', 'Update Success.');
            }else{
                Yii::$app->session->setFlash('error', 'Update Failed. Cannot Save Data');
            }
        }
        
        return $this->render('userProfile', [
            'model' => $model,
        ]);
    }

    /**
     * Finds the Faq model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Faq the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
