<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "status_order".
 *
 * @property int $id
 * @property string $name
 *
 * @property Application[] $applications
 */
class StatusOrder extends \yii\db\ActiveRecord
{

    const STATUS_DONE = 3;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'status_order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[Applications]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApplications()
    {
        return $this->hasMany(Application::class, ['status_order_id' => 'id']);
    }
}
