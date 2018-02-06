<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "empresa".
 *
 * @property integer $id
 * @property string $nome
 * @property integer $nif
 * @property string $morada
 *
 * @property FaturaEmpresa[] $faturaEmpresas
 */
class Empresa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'empresa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'nif', 'morada'], 'required'],
            [['nif'], 'integer'],
            [['nome'], 'string', 'max' => 100],
            [['morada'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'nif' => 'NIF',
            'morada' => 'Morada',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFaturaEmpresas()
    {
        return $this->hasMany(FaturaEmpresa::className(), ['id_empresa' => 'id']);
    }
}
