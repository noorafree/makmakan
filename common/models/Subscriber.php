<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "subscriber".
 *
 * @property integer $id
 * @property string $email
 * @property string $created_by
 * @property string $created_date
 * @property string $modified_by
 * @property string $modified_date
 * @property integer $status
 */
class Subscriber extends \yii\db\ActiveRecord
{
    
    private $_status;

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
        return 'subscriber';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'created_by', 'modified_by', 'status'], 'required'],
            [['created_date', 'modified_date'], 'safe'],
            [['status'], 'integer'],
            [['email'], 'string', 'max' => 50],
            [['created_by', 'modified_by'], 'string', 'max' => 30],
            [['email'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'modified_by' => 'Modified By',
            'modified_date' => 'Modified Date',
            'status' => 'Status',
        ];
    }
}
