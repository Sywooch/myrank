<?php

use yii\db\Migration;

class m170913_020017_add_local_state extends Migration {

    public function safeUp() {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable("{{geo_country}}", [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'code' => $this->string(3)->notNull(),
            'lang' => $this->string(5)->notNull(),
        ]);
    }

    public function safeDown() {
        $this->dropTable("{{geo_country}}");
    }

}
