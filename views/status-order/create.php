<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\StatusOrder $model */

$this->title = 'Create Status Order';
$this->params['breadcrumbs'][] = ['label' => 'Status Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="status-order-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
