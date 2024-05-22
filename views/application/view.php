<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Application $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Applications', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="application-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php
        if (!Yii::$app->user->isGuest && Yii::$app->user->identity->isAdmin()){
            echo Html::a('Удалить', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Вы уверены, что хотите удалить данную запись?',
                    'method' => 'post',
                ],

            ]);
        }
        ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'serial_number',
            'equipment_name',
            'description_problem:ntext',
            'client_info',
            'comment_manager:ntext',
            'comment_repairman:ntext',
            'date_start',
            'date_end',
            [
                'attribute' => 'type_malfunction_id',
                'value' => function ($model) {
                    return $model->typeMalfunction->name;
                },
            ],
            [
                'attribute' => 'status_order_id',
                'value' => function ($model) {
                    return $model->statusOrder->name;
                },
            ],
            [
                'attribute' => 'user_id',
                'value' => function ($model) {
                    return $model->user->login;
                },
            ],
            [
                'attribute' => 'priority_application_id',
                'value' => function ($model) {
                    return $model->priorityApplication->priority;
                },
            ],
        ],
    ]) ?>

</div>
