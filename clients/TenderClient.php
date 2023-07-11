<?php

namespace app\clients;

use yii\httpclient\Client;

class TenderClient
{
    private $_client;

    function __construct()
    {
        $this->_client = new Client([
            'baseUrl' => 'https://public.api.openprocurement.org/api/2.5/tenders',
            'responseConfig' => [
                'format' => Client::FORMAT_JSON
            ],
        ]);
    }

    public function getTender($tenderId)
    {
        try {
            $response =  $this->_client->get('/'. $tenderId)->send();

            if ($response->isOk) {
                $data = $response->getData();
                return $data['data'];
            } 

            return null;

        } catch (Exception $e) {
            echo $e->getMessage();
        }        
    }

    public function getTenderPage($offset, $limit = 10)
    {
        try {
            return $this->_client->get('', [
                'descending' => 1,
                'offset' => $offset,
                'limit' => $limit,
            ])
            ->send()
            ->getData();

        } catch (Exception $e) {
            echo $e->getMessage();
        }        
    }
}

