<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\SnBank;

/**
 * SnBankSearch represents the model behind the search form about `common\models\SnBank`.
 */
class SnBankSearch extends SnBank
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
            [['bank', 'created_date', 'created_by', 'modified_date', 'modified_by'], 'safe'],
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
        $query = SnBank::find();

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
            'status' => $this->status,
            'created_date' => $this->created_date,
            'modified_date' => $this->modified_date,
        ]);

        $query->andFilterWhere(['like', 'bank', $this->bank])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'modified_by', $this->modified_by]);

        return $dataProvider;
    }
}
