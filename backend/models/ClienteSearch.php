<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Cliente;

/**
 * ClienteSearch represents the model behind the search form about `backend\models\Cliente`.
 */
class ClienteSearch extends Cliente
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['numero_cartao'], 'integer'],
            [['nome', 'email', 'username', 'password_hash', 'telemovel', 'nif', 'auth_key'], 'safe'],
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
        $query = Cliente::find();

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
            'numero_cartao' => $this->numero_cartao,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'password_hash', $this->password_hash])
            ->andFilterWhere(['like', 'telemovel', $this->telemovel])
            ->andFilterWhere(['like', 'nif', $this->nif])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key]);

        return $dataProvider;
    }
}
