<?php

use yii\db\Migration;

class m170405_234342_change_table_images extends Migration {

    public function up() {
	$this->dropForeignKey("fk-images-user_id", "{{images}}");
	$this->addColumn("{{images}}", "type", $this->integer(2)->notNull()->after("user_id")->defaultValue(0)->comment("Компания / Юзверь - 1/0"));
	$this->addColumn("{{images}}", "type_id", $this->bigInteger(20)->notNull()->after("type")->defaultValue(0)->comment("id компании или юзера"));
    }

    public function down() {
	$this->dropColumn("{{images}}", "type");
	$this->dropColumn("{{images}}", "type_id");
    }

}
