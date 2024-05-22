<?php

/** @var yii\web\View $this */

$this->title = 'Техносервис';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Техносервис</title>

</head>
<body>

<h4>Среднее временя выполнения заявки: <?= intval(\app\models\ReportCard::find()->average('time')); ?> дней</h4>

<h4>Количество выполненных заявок <?= \app\models\Application::find()->where(['status_id' => 3])->count() ?></h4>



</body>
</html>
