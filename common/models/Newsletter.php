<?php

namespace common\models;

use Yii;
use common\models\Status;

/**
 * This is the model class for table "newsletter".
 *
 * @property integer $id
 * @property string $subject
 * @property string $message
 * @property string $created_by
 * @property string $created_date
 * @property string $last_modified_by
 * @property string $last_modified_date
 * @property integer $status
 */
class Newsletter extends \yii\db\ActiveRecord
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
        return 'newsletter';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['subject', 'message', 'created_by', 'created_date', 'last_modified_by', 'last_modified_date', 'status'], 'required'],
            [['subject', 'message'], 'string'],
            [['created_date', 'last_modified_date'], 'safe'],
            [['status'], 'integer'],
            [['created_by', 'last_modified_by'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'subject' => 'Subject',
            'message' => 'Message',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'last_modified_by' => 'Last Modified By',
            'last_modified_date' => 'Last Modified Date',
            'status' => 'Status',
        ];
    }
}
