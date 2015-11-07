<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\UserComplaint;

/**
 * UserComplaintSearch represents the model behind the search form about `common\models\UserComplaint`.
 */
class UserComplaintSearch extends UserComplaint {

    public $username;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'user_id', 'status'], 'integer'],
            [['description', 'complaint_type', 'created_by', 'created_date', 'modified_by', 'modified_date'], 'safe'],
            [['username'], 'safe'],
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

        $query = UserComplaint::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query->where(['user_complaint.status' => [Status::STATUS_ACTIVE, Status::STATUS_INACTIVE]]),
        ]);

        $this->load($params);
        /**
         * Setup your sorting attributes
         * Note: This is setup before the $this->load($params) 
         * statement below
         */
        $dataProvider->setSort([
            'attributes' => [
                'id',
                'username' => [
                    'asc' => ['username' => SORT_ASC],
                    'desc' => ['username' => SORT_DESC],
                    'label' => 'Username'
                ],
                'description' => [
                    'asc' => ['description' => SORT_ASC],
                    'desc' => ['description' => SORT_DESC],
                    'label' => 'Description'
                ],
                'complaint_type' => [
                    'asc' => ['complaint_type' => SORT_ASC],
                    'desc' => ['complaint_type' => SORT_DESC],
                    'label' => 'Complaint Type'
                ],
                'status' => [
                    'asc' => ['status' => SORT_ASC],
                    'desc' => ['status' => SORT_DESC],
                    'label' => 'Status'
                ]
            ]
        ]);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            if (!($this->load($params) && $this->validate())) {
                /**
                 * The following line will allow eager loading with user data 
                 * to enable sorting by user on initial loading of the grid.
                 */
                $query->joinWith(['user']);
                return $dataProvider;
            }
        }
        
        /* Add your filtering criteria */

        // filter by user name
        $query->joinWith(['user' => function ($q) {
                $q->where('username LIKE "%' . $this->username . '%"');
            }]);

        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'created_date' => $this->created_date,
            'modified_date' => $this->modified_date,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description])
                ->andFilterWhere(['like', 'complaint_type', $this->complaint_type])
                ->andFilterWhere(['like', 'created_by', $this->created_by])
                ->andFilterWhere(['like', 'modified_by', $this->modified_by]);

        return $dataProvider;
    }

}
