<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_review".
 *
 * @property integer $id
 * @property string $description
 * @property integer $stars
 * @property integer $product_id
 * @property integer $user_id
 * @property integer $sn_review_id
 * @property string $created_by
 * @property string $created_date
 * @property string $modified_by
 * @property string $modified_date
 * @property integer $status
 *
 * @property Product $product
 * @property SnReview $snReview
 */
class ProductReview extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_review';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description', 'stars', 'product_id', 'user_id', 'sn_review_id', 'created_by', 'modified_by', 'status'], 'required'],
            [['description'], 'string'],
            [['stars', 'product_id', 'user_id', 'sn_review_id', 'status'], 'integer'],
            [['created_date', 'modified_date'], 'safe'],
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
            'description' => 'Description',
            'stars' => 'Stars',
            'product_id' => 'Product ID',
            'user_id' => 'User ID',
            'sn_review_id' => 'Sn Review ID',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSnReview()
    {
        return $this->hasOne(SnReview::className(), ['id' => 'sn_review_id']);
    }
}
