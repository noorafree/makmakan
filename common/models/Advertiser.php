<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "advertiser".
 *
 * @property integer $id
 * @property string $name
 * @property string $address
 * @property string $phone
 * @property string $mobile
 * @property string $email
 * @property string $company
 * @property integer $status
 * @property string $created_by
 * @property string $created_date
 * @property string $modified_by
 * @property string $modified_date
 */
class Advertiser extends \yii\db\ActiveRecord {

    private $_status;

    public function getStatus() {
        if ($this->_status === null) {
            $this->_status = new Status($this->status);
        }
        return $this->_status;
    }

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'advertiser';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name', 'address', 'mobile', 'email', 'company', 'status', 'created_by', 'modified_by'], 'required'],
            [['status'], 'integer'],
            [['created_date', 'modified_date'], 'safe'],
            [['name', 'email', 'company'], 'string', 'max' => 50],
            [['address'], 'string', 'max' => 255],
            [['phone', 'mobile'], 'string', 'max' => 15],
            [['created_by', 'modified_by'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'address' => 'Address',
            'phone' => 'Phone',
            'mobile' => 'Mobile',
            'email' => 'Email',
            'company' => 'Company',
            'status' => 'Status',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'modified_by' => 'Modified By',
            'modified_date' => 'Modified Date',
        ];
    }

}
