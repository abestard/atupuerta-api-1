<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%user}}`.
 */
class m200428_003856_add_phone_numbers_columns_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'phone_number', $this->string());
        $this->addColumn('{{%user}}', 'movil_number', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%user}}', 'phone_number', $this->string());
        $this->dropColumn('{{%user}}', 'movil_number', $this->string());
    }
}
