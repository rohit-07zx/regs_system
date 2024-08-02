<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_form}}`.
 */
class m240730_114324_create_user_form_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'email' => $this->string()->notNull()->unique(),
            'countryCode' => $this->string()->notNull(),
            'phone' => $this->string()->notNull()->unique(),
            'gender' =>  "ENUM('M', 'T', 'F') NOT NULL DEFAULT 'M'",
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%users}}');
    }
}
