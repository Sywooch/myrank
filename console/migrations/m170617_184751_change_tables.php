<?php

use yii\db\Migration;

class m170617_184751_change_tables extends Migration {

    public function safeUp() {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        
        $this->dropTable("{{user_company}}");
        $this->dropTable("{{user_marks}}");
        $this->dropTable("{{user_trustees}}");
        $this->dropTable("{{user_mark_rating}}");
        
        $this->createTable("{{user_company}}", [
            'id' => $this->bigPrimaryKey(20),
            'user_id' => $this->bigInteger(20)->notNull()->defaultValue(0)->comment("Айди юзверя"),
            'company_id' => $this->bigInteger(20)->notNull()->defaultValue(0)->comment("Айди компании"),
            'type' => $this->integer(2)->notNull()->defaultValue(0)->comment("Должность в компании"),
            'status' => $this->integer(2)->notNull()->defaultValue(0)->comment("Статус (0 - заявка, 1 - подтвержден)"),
            'created' => $this->timestamp()->defaultExpression("CURRENT_TIMESTAMP"),
                ], $tableOptions);

        $this->createTable("user_marks", [
            'id' => $this->primaryKey(),
            'from_id' => $this->bigInteger(20)->notNull(),
            'to_id' => $this->bigInteger(20)->notNull(),
            'type_from' => $this->integer(2)->notNull()->defaultValue(0),
            'type_to' => $this->integer(2)->notNull()->defaultValue(0),
            'description' => $this->text()->comment("Сохранение оценки"),
            'created' => $this->timestamp()->defaultExpression("CURRENT_TIMESTAMP"),
                ], $tableOptions);

        $this->createTable("user_trustees", [
            'id' => $this->primaryKey(),
            'from_id' => $this->bigInteger(20)->notNull()->comment("Кого добавили в доверенные"),
            'to_id' => $this->bigInteger(20)->notNull()->comment("Кто добавил в доверенные"),
            'type_from' => $this->integer(2)->notNull()->defaultValue(0),
            'type_to' => $this->integer(2)->notNull()->defaultValue(0),
            'created' => $this->timestamp()->defaultExpression("CURRENT_TIMESTAMP"),
                ], $tableOptions);
        
        $this->createTable("{{user_mark_rating}}", [
	    'id' => $this->bigPrimaryKey(20),
	    'from_id' => $this->bigInteger(20)->notNull(),
	    'to_id' => $this->bigInteger(20)->notNull(),
            'type_from' => $this->integer(2)->notNull()->defaultValue(0),
            'type_to' => $this->integer(2)->notNull()->defaultValue(0),
	    'mark_id' => $this->integer(2)->notNull(),
	    'mark_val' => $this->double(),
	], $tableOptions);
    }

    public function safeDown() {
        
    }

}
