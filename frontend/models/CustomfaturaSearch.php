<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Customfatura;

/**
 * CustomfaturaSearch represents the model behind the search form about `frontend\models\Customfatura`.
 */
class CustomfaturaSearch extends Customfatura
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'numero', 'nif_empresa'], 'integer'],
            [['data', 'nome_empresa', 'morada_empresa'], 'safe'],
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
        $query = Customfatura::find()->join('INNER JOIN','custom_fatura_cliente','custom_fatura_cliente.id_custom_faturas = customfatura.id')->where(['custom_fatura_cliente.numero_cartao_cliente'=> Yii::$app->user->identity->numero_cartao]);;

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
            'id' => $this->id,
            'numero' => $this->numero,
            'data' => $this->data,
            'nif_empresa' => $this->nif_empresa,
        ]);

        $query->andFilterWhere(['like', 'nome_empresa', $this->nome_empresa])
            ->andFilterWhere(['like', 'morada_empresa', $this->morada_empresa]);

        return $dataProvider;
    }
}
