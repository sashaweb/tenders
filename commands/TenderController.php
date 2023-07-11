<?php

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;
use app\models\Tender;
use app\services\TenderService;

class TenderController extends Controller
{

    public function actionIndex()
    {
        Tender::deleteAll();
        $tenderService = new TenderService();
        $tenderService->storeTendersFromLast10Pages();

        return ExitCode::OK;
    }
}
