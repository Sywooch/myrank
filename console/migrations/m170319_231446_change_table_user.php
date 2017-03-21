<?php

use yii\db\Migration;

class m170319_231446_change_table_user extends Migration {

    public function up() {
	$this->dropColumn("{{user}}", "account_id");
	$this->addColumn("{{user}}", "step", $this->integer(2)->defaultValue(0)->after("profileviews")->comment("На каком шаге регистрации находится пользователь"));
	$this->alterColumn("{{user}}", "company_name", $this->string(255)->defaultValue("")->comment("Название компании в которой пользователь работает"));
	$this->alterColumn("{{user}}", "company_post", $this->string(255)->defaultValue("")->comment("Должность"));
	$this->alterColumn("{{user}}", "image", $this->string(255)->defaultValue(""));
    }

    public function down() {
	$this->dropColumn("{{user}}", "step");
	$this->addColumn("{{user}}", "account_id", $this->integer(11));
    }

}
