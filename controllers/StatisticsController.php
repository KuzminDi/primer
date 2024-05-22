<?php

namespace app\controllers;


use app\models\StatisticsService;
use yii\web\Controller;

class StatisticsController extends Controller
{
    public function actionIndex() {


        $service = new StatisticsService();

        $countDone = $service->getCountDone();
        $typesStats = $service->getStatsTypeMalfunction();


        var_dump($countDone);
        var_dump($typesStats);
        return $this->render('statistics/index', [
            'countDone' => $countDone,
            'typesStats' => $typesStats
        ]);

    }
}