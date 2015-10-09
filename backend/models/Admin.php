<?php
namespace backend\models;

use funson86\auth\models\AuthRole;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * User model
 *
 * @property integer $id
 * @property string $name
 * @property string $birthdate
 * @property string $address
 * @property string $image
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $role
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
class Admin extends \common\models\Admin
{
    public $password;
    public $repassword;
    public $oldpassword;
    private $_statusLabel;
    private $_roleLabel;
    private $_authRoleLabel;
    public $file;

    /**
     * @inheritdoc
     */
    public function getStatusLabel()
    {
        if ($this->_statusLabel === null) {
            $statuses = self::getArrayStatus();
            $this->_statusLabel = $statuses[$this->status];
        }
        return $this->_statusLabel;
    }

    /**
     * @inheritdoc
     */
    public static function getArrayStatus()
    {
        return [
            self::STATUS_ACTIVE => Yii::t('app', 'STATUS_ACTIVE'),
            self::STATUS_INACTIVE => Yii::t('app', 'STATUS_INACTIVE'),
        ];
    }

    public static function getArrayRole()
    {
        return ArrayHelper::map(Yii::$app->authManager->getRoles(), 'name', 'description');
    }

    public function getRoleLabel()
    {

        if ($this->_roleLabel === null) {
            $roles = self::getArrayRole();
            $this->_roleLabel = $roles[$this->role];
        }
        return $this->_roleLabel;
    }

    public static function getArrayAuthRole()
    {
        return ArrayHelper::map(AuthRole::find()->all(), 'id', 'name');
    }

    public function getAuthRoleLabel()
    {

        if ($this->_authRoleLabel === null) {
            $roles = self::getArrayAuthRole();
            $this->_authRoleLabel = $this->auth_role ? $roles[$this->auth_role] : '-';
        }
        return $this->_authRoleLabel;
    }

    /**
      * @inheritdoc
      */
    public function rules()
    {
        return [
            [['username', 'email'], 'required', 'on' => ['admin-create', 'admin-update']],
            [['password', 'repassword'], 'required', 'on' => ['admin-create']],
            [['password', 'repassword', 'oldpassword'], 'required', 'on' => ['admin-change-password']],
            [['username', 'email', 'password', 'repassword'], 'trim', 'on' => ['admin-create', 'admin-update']],
            [['password', 'repassword'], 'string', 'min' => 6, 'max' => 30, 'on' => ['admin-create', 'admin-update']],
            [['password', 'repassword', 'oldpassword'], 'string', 'min' => 6, 'max' => 30, 'on' => ['admin-change-password']],
            // Unique
            [['username', 'email'], 'unique', 'on' => ['admin-create', 'admin-update']],
            // Username
            ['username', 'match', 'pattern' => '/^[a-zA-Z0-9_-]+$/', 'on' => ['admin-create', 'admin-update']],
            ['username', 'string', 'min' => 3, 'max' => 30, 'on' => ['admin-create', 'admin-update']],
            // E-mail
            ['email', 'string', 'max' => 100, 'on' => ['admin-create', 'admin-update']],
            ['email', 'email', 'on' => ['admin-create', 'admin-update']],
            // Repassword
            ['repassword', 'compare', 'compareAttribute' => 'password'],
            //['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_INACTIVE, self::STATUS_DELETED]],

            // Status
            //['role', 'in', 'range' => array_keys(self::getArrayRole())],
            ['oldpassword', 'validateOldPassword', 'on' => ['admin-change-password']],

            [['file', 'birthdate'], 'safe'],
            [['file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg', 'maxSize' => 1024*1024],
            ['name', 'string', 'max' => 30],
            [['address','image'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        return [
            'admin-create' => ['name', 'address', 'birthdate','username', 'email', 'password', 'repassword', 'status', 'auth_role'],
            'admin-update' => ['name', 'address', 'birthdate', 'email', 'password', 'repassword', 'status', 'auth_role'],
            'admin-change-password' => ['oldpassword', 'password', 'repassword'],
            'admin-delete' => ['status'],
            'admin-inactive' => ['status'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        $labels = parent::attributeLabels();

        return array_merge(
            $labels,
            [
                'password' => 'Password',
                'repassword' => 'Confirm Password',
                'oldpassword' => 'Old Password',
                'file' => 'Profile Picture',
            ]
        );
    }

    /**
     * @inheritdoc
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord || (!$this->isNewRecord && $this->password)) {
                $this->setPassword($this->password);
                $this->generateAuthKey();
                $this->generatePasswordResetToken();
            }
            return true;
        }
        return false;
    }


    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validateOldPassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = self::findOne(Yii::$app->user->identity->id);
            if (!$user || !$user->validatePassword($this->oldpassword)) {
                $this->addError($attribute, 'Incorrect old password.');
            }
        }
    }


}
