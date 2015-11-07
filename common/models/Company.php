<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property integer $id
 * @property integer $slider_amount
 * @property string $title
 * @property string $name
 * @property string $about_us
 * @property string $phone
 * @property string $address
 * @property string $longitude
 * @property string $latitude
 * @property string $twitter_url
 * @property string $facebook_url
 * @property string $instagram_url
 * @property string $gplus_url
 * @property string $terms_and_condition
 * @property string $purchasing_guide
 * @property string $payment_guide
 * @property string $delivery_guide
 * @property string $return_policy
 * @property string $privacy_policy
 * @property string $logo_path
 * @property string $favicon_path
 * @property string $created_by
 * @property string $created_date
 * @property string $last_modified_by
 * @property string $last_modified_date
 */
class Company extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'company';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['slider_amount'], 'integer'],
            [['about_us', 'terms_and_condition', 'purchasing_guide', 'payment_guide', 'delivery_guide', 'return_policy', 'privacy_policy', 'meta_tag', 'meta_description'], 'string'],
            [['created_by', 'last_modified_by'], 'required'],
            [['created_date', 'last_modified_date'], 'safe'],
            [['title', 'name', 'created_by', 'last_modified_by'], 'string', 'max' => 30],
            [['phone'], 'string', 'max' => 15],
            [['address', 'longitude', 'latitude', 'twitter_url', 'facebook_url', 'instagram_url', 'gplus_url', 'logo_path', 'favicon_path'], 'string', 'max' => 100],
            [['email_1', 'email_2'], 'string', 'max' => 50],
            [['email_1', 'email_2'], 'email']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'slider_amount' => 'Slider Amount',
            'title' => 'Title',
            'name' => 'Name',
            'about_us' => 'About Us',
            'phone' => 'Phone',
            'address' => 'Address',
            'longitude' => 'Longitude',
            'latitude' => 'Latitude',
            'twitter_url' => 'Twitter Url',
            'facebook_url' => 'Facebook Url',
            'instagram_url' => 'Instagram Url',
            'gplus_url' => 'Gplus Url',
            'terms_and_condition' => 'Terms And Condition',
            'purchasing_guide' => 'Purchasing Guide',
            'payment_guide' => 'Payment Guide',
            'delivery_guide' => 'Delivery Guide',
            'return_policy' => 'Return Policy',
            'privacy_policy' => 'Privacy Policy',
            'logo_path' => 'Logo Path',
            'favicon_path' => 'Favicon Path',
            'email_1' => 'Email 1',
            'email_2' => 'Email 2',
            'meta_tag' => 'Meta Tag',
            'meta_description' => 'Meta Description',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'last_modified_by' => 'Last Modified By',
            'last_modified_date' => 'Last Modified Date',
        ];
    }

}
