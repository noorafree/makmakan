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
 *
 * @property ProductReview[] $productReviews
 */
class SnReview extends \yii\db\ActiveRecord
{
    public $file;
    
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
            [['review', 'icon_path', 'created_by', 'created_date', 'modified_by', 'modified_date', 'status'], 'required'],
            [['created_date', 'file', 'modified_date'], 'safe'],
            [['status'], 'integer'],
            [['review'], 'string', 'max' => 50],
            [['icon_path'], 'string', 'max' => 100],
            [['created_by', 'modified_by'], 'string', 'max' => 30],
            [['file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg', 'maxSize' => 1024*1024],
        ];
    }
    
    public function scenarios()
    {
        return [
            'sn-review-create' => ['file', 'review', 'icon_path', 'created_by', 'created_date', 'modified_by', 'modified_date', 'status'],            
            'sn-review-update' => ['review', 'icon_path', 'modified_by', 'modified_date', 'status'],            
            'sn-review-status' => ['status'],
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
            'file' => 'Icon File',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductReviews()
    {
        return $this->hasMany(ProductReview::className(), ['sn_review_id' => 'id']);
    }
}
