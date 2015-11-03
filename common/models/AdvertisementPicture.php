<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "advertisement_picture".
 *
 * @property integer $id
 * @property integer $advertisement_id
 * @property string $image_path
 * @property string $image_link
 * @property integer $hit
 * @property integer $advertisement_picture_order
 * @property integer $status
 * @property string $created_by
 * @property string $created_date
 * @property string $modified_by
 * @property string $modified_date
 */
class AdvertisementPicture extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'advertisement_picture';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['advertisement_id', 'image_path', 'image_link', 'advertisement_picture_order', 'status', 'created_by', 'modified_by'], 'required'],
            [['advertisement_id', 'hit', 'advertisement_picture_order', 'status'], 'integer'],
            [['created_date', 'modified_date'], 'safe'],
            [['image_path', 'image_link'], 'string', 'max' => 255],
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
            'advertisement_id' => 'Advertisement ID',
            'image_path' => 'Image Path',
            'image_link' => 'Image Link',
            'hit' => 'Hit',
            'advertisement_picture_order' => 'Advertisement Picture Order',
            'status' => 'Status',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'modified_by' => 'Modified By',
            'modified_date' => 'Modified Date',
        ];
    }
}
