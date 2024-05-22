<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TypeMalfunction $model */

$this->title = 'Update Type Malfunction: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Type Malfunctions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="type-malfunction-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
