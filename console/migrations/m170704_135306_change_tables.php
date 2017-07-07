<?php

use yii\db\Migration;

class m170704_135306_change_tables extends Migration {

    public function up() {
        $tableOption = 'ENGINE=InnoDb CHARACTER SET utf8';
        $this->createTable('{{seo_url}}', [
            'id' => $this->primaryKey(),
            'link' => $this->string(255)->notNull()->comment("Ссылка на фронте"),
            'canonical' => $this->string(255)->notNull()->comment("Каноническая ссылка"),
            'route' => $this->string(255)->notNull()->comment("Внутреняя перелинковка"),
            'params' => $this->string(255)->notNull()->comment("Гет запросы"),
                ], $tableOption . ' COMMENT "Таблица ссылок"');

        $this->createTable("{{seo_url_params}}", [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'value' => $this->string(255)->notNull(),
                ], 'ENGINE=InnoDb CHARACTER SET utf8 COMMENT "Таблица списка параметров"');

        $this->createTable("{{seo_url_params_rel}}", [
            'id' => $this->primaryKey(),
            'seo_id' => $this->integer(11)->null()->comment('Идентификатор записи в таблице {{seo_url}}'),
            'param_id' => $this->integer(11)->null()->comment("Идентификатор записи в таблице {{seo_url_params}}"),
                ], 'ENGINE=InnoDb CHARACTER SET utf8 COMMENT "Таблица связи ссылок и параметров"');
        
        $this->createTable("{{url_rules}}", [
            'id' => $this->primaryKey(),
            'contr_act' => $this->string(255)->notNull()->defaultValue(""),
            'rules' => $this->string(255)->notNull()->defaultValue(""),
            'created' => $this->timestamp()->defaultExpression("CURRENT_TIMESTAMP"),
        ], $tableOption);
    }

    public function down() {
        $this->dropTable("{{seo_url}}");
        $this->dropTable("{{seo_url_params}}");
        $this->dropTable("{{seo_url_params_rel}}");
        $this->dropTable("{{url_rules}}");
    }

}
