<?php

use yii\db\Migration;

class m170401_150902_add_def_value_user_rating extends Migration {

    public function up() {
	$this->alterColumn("{{user}}", 'rating', $this->integer(11)->defaultValue(0));
    }

    public function down() {
	
    }

}
