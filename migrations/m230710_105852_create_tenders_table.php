<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tenders}}`.
 */
class m230710_105852_create_tenders_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tenders}}', [
            'id' => $this->primaryKey(),
            'tenderID' => $this->string(),
            'description' => $this->string(), 
            'amount' => $this->string(),
            'dateModified' => $this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tenders}}');
    }
}
