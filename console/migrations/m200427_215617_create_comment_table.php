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
            'start' => $this->integer(),

            // Usuario
            'created_by' => $this->integer(),

            // Post
            'post_id' => $this->integer(),

            // Comentario
            'text' => $this->text(),

            // Fechas de creación y actualización
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
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
