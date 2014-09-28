<?php

use yii\db\Schema;
use yii\db\Migration;

class m140928_131412_events extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%events}}', [
            'id' => Schema::TYPE_PK,
            //'type_id' => Schema::TYPE_INTEGER,
            'user_id' => Schema::TYPE_INTEGER,
            'title' => Schema::TYPE_STRING,
            'description' => Schema::TYPE_TEXT,
            'status' => Schema::TYPE_SMALLINT . ' NOT NULL DEFAULT 10',
            'occur_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
        ], $tableOptions);
        
        $this->addForeignKey('user_id', '{{%events}}', 'user_id', '{{%user}}', 'id');
    }

    public function down()
    {
        echo "m140928_131412_events cannot be reverted.\n";

        return false;
    }
}
