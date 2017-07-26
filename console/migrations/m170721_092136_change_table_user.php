<?php

use yii\db\Migration;

class m170721_092136_change_table_user extends Migration {

    public function safeUp() {
        $this->dropColumn("{{user}}", "company_id");
        $this->dropColumn("{{user}}", "company_name");
        $this->dropColumn("{{user}}", "company_post");
    }

    public function safeDown() {
        
    }

}
