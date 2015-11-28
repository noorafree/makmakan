<?php
namespace frontend\models;

use common\models\User;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends User
{
    public $username;
    public $email;
    public $password;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 3, 'max' => 30],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 100],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            ['repassword','compare','compareAttribute'=>'password'],
            [['password', 'repassword'], 'string', 'min' => 6, 'max' => 30],
            // Username
            ['username', 'match', 'pattern' => '/^[a-zA-Z0-9_-]+$/'],
            
            [['first_name'], 'required'],
            [['mobile'], 'string', 'max' => 15],
            ['mobile', 'match', 'pattern' => '/^[0-9]+$/'],
            
            ['status', 'default', 'value' => self::STATUS_INACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_INACTIVE, self::STATUS_DELETED]],
            
        ];
    }

    /**
     * Signs admin up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->created_by = $this->username;
            $user->modified_by = $this->username;
            $user->email = $this->email;
            $user->password = $this->password;
            $user->repassword = $this->repassword;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            $user->first_name = $this->first_name;
            $user->last_name = $this->last_name;
            $user->mobile = $this->mobile;
            $user->status = self::STATUS_INACTIVE;
            $user->generateUserActivationCode();
            if ($user->save()) {
                return $user;
            }
        }
        return null;
    }
    
    public function sendEmailActivation(){
        /* @var $user User */
        $user = User::findOne([
            'status' => User::STATUS_INACTIVE,
            'email' => $this->email,
        ]);

        if ($user) {
            if (!User::isUserActivationCodeValid($user->activation_code)) {
                $user->generateUserActivationCode();
            }

            return \Yii::$app->mailer->compose(['html' => 'userActivation-html', 'text' => 'userActivation-text'], ['user' => $user])
                ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name . ' robot'])
                ->setTo($this->email)
                ->setSubject('Aktifasi Akun untuk ' . \Yii::$app->name)
                ->send();
        }

        return false;
    }
}
