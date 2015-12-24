<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property string $plu
 * @property string $name
 * @property integer $selling_price
 * @property integer $sn_product_category_id
 * @property integer $user_id
 * @property integer $seen
 * @property integer $sold
 * @property integer $stock
 * @property string $po_start_date
 * @property string $po_end_date
 * @property string $expired_date
 * @property integer $is_non_halal
 * @property integer $minimum_order
 * @property integer $is_ready_for_order
 * @property integer $featured
 * @property string $description
 * @property string $meta_tag
 * @property string $meta_description
 * @property string $created_by
 * @property string $created_date
 * @property string $modified_by
 * @property string $modified_date
 * @property integer $status
 *
 * @property SnProductCategory $snProductCategory
 * @property ProductPhoto[] $productPhotos
 * @property ProductReview[] $productReviews
 */
class Product extends \yii\db\ActiveRecord {

    const YES = 0;
    const NO = 1;
    const YES_LITERAL = 'Yes';
    const NO_LITERAL = 'No';
    const READY_STOCK = 'Ready Stock';
    const READY_ORDER = 'Ready Order';
    const PURCHASE_ORDER = 'Purchase Order';
    
    public $files;

    public function getNonHalal() {
        return ($this->is_non_halal) ? self::NO_LITERAL : self::YES_LITERAL;
    }

    public function getFeatured() {
        return ($this->featured) ? self::NO_LITERAL : self::YES_LITERAL;
    }

    private $_status;

    public function getStatus() {
        if ($this->_status === null) {
            $this->_status = new Status($this->status);
        }
        return $this->_status;
    }

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['plu', 'name', 'selling_price', 'sn_product_category_id', 'selling_type', 'user_id', 'seen', 'sold', 'is_non_halal', 'featured', 'meta_tag', 'meta_description', 'created_by', 'modified_by', 'status'], 'required'],
            [['selling_price', 'sn_product_category_id', 'user_id', 'seen', 'sold', 'stock', 'expired_time', 'is_non_halal', 'minimum_order', 'featured', 'status'], 'integer'],
            [['selling_type', 'description', 'meta_tag', 'meta_description'], 'string'],
            [['po_start_date', 'po_end_date', 'expired_date', 'created_date', 'modified_date'], 'safe'],
            [['plu'], 'string', 'max' => 10],
            [['name'], 'string', 'max' => 50],
            [['created_by', 'modified_by'], 'string', 'max' => 30],
            [['files'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg', 'maxSize' => 1024 * 1024, 'maxFiles' => 10],
        ];
    }

    public function scenarios() {
        return [
            'product-create' => ['plu', 'name', 'selling_price', 'selling_type', 'sn_product_category_id', 'user_id', 'seen', 'sold', 'stock', 'po_start_date', 'po_end_date', 'expired_date', 'is_non_halal', 'minimum_order', 'featured', 'description', 'meta_tag', 'meta_description', 'created_by', 'modified_by', 'status'],
            'product-update' => ['plu', 'name', 'selling_price', 'selling_type', 'sn_product_category_id', 'user_id', 'seen', 'sold', 'stock', 'po_start_date', 'po_end_date', 'expired_date', 'is_non_halal', 'minimum_order', 'featured', 'description', 'meta_tag', 'meta_description', 'created_by', 'modified_by', 'status'],
            'product-status' => ['status'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'plu' => 'Plu',
            'name' => 'Name',
            'selling_price' => 'Selling Price',
            'sn_product_category_id' => 'Product Category',
            'selling_type' => 'Selling Type',
            'user_id' => 'User ID',
            'seen' => 'Seen',
            'sold' => 'Sold',
            'stock' => 'Stock',
            'po_start_date' => 'Po Start Date',
            'po_end_date' => 'Po End Date',
            'expired_date' => 'Expired Date',
            'expired_time' => 'Expired Time',
            'is_non_halal' => 'Non Halal',
            'minimum_order' => 'Minimum Order',
            'featured' => 'Featured',
            'description' => 'Description',
            'meta_tag' => 'Meta Tag',
            'meta_description' => 'Meta Description',
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
    public function getIngredients() {
        return $this->hasMany(Ingredients::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSnProductCategory() {
        return $this->hasOne(SnProductCategory::className(), ['id' => 'sn_product_category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductPhotos() {
        return $this->hasMany(ProductPhoto::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductReviews() {
        return $this->hasMany(ProductReview::className(), ['product_id' => 'id']);
    }

}
