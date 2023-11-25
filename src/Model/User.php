<?php

namespace App\Model;

use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property int $type
 *
 * @property string $token @method getAuthkey()
 * @property-read null $authKey
 */
class User extends ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'password', 'status'], 'required'],
            ['type', 'default', 'value' => 1],
            [['name', 'email', 'password'], 'string', 'max' => 255],
            ['email', 'unique']
        ];
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }

    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null; //TODO
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
       return null; // TODO
    }

    public function validateAuthKey($authKey)
    {
        return null;
    }
}
