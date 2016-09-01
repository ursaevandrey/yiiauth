<?php

namespace site\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * Class User
 *
 * @property int id
 * @property string login
 * @property string password
 * @property string name
 *
 * @package site\models
 */
class User extends ActiveRecord implements IdentityInterface{

    public $auth_key;

    /**
     * @inheritdoc
     */
    public static function tableName(){
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors(){
        return [
            TimestampBehavior::class,
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules(){
        return [];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id){
        return static::findOne(['id' => $id]);
    }

    /**
     * @param mixed $token
     * @param null $type
     *
     * @return void|IdentityInterface
     * @throws NotSupportedException
     */
    public static function findIdentityByAccessToken($token, $type = null){
        throw new NotSupportedException('Not supported');
    }

    /**
     * Finds user by username
     *
     * @param string $login
     * @return static|null
     */
    public static function findByUsername($login){
        return static::findOne(['login' => $login]);
    }

    /**
     * @return int
     */
    public function getId(){
        return $this->getPrimaryKey();
    }

    /**
     * @return string
     */
    public function getAuthKey(){
        return $this->auth_key;
    }

    /**
     * @param string $auth_key
     * @return bool
     */
    public function validateAuthKey($auth_key){
        return $this->getAuthKey() === $auth_key;
    }

    /**
     * @param string $password
     * @return bool
     */
    public function validatePassword($password){
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    public function generateAuthKey(){
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

}