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

<div class="jumbotron text-center bg-transparent mt-5 mb-5">
    <h1 class="display-4" style="font-size: 100px">Техносервис</h1>
    <p class="lead" style="font-size: 50px">Добро пожаловать в сервис для учета заявок на ремонт оборудования.
    </p>


    <h2 style="margin-top: 70px">Статистика по заявкам:</h2>
    <h5>Среднее временя выполнения заявки по дням: <?= intval(\app\models\ReportCard::find()->average('time_work')); ?> </h5>
    <h5>Количество выполненных заявок: <?= \app\models\Application::find()->where(['status_order_id' => 3])->count() ?></h5>

    <h2 style="margin-top: 70px">Статистика по типам неисправностей, количество заявок по типам:</h2>
    <h5>Износ деталей и узлов в процессе эксплуатации: <?= \app\models\Application::find()->where(['type_malfunction_id' => 1])->count() ?></h5>
    <h5>Люфты, ослабления резьбовых и других соединений: <?= \app\models\Application::find()->where(['type_malfunction_id' => 2])->count() ?></h5>
    <h5>Попадание грязи, влаги, посторонних предметов при ненадлежащем обслуживании и хранении: <?= \app\models\Application::find()->where(['type_malfunction_id' => 3])->count() ?></h5>
    <h5>Механическое повреждение: <?= \app\models\Application::find()->where(['type_malfunction_id' => 4])->count() ?></h5>
</div>



</body>
</html>
