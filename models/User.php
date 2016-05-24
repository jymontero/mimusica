<?php

namespace app\models;

class User extends \yii\base\Object implements \yii\web\IdentityInterface {

    public $id_tusuario;
    public $email;
    public $password;
    public $nombres;
    public $apellidos;
    public $apodo;
    public $foto;
    public $tipo;
    public $estado;
    public $authKey;
    public $accessToken;
    public $codigo_verificacion;

    /**
     * @inheritdoc
     */
    public static function findIdentity($id) {
        $user = Usuario::find()
                ->andWhere('id_tusuario=:id', [':id' => $id])
                ->one();

        return isset($user) ? new static($user) : null;
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null) {
        $user = Usuario::find()
                ->andWhere('accessToken=:AccessToken', [':AccessToken' => $token])
                ->one();

        return isset($user) ? new static($user) : null;
    }

    /**
     * Finds user by username
     *
     * @param  string      $email
     * @return static|null
     */
    public static function findByEmail($email) {
        $user = Usuario::find()
                ->andWhere('email=:email', [':email' => $email])
                ->one();

        return isset($user) ? new static($user) : null;
    }

    /**
     * @inheritdoc
     */
    public function getId() {
        return $this->id_tusuario;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey() {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey) {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password) {
        return $this->password === $password;
    }

    public static function isUserAdmin($id) {
        if (Usuario::findOne(['id_tusuario' => $id, 'estado' => '1', 'tipo' => '2'])) {
            return true;
        } else {
            return false;
        }
    }

    public static function isUserSimple($id) {
        if (Usuario::findOne(['id_tusuario' => $id, 'estado' => '1', 'tipo' => '1'])) {
            return true;
        } else {
            return false;
        }
    }

}
