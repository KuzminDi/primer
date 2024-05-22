<?php

use app\models\ReportCard;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Отчёт';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="report-card-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php
        if (!Yii::$app->user->isGuest && Yii::$app->user->identity->isAdmin()){
            echo Html::a('Создать отчёт', ['create'], ['class' => 'btn btn-success']);
        }
        ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'price_service',
            'spare_parts:ntext',
            'time_work',
            'reason_breakdown:ntext',
            'service_rendered:ntext',
            'feedback:ntext',
            'application_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, ReportCard $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
