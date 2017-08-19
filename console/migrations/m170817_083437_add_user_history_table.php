<?php

use yii\db\Migration;

class m170817_083437_add_user_history_table extends Migration {

    public function safeUp() {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable("{{user_history}}", [
            'id' => $this->bigPrimaryKey(20),
            'from_id' => $this->bigInteger(20)->notNull()->defaultValue(0),
            'from_type' => $this->bigInteger(20)->notNull()->defaultValue(0),
            'to_id' => $this->bigInteger(20)->notNull()->defaultValue(0),
            'to_type' => $this->integer(2)->notNull()->defaultValue(0),
            'type' => $this->integer(2)->notNull()->defaultValue(0),
            'description' => $this->text(),
            'created' => $this->timestamp()->defaultExpression("CURRENT_TIMESTAMP"),
                ], $tableOptions);
    }

    public function safeDown() {
        $this->dropTable("{{user_history}}");
    }

}
