<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ReportCard $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="report-card-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'price_service')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'spare_parts')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'time_work')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'reason_breakdown')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'service_rendered')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'feedback')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'application_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Application::find()->all(), 'id', 'id'))?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
