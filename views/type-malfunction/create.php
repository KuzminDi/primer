<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TypeMalfunction $model */

$this->title = 'Create Type Malfunction';
$this->params['breadcrumbs'][] = ['label' => 'Type Malfunctions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="type-malfunction-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
