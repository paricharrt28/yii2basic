<?php

namespace app\modules\rgt\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\rgt\models\MeetingRegister;

/**
 * MeetingRegisterSearch represents the model behind the search form of `app\models\MeetingRegister`.
 */
class MeetingRegisterSearch extends MeetingRegister {

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['meeting_register_id', 'meeting_register_name', 'meeting_register_active'], 'integer'],
            [['meeting_register_cid', 'meeting_register_date', 'meeting_register_hospcode'], 'safe'],
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
        $query = MeetingRegister::find();

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
            'meeting_register_id' => $this->meeting_register_id,
            'meeting_register_name' => $this->meeting_register_name,
            'meeting_register_date' => $this->meeting_register_date,
            'meeting_register_active' => $this->meeting_register_active,
        ]);

        $query->andFilterWhere(['like', 'meeting_register_cid', $this->meeting_register_cid])
                ->andFilterWhere(['like', 'meeting_register_hospcode', $this->meeting_register_hospcode]);

        return $dataProvider;
    }

}
