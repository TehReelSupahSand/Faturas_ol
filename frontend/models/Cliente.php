<?php

namespace frontend\models;

use Codeception\Module\Cli;
use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "cliente".
 *
 * @property integer $numero_cartao
 * @property string $nome
 * @property string $email
 * @property string $username
 * @property string $password_hash
 * @property integer $telemovel
 * @property integer $nif
 * @property string $password write-only password
 * @property string $new_password
 *
 * @property CustomFaturaCliente[] $customFaturaClientes
 * @property FaturaCliente[] $faturaClientes
 */
class Cliente extends ActiveRecord implements IdentityInterface
{
    /*const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;*/

    public $new_password;

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
            [['nome', 'email', 'username', 'password_hash','nif'], 'required'],
            [['nome'], 'string', 'max' => 500],
            [['email'], 'string', 'max' => 100],
            [['username'], 'string', 'max' => 16],
            [['password_hash'], 'string', 'max' => 255],
            [['nif'],'string','min'=>9,'max'=>9],
            [['telemovel'], 'string', 'max'=> 9, 'min' => 9],

            [['new_password'], 'string', 'min' => 6],
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
            'password_hash' => 'Password',
            'telemovel' => 'Telemovel',
            'nif' => 'NIF',
            'new_password' => 'Nova Password',
        ];
    }

    public static function findIdentity($numero_cartao)
    {
        return static::findOne(['numero_cartao' => $numero_cartao]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            //'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /** @param string $new_password*/

    public function updatePassword($new_password) {
        if ($new_password!==""){
            $this->password_hash = Yii::$app->security->generatePasswordHash($new_password);
        }
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
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
