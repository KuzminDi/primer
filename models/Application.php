<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "application".
 *
 * @property int $id
 * @property string|null $serial_number Серийный номер
 * @property string $equipment_name Наименование оборудования
 * @property string $description_problem Описание проблемы
 * @property string $client_info Данные клиента
 * @property string|null $comment_manager Комментарий менеджера
 * @property string|null $comment_repairman Комментарий ремонтника
 * @property string $date_start Дата начала ремонта оборудования
 * @property string|null $date_end Дата окончания ремонта оборудования
 * @property int $type_malfunction_id
 * @property int $status_order_id
 * @property int $user_id
 * @property int $priority_application_id
 *
 * @property PriorityApplication $priorityApplication
 * @property ReportCard[] $reportCards
 * @property StatusOrder $statusOrder
 * @property TypeMalfunction $typeMalfunction
 * @property User $user
 */
class Application extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'application';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['equipment_name', 'description_problem', 'client_info', 'date_start', 'type_malfunction_id', 'user_id', 'priority_application_id'], 'required'],
            [['description_problem', 'comment_manager', 'comment_repairman'], 'string'],
            [['date_start', 'date_end'], 'safe'],
            [['type_malfunction_id', 'status_order_id', 'user_id', 'priority_application_id'], 'integer'],
            [['serial_number', 'equipment_name', 'client_info'], 'string', 'max' => 255],
            [['type_malfunction_id'], 'exist', 'skipOnError' => true, 'targetClass' => TypeMalfunction::class, 'targetAttribute' => ['type_malfunction_id' => 'id']],
            [['status_order_id'], 'exist', 'skipOnError' => true, 'targetClass' => StatusOrder::class, 'targetAttribute' => ['status_order_id' => 'id']],
            [['priority_application_id'], 'exist', 'skipOnError' => true, 'targetClass' => PriorityApplication::class, 'targetAttribute' => ['priority_application_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'serial_number' => 'Серийный номер',
            'equipment_name' => 'Оборудование',
            'description_problem' => 'Описание проблемы',
            'client_info' => 'Данные клиента',
            'comment_manager' => 'Комментарий МН',
            'comment_repairman' => 'Комментарий МР',
            'date_start' => 'Дата начала ремонта оборудования',
            'date_end' => 'Дата окончания ремонта оборудования',
            'type_malfunction_id' => 'Тип неисправности',
            'status_order_id' => 'Статус заявки',
            'user_id' => 'Ответственный за ремонт',
            'priority_application_id' => 'Приоритет заявки',
        ];
    }

    /**
     * Gets query for [[PriorityApplication]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPriorityApplication()
    {
        return $this->hasOne(PriorityApplication::class, ['id' => 'priority_application_id']);
    }

    /**
     * Gets query for [[ReportCards]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReportCards()
    {
        return $this->hasMany(ReportCard::class, ['application_id' => 'id']);
    }

    /**
     * Gets query for [[StatusOrder]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatusOrder()
    {
        return $this->hasOne(StatusOrder::class, ['id' => 'status_order_id']);
    }

    /**
     * Gets query for [[TypeMalfunction]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTypeMalfunction()
    {
        return $this->hasOne(TypeMalfunction::class, ['id' => 'type_malfunction_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
