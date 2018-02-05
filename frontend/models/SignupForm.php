<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $nome;
    public $username;
    public $email;
    public $password;
    public $nif;
    public $password_repeat;
    public $telemovel;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['nome', 'trim'],
            ['nome', 'required', 'message'=>'Insira o seu {attribute}'],
            ['nome', 'string', 'min' => 2, 'max' => 255],

            ['username', 'trim'],
            ['username', 'required','message'=> '{attribute} obrigatório'],
            ['username', 'unique', 'targetClass' => '\frontend\models\Cliente', 'message' => 'Este Username já está em utilização'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required', 'message' => 'E-mail obrigatório'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\frontend\models\Cliente', 'message' => 'Este E-mail já foi utilizado'],

            ['password', 'required', 'message'=>'{attribute} obrigatória'],
            ['password', 'string', 'min' => 6],

            ['password_repeat', 'required', 'message'=>'Por favor introduza novamente a Password'],
            ['password_repeat', 'string', 'min' => 6],
            ['password_repeat', 'compare', 'compareAttribute' => 'password','message'=>'Password inserida diferente'],

            ['nif', 'trim'],
            ['nif', 'required', 'message'=>'NIF obrigatório'],
            ['nif', 'string', 'min' => 9,'max' => 9],
            ['nif', 'unique', 'targetClass' => '\frontend\models\Cliente', 'message' => 'Já existe alguém registado com este NIF'],

            ['telemovel','trim'],
            ['telemovel', 'string', 'min' => 9,'max' => 9],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

            $user = new Cliente();
            $user->id = 1;
            $user->nome = $this->nome;
            $user->username = $this->username;
            $user->email = $this->email;
            $user->nif = $this->nif;
            $user->telemovel = $this->telemovel;
            $user->setPassword($this->password);
            $user->generateAuthKey();

        return $user->save() ? $user : null;
    }
}
