<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "advertisement".
 *
 * @property integer $id
 * @property integer $amount
 * @property string $start_date
 * @property string $end_date
 * @property string $advertisement_type
 * @property integer $advertiser_id
 * @property integer $status
 * @property string $created_by
 * @property string $created_date
 * @property string $modified_by
 * @property string $modified_date
 */
class Advertisement extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'advertisement';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['amount', 'advertisement_type', 'advertiser_id', 'status', 'created_by', 'modified_by'], 'required'],
            [['amount', 'advertiser_id', 'status'], 'integer'],
            [['start_date', 'end_date', 'created_date', 'modified_date'], 'safe'],
            [['advertisement_type'], 'string'],
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
            'amount' => 'Amount',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'advertisement_type' => 'Advertisement Type',
            'advertiser_id' => 'Advertiser ID',
            'status' => 'Status',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'modified_by' => 'Modified By',
            'modified_date' => 'Modified Date',
        ];
    }
}
