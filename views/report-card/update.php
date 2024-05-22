<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ReportCard $model */

$this->title = 'Update Report Card: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Report Cards', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="report-card-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
