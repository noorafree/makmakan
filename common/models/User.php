<?php

namespace common\models;

use Yii;

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
 */
class User extends \yii\db\ActiveRecord
{
    private $_status;
    public $file;

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
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'birthdate', 'mobile', 'username', 'sex', 'address', 'featured', 'auth_key', 'password_hash', 'email', 'created_by', 'modified_by'], 'required'],
            [['birthdate', 'last_login_date', 'created_date', 'modified_date'], 'safe'],
            [['sex', 'address'], 'string'],
            [['featured', 'makmakan_credit', 'sn_bank_id', 'status'], 'integer'],
            [['first_name', 'last_name'], 'string', 'max' => 30],
            [['phone', 'mobile'], 'string', 'max' => 15],
            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['image_path'], 'string', 'max' => 200],
            [['bank_account_number', 'bank_account_name', 'created_by', 'modified_by'], 'string', 'max' => 50],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
            [['file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg', 'maxSize' => 1024*1024, 'maxFiles' => 1],
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
            'mobile' => 'Mobile',
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
        ];
    }
}
