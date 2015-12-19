<?php

namespace common\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class ProductForm extends Model {

    public $id;
    public $name;
    public $description;
    public $filename;
    public $quantity;
    public $price;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            // username and password are both required
            [['id', 'name', 'quantity'], 'required'],
            [['quantity'], 'number', 'min' => 1],
            [['price'], 'string', 'max' => 18],
            [['filename', 'description'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'quantity' => 'Qty',
            'price' => 'Price',
        ];
    }
}
