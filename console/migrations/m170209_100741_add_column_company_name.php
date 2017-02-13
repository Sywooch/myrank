<?php

use yii\db\Migration;

class m170209_100741_add_column_company_name extends Migration {

    public function up() {
	$this->addColumn("{{user}}", "company_name", $this->string(255)->after("company_id")->comment("Название компании в которой пользователь работает"));
	$this->addColumn("{{user}}", "company_post", $this->string(255)->after("company_name")->comment("Должность"));
    }

    public function down() {
	$this->dropColumn("{{user}}", "company_name");
	$this->dropColumn("{{user}}", "company_post");
    }

}
