<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Product;

/**
 * ProductSearch represents the model behind the search form about `common\models\Product`.
 */
class ProductSearch extends Product
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'selling_price', 'sn_product_category_id', 'user_id', 'seen', 'sold', 'stock', 'is_po', 'is_non_halal', 'minimum_order', 'is_ready_for_order', 'featured', 'status'], 'integer'],
            [['plu', 'name', 'po_start_date', 'po_end_date', 'expired_date', 'description', 'meta_tag', 'meta_description', 'created_by', 'created_date', 'modified_by', 'modified_date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
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
    public function search($params)
    {
        $query = Product::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query->where(['status' => [Status::STATUS_ACTIVE, Status::STATUS_INACTIVE]]),
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'selling_price' => $this->selling_price,
            'sn_product_category_id' => $this->sn_product_category_id,
            'user_id' => $this->user_id,
            'seen' => $this->seen,
            'sold' => $this->sold,
            'stock' => $this->stock,
            'is_po' => $this->is_po,
            'po_start_date' => $this->po_start_date,
            'po_end_date' => $this->po_end_date,
            'expired_date' => $this->expired_date,
            'is_non_halal' => $this->is_non_halal,
            'minimum_order' => $this->minimum_order,
            'is_ready_for_order' => $this->is_ready_for_order,
            'featured' => $this->featured,
            'created_date' => $this->created_date,
            'modified_date' => $this->modified_date,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'plu', $this->plu])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'meta_tag', $this->meta_tag])
            ->andFilterWhere(['like', 'meta_description', $this->meta_description])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'modified_by', $this->modified_by]);

        return $dataProvider;
    }
    
    public function searchBy($params)
    {
        $query = Product::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query->where(['status' => [Status::STATUS_ACTIVE, Status::STATUS_INACTIVE]]),
            'sort'=> ['defaultOrder' => ['id'=>SORT_ASC]],
            'pagination'=>[
                                'pageSize'=>3,
                        ],
        ]);

//        $this->load($params);
//
//        if (!$this->validate()) {
//            // uncomment the following line if you do not want to return any records when validation fails
//            // $query->where('0=1');
//            return $dataProvider;
//        }
//
//        $query->andFilterWhere([
//            'sn_product_category_id' => $category, false, 'OR',
//        ]);

        $query->andFilterWhere(['like', 'name', $params]);

        return $dataProvider;
    }
}
