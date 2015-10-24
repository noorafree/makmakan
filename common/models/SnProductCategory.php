<?php

namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "sn_product_category".
 *
 * @property integer $id
 * @property string $category
 * @property integer $status
 * @property string $created_by
 * @property string $created_date
 * @property string $modified_by
 * @property string $modified_date
 */
class SnProductCategory extends \yii\db\ActiveRecord {

    const STATUS_DELETED = -1;
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;

    private $_statusLabel;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'sn_product_category';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['category', 'status', 'created_by', 'modified_by'], 'required'],
            [['status'], 'integer'],
            [['created_date', 'modified_date'], 'safe'],
            [['category'], 'string', 'max' => 100],
            [['created_by', 'modified_by'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'category' => 'Category',
            'status' => 'Status',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'modified_by' => 'Modified By',
            'modified_date' => 'Modified Date',
        ];
    }

    /**
     * @inheritdoc
     */
    public static function getArrayStatus() {
        return [
            self::STATUS_ACTIVE => Yii::t('app', 'STATUS_ACTIVE'),
            self::STATUS_INACTIVE => Yii::t('app', 'STATUS_INACTIVE'),
            self::STATUS_DELETED => Yii::t('app', 'STATUS_DELETED'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function getStatusLabel() {
        if ($this->_statusLabel === null) {
            $statuses = self::getArrayStatus();
            $this->_statusLabel = $statuses[$this->status];
        }
        return $this->_statusLabel;
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
        return [
            'sn-product-category-create' => ['category', 'status'],
            'sn-product-category-update' => ['category', 'status'],
            'sn-product-category-delete' => ['status'],
            'sn-product-category-inactive' => ['status'],
        ];
    }

}
