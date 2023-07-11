<?php

namespace app\services;

use app\clients\TenderClient;
use app\models\Tender;

class TenderService
{
    const NUM_PAGES = 10;
    const LIMIT = 3;    

    private $_client;

    function __construct()
    {
        $this->_client = new TenderClient();
    }

    public function storeTendersFromLast10Pages()
    {
        try {

            \Yii::info("Start fetching tenders");
            echo " Start fetching tenders \n";

            $i = 0;
            $offset = '';
    
            $result = [];
    
            do {
                $i++;

                \Yii::info("Start fetching page : $i \n");
                echo " ============== page : $i =================\n";
    
                $tenderPage = $this->_client->getTenderPage($offset, self::LIMIT);
    
                if (empty($tenderPage['data'])){
                    break;
                }
    
                foreach ($tenderPage['data'] as $tenderPageItem) {

                    echo $tenderPageItem['id'] . "\n";
    
                    $tenderInfo = $this->_client->getTender($tenderPageItem['id']);

                    if ($tenderInfo) {
                        $tender = new Tender();
                        $tender->tenderID = $tenderInfo['tenderID'] ?? '';
                        $tender->amount = $tenderInfo['value']['amount'] ?? '';
                        $tender->dateModified = $tenderInfo['dateModified'] ?? '';
                        $tender->description = mb_substr($tenderInfo['description'] ?? '', 0, 255);
                        $tender->save();
                    } else {
                        echo "no data for tender with id: {$tenderPageItem['id']}";
                        \Yii::error("no data for tender with id: {$tenderPageItem['id']}");
                    }
                    
                }                                  
    
            } 
            while($i < self::NUM_PAGES && !empty($tenderPage['next_page']['offset']));

        } catch (Exception $e) {
            \Yii::error($e->getMessage());
        }


    }

}