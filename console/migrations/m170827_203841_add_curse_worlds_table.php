<?php

use yii\db\Migration;

class m170827_203841_add_curse_worlds_table extends Migration {

    public function safeUp() {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
    
        $this->createTable("{{curse_words}}", [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
        ], $tableOptions);
    }

    public function safeDown() {
        $this->dropTable("{{curse_worlds}}");
    }
    
}