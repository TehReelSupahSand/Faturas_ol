<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "linha_fatura".
 *
 * @property integer $id
 * @property double $valor_unitario
 * @property string $nome_produto
 * @property string $descricao
 * @property integer $id_fatura
 * @property integer $id_custom_fatura
 * @property double $valor_total
 *
 * @property Fatura $idFatura
 * @property Customfatura $idCustomFatura
 */
class LinhaFatura extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'linha_fatura';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['valor_unitario', 'quantidade', 'nome_produto', 'descricao'], 'required'],
            [['valor_unitario', 'valor_total'], 'number'],
            [['quantidade'], 'integer', 'max'=> 1000],
            [['id_fatura', 'id_custom_fatura'], 'integer'],
            [['nome_produto', 'descricao'], 'string', 'max' => 100],
            [['id_fatura'], 'exist', 'skipOnError' => true, 'targetClass' => Fatura::className(), 'targetAttribute' => ['id_fatura' => 'id']],
            [['id_custom_fatura'], 'exist', 'skipOnError' => true, 'targetClass' => Customfatura::className(), 'targetAttribute' => ['id_custom_fatura' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'valor_unitario' => 'Valor Unitario',
            'nome_produto' => 'Nome do Produto',
            'quantidade' => 'Quantidade',
            'descricao' => 'Descricao',
            'id_fatura' => 'Id Fatura',
            'id_custom_fatura' => 'Id Custom Fatura',
            'valor_total' => 'Valor Total',
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
    public function getIdCustomFatura()
    {
        return $this->hasOne(Customfatura::className(), ['id' => 'id_custom_fatura']);
    }
}
