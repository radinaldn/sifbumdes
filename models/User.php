<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "tb_user".
 *
 * @property integer $nip
 * @property string $password
 * @property integer $id_kategori
 * @property string $nama
 * @property string $jenis_kelamin
 * @property string $alamat
 * @property string $email
 * @property string $hp
 * @property string $authKey
 * @property string $accessToken
 * @property string $role
 *
 * @property Kategori $idKategori
 */
class User extends ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tb_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nip', 'password', 'id_kategori', 'nama', 'jenis_kelamin', 'alamat', 'email', 'hp', 'authKey', 'accessToken', 'role'], 'required'],
            [['nip', 'id_kategori'], 'integer'],
            [['alamat'], 'string'],
            [['password', 'nama'], 'string', 'max' => 255],
            [['jenis_kelamin'], 'string', 'max' => 2],
            [['email'], 'string', 'max' => 100],
            [['hp'], 'string', 'max' => 15],
            [['authKey', 'accessToken'], 'string', 'max' => 50],
            [['role'], 'string', 'max' => 10],
            [['id_kategori'], 'exist', 'skipOnError' => true, 'targetClass' => Kategori::className(), 'targetAttribute' => ['id_kategori' => 'id_kategori']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nip' => 'Nip',
            'password' => 'Password',
            'id_kategori' => 'Id Kategori',
            'nama' => 'Nama',
            'jenis_kelamin' => 'Jenis Kelamin',
            'alamat' => 'Alamat',
            'email' => 'Email',
            'hp' => 'Hp',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
            'role' => 'Role',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdKategori()
    {
        return $this->hasOne(Kategori::className(), ['id_kategori' => 'id_kategori']);
    }

    public function findByNip($nip){

        $user = User::find()->where(['nip'=>$nip])->one();
        if (count($user)){
            return new static($user);
        }

        return null;
    }

    public function findByNama($nip){

        $user = User::find()->where(['nip'=>$nip])->one();
        if (count($user)){
            return new static($user);
        }

        return null;
    }

    public function validatePassword($password){
        return $this->password === $password;
    }


    /**
     * Finds an identity by the given ID.
     * @param string|int $id the ID to be looked for
     * @return IdentityInterface the identity object that matches the given ID.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentity($nip)
    {
        // TODO: Implement findIdentity() method.
        $user = User::findOne($nip);
        if(count($user)){
            return new static($user);
        }
        return null;
    }

    /**
     * Finds an identity by the given token.
     * @param mixed $token the token to be looked for
     * @param mixed $type the type of the token. The value of this parameter depends on the implementation.
     * For example, [[\yii\filters\auth\HttpBearerAuth]] will set this parameter to be `yii\filters\auth\HttpBearerAuth`.
     * @return IdentityInterface the identity object that matches the given token.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
        $user = User::find()->where(['accessToken'=>$token])->one();
        if (count($user)){
            return new static($user);
        }
    }

    /**
     * Returns an ID that can uniquely identify a user identity.
     * @return string|int an ID that uniquely identifies a user identity.
     */
    public function getId()
    {
        // TODO: Implement getId() method.
        return $this->nip;
    }

    public function getRole()
    {
        // TODO: Implement getId() method.
        return current( \Yii::$app->authManager->getRolesByUser( $this->id ) );
    }

    /**
     * Returns a key that can be used to check the validity of a given identity ID.
     *
     * The key should be unique for each individual user, and should be persistent
     * so that it can be used to check the validity of the user identity.
     *
     * The space of such keys should be big enough to defeat potential identity attacks.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     * @return string a key that is used to check the validity of a given identity ID.
     * @see validateAuthKey()
     */
    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
        return $this->authKey;
    }

    /**
     * Validates the given auth key.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     * @param string $authKey the given auth key
     * @return bool whether the given auth key is valid.
     * @see getAuthKey()
     */
    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
        return $this->authKey === $authKey;
    }

    public function isStudent($username)
    {
        if ($user = User::findOne(['username' => $username, 'role' => self::ROLE_MURID]))
        {
            return true;
            return $this->role == self::ROLE_MURID;
        }
        else
        {
            return false;
        }

    }


}
