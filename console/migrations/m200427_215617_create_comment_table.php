<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%comment}}`.
 */
class m200427_215617_create_comment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%comment}}', [
            'id' => $this->primaryKey(),

            // Number of Starts
            'start' => $this->integer()->notNull(),

            // Usuario
            'created_by' => $this->integer()->notNull(),

            // Post
            'post_id' => $this->integer()->notNull(),

            // Comentario
            'text' => $this->text()->notNull(),

            // Fechas de creación y actualización
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey('FK_comment_user_created_by', '{{%comment}}', 'created_by', '{{%user}}', 'id');
        $this->addForeignKey('FK_comment_post_post_id', '{{%comment}}', 'post_id', '{{%post}}', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('FK_comment_user_created_by', '{{%comment}}');
        $this->dropForeignKey('FK_comment_post_post_id', '{{%comment}}');
        $this->dropTable('{{%comment}}');
    }
}
