<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "cliente".
 *
 * @property integer $numero_cartao
 * @property string $nome
 * @property string $email
 * @property string $username
 * @property string $password_hash
 * @property string $telemovel
 * @property string $nif
 * @property string $auth_key
 *
 * @property CustomFaturaCliente[] $customFaturaClientes
 * @property FaturaCliente[] $faturaClientes
 */
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cliente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'email', 'username', 'password_hash', 'nif', 'auth_key'], 'required'],
            [['nome'], 'string', 'max' => 500],
            [['email', 'username'], 'string', 'max' => 100],
            [['password_hash'], 'string', 'max' => 255],
            [['telemovel', 'nif'], 'string', 'max' => 9],
            [['auth_key'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'numero_cartao' => 'Numero Cartao',
            'nome' => 'Nome',
            'email' => 'Email',
            'username' => 'Username',
            'password_hash' => 'Password Hash',
            'telemovel' => 'Telemovel',
            'nif' => 'Nif',
            'auth_key' => 'Auth Key',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomFaturaClientes()
    {
        return $this->hasMany(CustomFaturaCliente::className(), ['numero_cartao_cliente' => 'numero_cartao']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFaturaClientes()
    {
        return $this->hasMany(FaturaCliente::className(), ['numero_cartao_cliente' => 'numero_cartao']);
    }
}
