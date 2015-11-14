<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "carousel".
 *
 * @property integer $id
 * @property integer $is_target_self
 * @property integer $carousel_order
 * @property string $image_path
 * @property string $image_link
 * @property string $caption
 * @property integer $status
 * @property string $created_by
 * @property string $created_date
 * @property string $modified_by
 * @property string $modified_date
 */
class Carousel extends \yii\db\ActiveRecord
{
    public $file;
    public $isSelfTarget;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'carousel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['is_target_self', 'carousel_order', 'image_path', 'status', 'created_by', 'modified_by'], 'required'],
            [['is_target_self', 'carousel_order', 'status'], 'integer'],
            [['created_date', 'modified_date'], 'safe'],
            [['image_path', 'image_link', 'caption'], 'string', 'max' => 255],
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
            'is_target_self' => 'Is Target Self',
            'carousel_order' => 'Carousel Order',
            'image_path' => 'Image Path',
            'image_link' => 'Image Link',
            'caption' => 'Caption',
            'status' => 'Status',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'modified_by' => 'Modified By',
            'modified_date' => 'Modified Date',
        ];
    }
}
