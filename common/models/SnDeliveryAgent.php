<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sn_delivery_agent".
 *
 * @property integer $id
 * @property string $delivery_agent
 * @property string $created_by
 * @property string $created_date
 * @property string $modified_by
 * @property string $modified_date
 * @property integer $status
 */
class SnDeliveryAgent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sn_delivery_agent';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['delivery_agent', 'created_by', 'modified_by', 'status'], 'required'],
            [['created_date', 'modified_date'], 'safe'],
            [['status'], 'integer'],
            [['delivery_agent'], 'string', 'max' => 50],
            [['created_by', 'modified_by'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'delivery_agent' => 'Delivery Agent',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'modified_by' => 'Modified By',
            'modified_date' => 'Modified Date',
            'status' => 'Status',
        ];
    }
}
