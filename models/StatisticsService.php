<?php

namespace app\models;

use app\models\Application;
use app\models\StatusOrder;

class StatisticsService
{
    public function getCountDone() {
        $count = Application::find()
            ->where(['status_order_id' => StatusOrder::STATUS_DONE])
            ->count();

        return $count;
    }

    public function getStatsTypeMalfunction() {
        $stats = Application::find()
            ->select(['type_malfunction_id', 'count(*) as count'])
            ->groupBy('type_malfunction_id')
            ->asArray()
            ->all();

        return $stats;

    }
}