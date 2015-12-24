<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_photo".
 *
 * @property integer $id
 * @property string $image_path
 * @property string $caption
 * @property integer $product_id
 * @property integer $product_photo_order
 * @property string $created_by
 * @property string $created_date
 * @property string $modified_by
 * @property string $modified_date
 * @property integer $status
 *
 * @property Product $product
 */
class ProductPhoto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_photo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['image_path', 'caption', 'product_id', 'product_photo_order', 'created_by', 'modified_by', 'status'], 'required'],
            [['product_id', 'product_photo_order', 'status'], 'integer'],
            [['created_date', 'modified_date'], 'safe'],
            [['image_path', 'caption'], 'string', 'max' => 100],
            [['created_by', 'last_modified_by'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image_path' => 'Image Path',
            'caption' => 'Caption',
            'product_id' => 'Product ID',
            'product_photo_order' => 'Product Photo Order',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'modified_by' => 'Modified By',
            'modified_date' => 'Modified Date',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
}
