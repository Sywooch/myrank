<?php

use yii\db\Migration;

class m170630_124427_alter_table_user_company extends Migration {

    public function safeUp() {
        $this->addColumn("{{user_company}}", "company_post", $this->string(255)->notNull()->defaultValue("")->comment("Должность в компании")->after("company_id"));
        $this->addColumn("{{user_company}}", "company_name", $this->string(255)->notNull()->defaultValue("")->comment("Название компании")->after("company_post"));
        $this->dropColumn("{{user_company}}", "type");
        
    }

    public function safeDown() {
        $this->dropColumn("{{user_company}}", "company_post");
        $this->dropColumn("{{user_company}}", "company_name");
        $this->addColumn("{{user_company}}", "type", $this->integer(2)->notNull()->defaultValue(0)->after("company_id"));
    }

}
