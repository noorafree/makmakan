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
            [['first_name','last_name', 'delivery_address', 'delivery_contact'], 'required'],
            [['first_name','last_name'], 'string','max'=>30],
            [['delivery_contact'], 'string', 'max' => 15],
            ['delivery_contact', 'match', 'pattern' => '/^[0-9]+$/'],
            [['first_name','last_name', 'delivery_address', 'delivery_contact'], 'safe'],
        ];
    }
    
    public function valid()
    {
        if ($this->validate()) {
            $user = new InformationForm();
            $user->first_name = $this->first_name;
            $user->last_name = $this->last_name;
            $user->delivery_address = $this->delivery_address;
            $user->delivery_contact = $this->delivery_contact;
        }
        return null;
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
