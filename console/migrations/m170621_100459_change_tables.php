<?php

use yii\db\Migration;

class m170621_100459_change_tables extends Migration {

    public function safeUp() {
        $this->dropForeignKey("fk-testimonials-user_from", "{{testimonials}}");
        $this->dropForeignKey("fk-testimonials-user_to", "{{testimonials}}");
        
        $this->dropColumn("{{testimonials}}", "user_from");
        $this->dropColumn("{{testimonials}}", "user_to");
        
        $this->addColumn("{{testimonials}}", "type_from", $this->integer(2)->notNull()->defaultValue(0)->after("status"));
        $this->addColumn("{{testimonials}}", "from_id", $this->bigInteger(20)->notNull()->defaultValue(0)->after("type_from"));
        $this->addColumn("{{testimonials}}", "type_to", $this->integer(2)->notNull()->defaultValue(0)->after("from_id"));
        $this->addColumn("{{testimonials}}", "to_id", $this->bigInteger(20)->notNull()->defaultValue(0)->after("type_to"));
    }

    public function safeDown() {
        $this->dropColumn("{{testimonials}}", "type_from");
        $this->dropColumn("{{testimonials}}", "from_id");
        $this->dropColumn("{{testimonials}}", "type_to");
        $this->dropColumn("{{testimonials}}", "to_id");
        
        $this->addColumn("{{testimonials}}", "user_from", $this->bigInteger(20)->notNull()->defaultValue(0)->after("status"));
        $this->addColumn("{{testimonials}}", "user_to", $this->bigInteger(20)->notNull()->defaultValue(0)->after("user_from"));
    }

    /*
      // Use up()/down() to run migration code without a transaction.
      public function up()
      {

      }

      public function down()
      {
      echo "m170621_100459_change_tables cannot be reverted.\n";

      return false;
      }
     */
}
