<?php

namespace app\models;

use Yii;
//use yii\base\Model;
use yii\db\ActiveRecord;


class Tender extends ActiveRecord
{
    public static function tableName()
    {
       return 'tenders';
    }
}
