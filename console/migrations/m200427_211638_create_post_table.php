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
            'title' => $this->string(),

            // Url de la imagen del producto
            'imageUrl' => $this->string(),

            // Precio del producto
            'price' => $this->float(),

            // Tipo de moneda CUC o CUP
            'moneyType' => $this->string(),

            // Descripción del producto
            'description' => $this->text(),

            // Id del usuario de publicó el anuncio
            'created_by' => $this->integer(),

            // Fechas de creación y actualización
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
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
