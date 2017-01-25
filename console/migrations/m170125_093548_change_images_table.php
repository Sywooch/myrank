<?php

use yii\db\Migration;

class m170125_093548_change_images_table extends Migration {

    public function up() {
	$this->addColumn("{{images}}", "user_id", $this->bigInteger()->after("id"));
	$this->dropColumn("{{user}}", "way");
    }

    public function down() {
	$this->dropColumn("{{images}}", "user_id");
    }

}
