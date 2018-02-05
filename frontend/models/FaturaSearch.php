<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Fatura;

/**
 * FaturaSearch represents the model behind the search form about `frontend\models\Fatura`.
 */
class FaturaSearch extends Fatura
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'numero','favorito'], 'integer'],
            [['data', 'imagem_path'], 'safe'],
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
        //mostra so as faturas pertencentes ao cliente autenticado
        $query = Fatura::find()->join('INNER JOIN','fatura_cliente','fatura_cliente.id_fatura = fatura.id')->where(['fatura_cliente.numero_cartao_cliente'=> Yii::$app->user->identity->numero_cartao]);

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
            'favorito' => $this->favorito,
        ]);

        $query->andFilterWhere(['like', 'imagem_path', $this->imagem_path]);

        return $dataProvider;
    }
}
