<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "custom_fatura_cliente".
 *
 * @property integer $id_custom_faturas
 * @property integer $numero_cartao_cliente
 *
 * @property Customfatura $idCustomFaturas
 * @property Cliente $numeroCartaoCliente
 */
class CustomFaturaCliente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'custom_fatura_cliente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_custom_faturas', 'numero_cartao_cliente'], 'required'],
            [['id_custom_faturas', 'numero_cartao_cliente'], 'integer'],
            [['id_custom_faturas'], 'exist', 'skipOnError' => true, 'targetClass' => Customfatura::className(), 'targetAttribute' => ['id_custom_faturas' => 'id']],
            [['numero_cartao_cliente'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::className(), 'targetAttribute' => ['numero_cartao_cliente' => 'numero_cartao']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_custom_faturas' => 'Id Custom Faturas',
            'numero_cartao_cliente' => 'Numero Cartao Cliente',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCustomFaturas()
    {
        return $this->hasOne(Customfatura::className(), ['id' => 'id_custom_faturas']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNumeroCartaoCliente()
    {
        return $this->hasOne(Cliente::className(), ['numero_cartao' => 'numero_cartao_cliente']);
    }
}
