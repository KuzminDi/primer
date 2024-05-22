<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\PriorityApplication $model */

$this->title = 'Update Priority Application: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Priority Applications', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="priority-application-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
