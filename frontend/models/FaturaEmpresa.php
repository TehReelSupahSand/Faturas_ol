<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "fatura_empresa".
 *
 * @property integer $id_fatura
 * @property integer $id_empresa
 *
 * @property Fatura $idFatura
 * @property Empresa $idEmpresa
 */
class FaturaEmpresa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fatura_empresa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_fatura', 'id_empresa'], 'required'],
            [['id_fatura', 'id_empresa'], 'integer'],
            [['id_fatura'], 'exist', 'skipOnError' => true, 'targetClass' => Fatura::className(), 'targetAttribute' => ['id_fatura' => 'id']],
            [['id_empresa'], 'exist', 'skipOnError' => true, 'targetClass' => Empresa::className(), 'targetAttribute' => ['id_empresa' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_fatura' => 'Id Fatura',
            'id_empresa' => 'Id Empresa',
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
    public function getIdEmpresa()
    {
        return $this->hasOne(Empresa::className(), ['id' => 'id_empresa']);
    }
}
