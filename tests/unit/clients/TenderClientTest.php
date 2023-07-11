<?php

namespace tests\unit\clients;

use app\clients\TenderClient;

class TenderClientTest extends \Codeception\Test\Unit
{
    public function testGetTender()
    {
        $client = new TenderClient();
        $tender = $client->getTender('c520b5b093d64e98bd5cc08287e97bba');
        verify($tender['tenderID'])->equals('UA-2015-05-26-000052');
    }

    public function testGetTenderPage()
    {
        $client = new TenderClient();
        $offset = '1689064652.927';
        $tenderPage = $client->getTenderPage($offset);
        verify($tenderPage['prev_page']['offset'])->equals('1689064652.56');
    }

}
