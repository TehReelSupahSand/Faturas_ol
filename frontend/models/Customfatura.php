<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "customfatura".
 *
 * @property integer $id
 * @property integer $numero
 * @property string $data
 * @property integer $nif_empresa
 * @property string $nome_empresa
 * @property string $morada_empresa
 *
 * @property CustomFaturaCliente[] $customFaturaClientes
 * @property LinhaFatura[] $linhaFaturas
 */
class Customfatura extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customfatura';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['numero', 'nif_empresa', 'nome_empresa', 'morada_empresa', 'data'], 'required'],
            [['numero', 'nif_empresa'], 'integer'],
            [['nif_empresa'], 'string', 'max'=> 9, 'min' => 9],
            [['data'], 'safe'],
            [['data'], 'date', 'format' => 'dd/MM/YYYY'],
            [['nome_empresa', 'morada_empresa'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'numero' => 'Número da Fatura',
            'data' => 'Data',
            'nif_empresa' => 'NIF da Empresa',
            'nome_empresa' => 'Nome da Empresa',
            'morada_empresa' => 'Morada da Empresa',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomFaturaClientes()
    {
        return $this->hasMany(CustomFaturaCliente::className(), ['id_custom_faturas' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLinhaFaturas()
    {
        return $this->hasMany(LinhaFatura::className(), ['id_custom_fatura' => 'id']);
    }
}
