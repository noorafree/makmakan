<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sn_bank".
 *
 * @property integer $id
 * @property string $bank
 * @property integer $is_disabled
 * @property integer $is_deleted
 * @property string $created_date
 * @property string $created_by
 * @property string $modified_date
 * @property string $modified_by
 */
class SnBank extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sn_bank';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bank', 'is_disabled', 'is_deleted', 'created_by', 'modified_by'], 'required'],
            [['is_disabled', 'is_deleted'], 'integer'],
            [['created_date', 'modified_date'], 'safe'],
            [['bank'], 'string', 'max' => 50],
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
            'bank' => 'Bank',
            'is_disabled' => 'Is Disabled',
            'is_deleted' => 'Is Deleted',
            'created_date' => 'Created Date',
            'created_by' => 'Created By',
            'modified_date' => 'Modified Date',
            'modified_by' => 'Modified By',
        ];
    }
}
