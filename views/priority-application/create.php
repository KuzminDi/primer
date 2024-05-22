<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\PriorityApplication $model */

$this->title = 'Create Priority Application';
$this->params['breadcrumbs'][] = ['label' => 'Priority Applications', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="priority-application-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
