<?php

use app\models\Application;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Заявка';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="application-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php
        if (!Yii::$app->user->isGuest && Yii::$app->user->identity->isAdmin()){
            echo Html::a('Добавить заявку', ['create'], ['class' => 'btn btn-success']);
        }
        ?>
    </p>

    <p>МН - менеджер, МР - мастер по ремонту</p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'serial_number',
            'equipment_name',
            'description_problem:ntext',
            'client_info',
            'comment_manager:ntext',
            'comment_repairman:ntext',
            //'date_start',
            //'date_end',
            //'type_malfunction_id',
            //'status_order_id',
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

            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Application $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                },
                'visibleButtons' => [
                    'delete' => function ($model, $key, $index) {
                        return Yii::$app->user->identity->isAdmin();

                    },
                ],
            ],
        ],
    ]); ?>


</div>
