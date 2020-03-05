<?php

namespace app\modules\rgt\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\rgt\models\MeetingList;

/**
 * MeetingListSearch represents the model behind the search form of `app\models\MeetingList`.
 */
class MeetingListSearch extends MeetingList {

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['meeting_list_id', 'meeting_list_active'], 'integer'],
            [['meeting_list_name', 'meeting_list_detail'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = MeetingList::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'meeting_list_id' => $this->meeting_list_id,
            'meeting_list_active' => $this->meeting_list_active,
        ]);

        $query->andFilterWhere(['like', 'meeting_list_name', $this->meeting_list_name])
                ->andFilterWhere(['like', 'meeting_list_detail', $this->meeting_list_detail]);

        return $dataProvider;
    }

}
