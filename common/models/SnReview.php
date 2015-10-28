<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sn_review".
 *
 * @property integer $id
 * @property string $review
 * @property string $icon_path
 * @property string $created_by
 * @property string $created_date
 * @property string $modified_by
 * @property string $modified_date
 * @property integer $status
 */
class SnReview extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sn_review';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['review', 'icon_path', 'created_by', 'modified_by', 'status'], 'required'],
            [['created_date', 'modified_date'], 'safe'],
            [['status'], 'integer'],
            [['review'], 'string', 'max' => 50],
            [['icon_path'], 'string', 'max' => 255],
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
            'review' => 'Review',
            'icon_path' => 'Icon Path',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'modified_by' => 'Modified By',
            'modified_date' => 'Modified Date',
            'status' => 'Status',
        ];
    }
}
