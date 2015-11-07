<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Company;

/**
 * CompanySearch represents the model behind the search form about `common\models\Company`.
 */
class CompanySearch extends Company {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'slider_amount'], 'integer'],
            [['title', 'name', 'about_us', 'phone', 'address', 'longitude', 'latitude', 'twitter_url', 'facebook_url', 'instagram_url', 'gplus_url', 'terms_and_condition', 'purchashing_guide', 'payment_guide', 'delivery_guide', 'return_policy', 'privacy_policy', 'logo_path', 'favicon_path', 'created_by', 'created_date', 'last_modified_by', 'last_modified_date', 'email_1', 'email_2', 'meta_tag', 'meta_description'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params) {
        $query = Company::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'slider_amount' => $this->slider_amount,
            'created_date' => $this->created_date,
            'last_modified_date' => $this->last_modified_date,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
                ->andFilterWhere(['like', 'name', $this->name])
                ->andFilterWhere(['like', 'about_us', $this->about_us])
                ->andFilterWhere(['like', 'phone', $this->phone])
                ->andFilterWhere(['like', 'address', $this->address])
                ->andFilterWhere(['like', 'longitude', $this->longitude])
                ->andFilterWhere(['like', 'latitude', $this->latitude])
                ->andFilterWhere(['like', 'twitter_url', $this->twitter_url])
                ->andFilterWhere(['like', 'facebook_url', $this->facebook_url])
                ->andFilterWhere(['like', 'instagram_url', $this->instagram_url])
                ->andFilterWhere(['like', 'gplus_url', $this->gplus_url])
                ->andFilterWhere(['like', 'terms_and_condition', $this->terms_and_condition])
                ->andFilterWhere(['like', 'purchashing_guide', $this->purchashing_guide])
                ->andFilterWhere(['like', 'payment_guide', $this->payment_guide])
                ->andFilterWhere(['like', 'delivery_guide', $this->delivery_guide])
                ->andFilterWhere(['like', 'return_policy', $this->return_policy])
                ->andFilterWhere(['like', 'privacy_policy', $this->privacy_policy])
                ->andFilterWhere(['like', 'logo_path', $this->logo_path])
                ->andFilterWhere(['like', 'favicon_path', $this->favicon_path])
                ->andFilterWhere(['like', 'email_1', $this->email_1])
                ->andFilterWhere(['like', 'email_2', $this->email_2])
                ->andFilterWhere(['like', 'meta_tag', $this->meta_tag])
                ->andFilterWhere(['like', 'meta_description', $this->meta_description])
                ->andFilterWhere(['like', 'created_by', $this->created_by])
                ->andFilterWhere(['like', 'last_modified_by', $this->last_modified_by]);

        return $dataProvider;
    }

}
