<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%post}}`.
 */
class m200427_211638_create_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%post}}', [
            'id' => $this->primaryKey(),
            // Nombre del producto
            'title' => $this->string()->notNull(),

            // Url de la imagen del producto
            'imageUrl' => $this->string(),

            // Precio del producto
            'price' => $this->float(),

            // Tipo de moneda CUC o CUP
            'moneyType' => $this->string(),

            // Descripción del producto
            'description' => $this->text()->notNull(),

            // Id del usuario de publicó el anuncio
            'created_by' => $this->integer()->notNull(),

            // Fechas de creación y actualización
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey('FK_post_user_created_by', '{{%post}}', 'created_by', '{{%user}}', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('FK_post_user_created_by', '{{%post}}');
        $this->dropTable('{{%post}}');
    }
}
