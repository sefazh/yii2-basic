<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\db\Query;

/**
 * CountrySearch represents the model behind the search form of `app\models\Country`.
 */
class BirthdaySearch extends Birthday
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//            [['code', 'name'], 'safe'],
//            [['population'], 'integer'],
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
        $query = Birthday::find();

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
//        $query->andFilterWhere([
//            'population' => $this->population,
//        ]);

//        $query->andFilterWhere(['like', 'code', $this->code])
//            ->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }





    public function getByDate($date)
    {
        return (new Query())
            ->from(parent::tableName())
            ->where(['date' => $date])
            ->all();
    }
}
