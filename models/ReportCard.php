<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "report_card".
 *
 * @property int $id
 * @property float $price_service Стоимость услуги
 * @property string $spare_parts Запчасти
 * @property string $time_work Время затраченное на работу
 * @property string $reason_breakdown Причина поломки
 * @property string $service_rendered Оказанная услуга
 * @property string $feedback Обратная связь
 * @property int $application_id ID заявки
 *
 * @property Application $application
 */
class ReportCard extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'report_card';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['price_service', 'spare_parts', 'time_work', 'reason_breakdown', 'service_rendered', 'feedback', 'application_id'], 'required'],
            [['price_service'], 'number'],
            [['spare_parts', 'reason_breakdown', 'service_rendered', 'feedback'], 'string'],
            [['application_id'], 'integer'],
            [['time_work'], 'string', 'max' => 255],
            [['application_id'], 'exist', 'skipOnError' => true, 'targetClass' => Application::class, 'targetAttribute' => ['application_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'price_service' => 'Стоимость услуги',
            'spare_parts' => 'Запчасти',
            'time_work' => 'Время затраченное на работу',
            'reason_breakdown' => 'Причина поломки',
            'service_rendered' => 'Оказанная услуга',
            'feedback' => 'Обратная связь',
            'application_id' => 'ID заявки',
        ];
    }

    /**
     * Gets query for [[Application]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApplication()
    {
        return $this->hasOne(Application::class, ['id' => 'application_id']);
    }
}
