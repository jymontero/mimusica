<?php

namespace app\models;

use \app\models\LoginForm;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of modelo_tipo_usuario
 *
 * @author anson
 */
use yii\base\Model;

class SignupForm extends Model {

    public $email;
    public $password;
    public $password_repeat;
    public $nombres;
    public $apellidos;
    public $apodo;
    public $foto;
    
    private $usuario = false;

    public function rules() {
//        parent::rules();
        return [ //, 'on' => 'signup'
            [['nombres', 'email', 'password','apodo', 'password_repeat'], 'required'],
//            ['email', 'trim'],
            ['password_repeat', 'compare', 'compareAttribute' => 'password', 'message' => 'Las contraseñas no coinciden'],
            ['email', 'email'],
//            [['email', 'password'], 'required', 'on' => 'login'],
        ];
    }

    public function attributeLabels() {
        return [
            'email' => \Yii::t('yii', 'Email'),
            'password' => \Yii::t('yii', 'Password'),
            'password_repeat' => \Yii::t('app', 'Password repeat'),
            'nombres' => \Yii::t('yii', 'Name'),
            'apellidos' => \Yii::t('yii', 'Last name'),
            'apodo' => \Yii::t('yii', 'Nickname'),
            'foto' => \Yii::t('yii', 'photo'),
        ];
    }

    public function scenarios() {
        $scenarios = parent::scenarios();
        $scenarios['signup'] = ['email', 'password'];
        $scenarios['register'] = ['email', 'password', 'password_repeat', 'nombres', 'apellidos', 'apodo', 'foto'];
        return $scenarios;
    }
}
