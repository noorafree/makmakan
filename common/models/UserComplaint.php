<?php

namespace common\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "user_complaint".
 *
 * @property integer $id
 * @property string $description
 * @property integer $user_id
 * @property string $complaint_type
 * @property string $created_by
 * @property string $created_date
 * @property string $modified_by
 * @property string $modified_date
 * @property integer $status
 */
class UserComplaint extends \yii\db\ActiveRecord {

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
        return 'user_complaint';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['description', 'user_id', 'complaint_type', 'created_by', 'modified_by', 'status'], 'required'],
            [['description', 'complaint_type'], 'string'],
            [['user_id', 'status'], 'integer'],
            [['created_date', 'modified_date'], 'safe'],
            [['created_by', 'modified_by'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'description' => 'Description',
            'user_id' => 'User ID',
            'complaint_type' => 'Complaint Type',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'modified_by' => 'Modified By',
            'modified_date' => 'Modified Date',
            'status' => 'Status',
            'username' => Yii::t('app', 'Username')
        ];
    }
    
    /* ActiveRelation */

    public function getUser() {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /* Getter for user name */

    public function getUsername() {
        return $this->user->username;
    }
}
