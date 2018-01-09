<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "fatura_cliente".
 *
 * @property integer $id_fatura
 * @property integer $numero_cartao_cliente
 *
 * @property Fatura $idFatura
 * @property Cliente $numeroCartaoCliente
 */
class FaturaCliente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fatura_cliente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_fatura', 'numero_cartao_cliente'], 'required'],
            [['id_fatura', 'numero_cartao_cliente'], 'integer'],
            [['id_fatura'], 'exist', 'skipOnError' => true, 'targetClass' => Fatura::className(), 'targetAttribute' => ['id_fatura' => 'id']],
            [['numero_cartao_cliente'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::className(), 'targetAttribute' => ['numero_cartao_cliente' => 'numero_cartao']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_fatura' => 'Id Fatura',
            'numero_cartao_cliente' => 'Numero Cartao Cliente',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdFatura()
    {
        return $this->hasOne(Fatura::className(), ['id' => 'id_fatura']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNumeroCartaoCliente()
    {
        return $this->hasOne(Cliente::className(), ['numero_cartao' => 'numero_cartao_cliente']);
    }
}
