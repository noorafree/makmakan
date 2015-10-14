<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "faq".
 *
 * @property integer $id
 * @property string $question
 * @property string $answer
 * @property integer $faq_order
 * @property integer $is_disabled
 * @property integer $is_deleted
 * @property string $created_by
 * @property string $created_date
 * @property string $modified_by
 * @property string $modified_date
 */
class Faq extends \yii\db\ActiveRecord
{
    const YES = 0;
    const NO = 1;

    public function getIsDisabled()
    {
        return array(
            self::YES => 'Yes',
            self::NO =>'No',
        );
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'faq';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['question', 'answer', 'is_disabled', 'is_deleted', 'created_by', 'modified_by'], 'required'],
            [['question', 'answer'], 'string'],
            [['faq_order', 'is_disabled', 'is_deleted'], 'integer'],
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
            'question' => 'Question',
            'answer' => 'Answer',
            'faq_order' => 'Faq Order',
            'is_disabled' => 'Disabled',
            'is_deleted' => 'Status',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'modified_by' => 'Modified By',
            'modified_date' => 'Modified Date',
        ];
    }
}
