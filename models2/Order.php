<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orderr".
 *
 * @property int $id
 * @property string $start_date
 * @property string $tech_type
 * @property string $tech_model
 * @property string|null $problem_description
 * @property int $status_id
 * @property string|null $completion_date
 * @property int|null $client_id
 *
 * @property User $client
 * @property Comment[] $comments
 * @property OrderComponent[] $orderComponents
 * @property OrderEmployee[] $orderEmployees
 * @property OrderStatus $status
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orderr';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['start_date', 'tech_type', 'tech_model', 'status_id'], 'required'],
            [['start_date', 'completion_date'], 'safe'],
            [['status_id', 'client_id'], 'integer'],
            [['tech_type', 'tech_model'], 'string', 'max' => 100],
            [['problem_description'], 'string', 'max' => 250],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrderStatus::class, 'targetAttribute' => ['status_id' => 'id']],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['client_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'start_date' => 'Start Date',
            'tech_type' => 'Tech Type',
            'tech_model' => 'Tech Model',
            'problem_description' => 'Problem Description',
            'status_id' => 'Status ID',
            'completion_date' => 'Completion Date',
            'client_id' => 'Client ID',
        ];
    }

    /**
     * Gets query for [[Client]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(User::class, ['id' => 'client_id']);
    }

    /**
     * Gets query for [[Comments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::class, ['order_id' => 'id']);
    }

    /**
     * Gets query for [[OrderComponents]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderComponents()
    {
        return $this->hasMany(OrderComponent::class, ['order_id' => 'id']);
    }

    /**
     * Gets query for [[OrderEmployees]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderEmployees()
    {
        return $this->hasMany(OrderEmployee::class, ['order_id' => 'id']);
    }

    /**
     * Gets query for [[Status]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(OrderStatus::class, ['id' => 'status_id']);
    }

    public function CountDays($date_start, $date_end)
    {
        $result = $date_end - $date_start;
        return $result;
    }

}
