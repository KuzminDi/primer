<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ReportCard $model */

$this->title = 'Create Report Card';
$this->params['breadcrumbs'][] = ['label' => 'Report Cards', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="report-card-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
