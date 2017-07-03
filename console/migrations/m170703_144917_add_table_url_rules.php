<?php

use yii\db\Migration;

class m170703_144917_add_table_url_rules extends Migration {

    public function safeUp() {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable("{{url_rules}}", [
            'id' => $this->bigPrimaryKey(),
            'request' => $this->string(255)->notNull()->defaultValue(""),
            'route' => $this->string(255)->notNull()->defaultValue(""),
            'params' => $this->text()->null(),
            'created' => $this->timestamp()->defaultExpression("CURRENT_TIMESTAMP"),
        ], $tableOptions);
    }

    public function safeDown() {
        $this->dropTable("{{url_rules}}");
    }

}
