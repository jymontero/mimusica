<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Usuario]].
 *
 * @see Usuario
 */
class UsuariosQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Usuario[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Usuario|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}