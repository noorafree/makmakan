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
    
    private $_status;

    public function getStatus()
    {
        if ($this->_status === null) {
            $this->_status = new Status($this->status);
        }
        return $this->_status;
    }

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

}
