<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $last_name
 * @property string $first_name
 * @property string $patronymic
 * @property string $phone
 * @property string $username
 * @property string $password
 * @property int $role_id
 *
 * @property OrderEmployee[] $orderEmployees
 * @property Order[] $orders
 * @property Role $role
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public $authKey;
    public $accessToken;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['last_name', 'first_name', 'patronymic', 'phone', 'username', 'password', 'role_id'], 'required'],
            [['role_id'], 'integer'],
            [['last_name', 'first_name', 'patronymic', 'username', 'password'], 'string', 'max' => 100],
            [['phone'], 'string', 'max' => 20],
            [['role_id'], 'exist', 'skipOnError' => true, 'targetClass' => Role::class, 'targetAttribute' => ['role_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'last_name' => 'Last Name',
            'first_name' => 'First Name',
            'patronymic' => 'Patronymic',
            'phone' => 'Phone',
            'username' => 'username',
            'password' => 'Password',
            'role_id' => 'Role ID',
        ];
    }

    /**
     * Gets query for [[OrderEmployees]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderEmployees()
    {
        return $this->hasMany(OrderEmployee::class, ['employee_id' => 'id']);
    }

    /**
     * Gets query for [[Orderrs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderrs()
    {
        return $this->hasMany(Order::class, ['client_id' => 'id']);
    }

    /**
     * Gets query for [[Role]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(Role::class, ['id' => 'role_id']);
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username) {
        return User::findOne(['username' => $username]);
    }
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
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

    public function isManager() {
        return $this->role->name === 'Менеджер';
    }

    public function isEmployee() {
        return $this->role->name === 'Техник';
    }

    public function isClient() {
        return $this->role->name === 'Заказчик';
    }

    public function isAdmin() {
        return $this->role->name === 'Администратор';
    }

}
