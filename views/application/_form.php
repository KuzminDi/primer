<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Application $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="application-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php if(!Yii::$app->user->isGuest && Yii::$app->user->identity->isAdmin()) {?>
            <?= $form->field($model, 'serial_number')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'equipment_name')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'description_problem')->textarea(['rows' => 6]) ?>
            <?= $form->field($model, 'client_info')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'comment_manager')->textarea(['rows' => 6]) ?>
    <?php } ?>

    <?= $form->field($model, 'comment_repairman')->textarea(['rows' => 6]) ?>


    <?php if(!Yii::$app->user->isGuest && Yii::$app->user->identity->isAdmin()) {?>
    <?= $form->field($model, 'date_start')->textInput(['type' => 'date']) ?>
    <?php } ?>

    <?= $form->field($model, 'date_end')->textInput(['type' => 'date']) ?>

    <?= $form->field($model, 'type_malfunction_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\TypeMalfunction::find()->all(), 'id', 'name') )?>


    <?= $form->field($model, 'status_order_id')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\models\StatusOrder::find()->all(), 'id', 'name'),
        ['onchange' => 'checkStatus(this)']
    ) ?>

    <?php if(!Yii::$app->user->isGuest && Yii::$app->user->identity->isAdmin()) {?>
        <?= $form->field($model, 'user_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\User::find()->where(['role_id' => '2'])->all(), 'id', 'login'))?>
        <?= $form->field($model, 'priority_application_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\PriorityApplication::find()->all(), 'id', 'priority'))?>
    <?php } ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
