<?php

namespace common\models;

use Yii;
use yii\base\Model;

/**
 * Information form
 */
class InformationForm extends Model {

    public $first_name;
    public $last_name;
    public $delivery_address;
    public $delivery_contact;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            // username and password are both required
            [['delivery_address', 'delivery_contact'], 'required'],
            [['first_name','last_name','delivery_address', 'delivery_contact'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'first_name' => 'Nama Pertama',
            'last_name' => 'Nama Terakhir',
            'delivery_address' => 'Alamat',
            'delivery_contact' => 'Kontak',
        ];
    }

}
