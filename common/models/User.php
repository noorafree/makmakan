<?php

namespace common\models;

use Yii;
use yii\base\NotSupportedException;
//use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $birthdate
 * @property string $phone
 * @property string $mobile
 * @property string $username
 * @property string $sex
 * @property string $last_login_date
 * @property string $image_path
 * @property string $address
 * @property integer $featured
 * @property integer $makmakan_credit
 * @property string $bank_account_number
 * @property string $bank_account_name
 * @property integer $sn_bank_id
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property string $created_date
 * @property string $modified_date
 * @property string $created_by
 * @property string $modified_by
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 * @property string $activation_code
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    private $_status;
    public $file;
    public $password;
    public $repassword;
    const STATUS_DELETED = -1;
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    

    public function getStatus()
    {
        if ($this->_status === null) {
            $this->_status = new Status($this->status);
        }
        return $this->_status;
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }
    
        /**
     * @inheritdoc
     */
//    public function behaviors()
//    {
//        return [
//            TimestampBehavior::className(),
//        ];
//    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'mobile', 'email', 'created_by', 'modified_by'], 'required','on'=>['user-create','default','user-update']],
            [['birthdate', 'last_login_date', 'created_date', 'modified_date'], 'safe','on'=>['default']],
            [['sex', 'address'], 'string','on'=>['default','user-update']],
            [['featured', 'makmakan_credit', 'sn_bank_id', 'status'], 'integer','on'=>['default','user-update']],
            [['first_name', 'last_name'], 'string', 'max' => 30,'on'=>['user-create','default','user-update']],
            [['phone', 'mobile'], 'string', 'max' => 15,'on'=>['user-create','default','user-update']],
            [['username', 'password_hash', 'password_reset_token','activation_code'], 'string', 'max' => 255,'on'=>['user-create','default']],
            [['image_path'], 'string', 'max' => 200,'on'=>['default','user-update']],
            [['bank_account_number', 'bank_account_name', 'created_by', 'modified_by'], 'string', 'max' => 50,'on'=>['default','user-update']],
            [['auth_key'], 'string', 'max' => 32,'on'=>['user-create','default']],
            [['username'], 'unique'],
            [['email'], 'unique','on'=>['user-create','default','user-update']],
            [['password_reset_token'], 'unique','on'=>['user-create']],
            [['activation_code'],'unique','on'=>['user-create']],
            [['file'], 'safe','on'=>['default','user-update']],
            [['file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg', 'maxSize' => 1024*1024, 'maxFiles' => 1,'on'=>['default','user-update']],
            ['status', 'default', 'value' => self::STATUS_INACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_INACTIVE, self::STATUS_DELETED]],
            [['password','repassword'],'required','on'=>['user-create','default']],
            ['repassword','compare','compareAttribute'=>'password','on'=>['user-create','default']],
            [['password', 'repassword'], 'string', 'min' => 6, 'max' => 30,'on'=>['user-create','default']],
            // Username
            ['username', 'match', 'pattern' => '/^[a-zA-Z0-9_-]+$/'],
            ['username', 'string', 'min' => 3, 'max' => 30],
            // E-mail
            ['email', 'string', 'max' => 100,'on'=>['user-create','default','user-update']],
            ['email', 'email','on'=>['user-create','default','user-update']],
        ];
    }

     /**
     * @inheritdoc
     */
    public function scenarios()
    {
        return [
            'default'=>['first_name','last_name', 'mobile', 'email', 'created_by', 'modified_by','status','auth_key','password_hash', 
                'password_reset_token','activation_code','password','repassword', 'birthdate','sex', 'address','phone', 'mobile','image_path',
                'bank_account_number', 'bank_account_name','file','featured', 'makmakan_credit', 'sn_bank_id'],
            'user-create'=>['first_name', 'mobile', 'email', 'created_by', 'modified_by','status',
                'auth_key','password_hash', 'password_reset_token','activation_code','password','repassword'],
            'user-update'=>['first_name','last_name', 'mobile', 'email', 'birthdate','sex', 'address','phone', 'mobile','image_path',
                'bank_account_number', 'bank_account_name','file','featured', 'sn_bank_id','file'],
            'user-update-status' => ['status'],
            'user-request-password-reset'=>['password_reset_token'],
            'user-reset-password'=>['password','repassword'],
        ];
    }
    
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'birthdate' => 'Birthdate',
            'phone' => 'Phone',
            'mobile' => 'Handphone',
            'username' => 'Username',
            'sex' => 'Sex',
            'last_login_date' => 'Last Login Date',
            'image_path' => 'Image Path',
            'address' => 'Address',
            'featured' => 'Featured',
            'makmakan_credit' => 'Makmakan Credit',
            'bank_account_number' => 'Bank Account Number',
            'bank_account_name' => 'Bank Account Name',
            'sn_bank_id' => 'Sn Bank ID',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_date' => 'Created Date',
            'modified_date' => 'Modified Date',
            'created_by' => 'Created By',
            'modified_by' => 'Modified By',
            'password' => 'Password',
            'repassword' => 'Confirm Password',
            'file' => 'Profile Picture',
            'activation_code' => 'Activation Code',
        ];
    }
    
       /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return boolean
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }
    
     /**
     * @return \yii\db\ActiveQuery
     */
    public function getBank()
    {
        return $this->hasOne(\common\models\SnBank::className(), ['id' => 'sn_bank_id']);
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
     * @return \yii\db\ActiveQuery
     */
    public function getSnBank() {
        return $this->hasOne(SnBank::className(), ['id' => 'sn_bank_id']);
    }
    
    /**
     * Generates new activation code
     */
    public function generateUserActivationCode()
    {
        $this->activation_code = Yii::$app->security->generateRandomString() . '_' . time();
    }
    
     /**
     * Finds out if user activation is valid
     *
     * @param string $code for activation
     * @return boolean
     */
    public static function isUserActivationCodeValid($code)
    {
        if (empty($code)) {
            return false;
        }

        $timestamp = (int) substr($code, strrpos($code, '_') + 1);
        $expire = Yii::$app->params['user.activationCodeExpire'];
        return $timestamp + ($expire * 24) >= time();
    }
    
    public static function findByActivationCode($code)
    {
//        if (!static::isUserActivationCodeValid($code)) {
//            return null;
//        }

        return static::findOne([
            'activation_code' => $code,
            'status' => self::STATUS_INACTIVE,
        ]);
    }
    
     /**
     * Finds user by email
     *
     * @param string $email
     * @return static|null
     */
    public static function findUserByEmail($email)
    {
        return static::findOne(['email' => $email, 'status' => self::STATUS_ACTIVE]);
    }
    
}
