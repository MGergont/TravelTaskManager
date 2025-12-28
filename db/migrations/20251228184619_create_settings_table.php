<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateSettingsTable extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('settings', [
            'id' => true,
            'primary_key' => ['id'],
        ]);

        $table
            ->addColumn('key', 'string', [
                'limit' => 100,
                'null' => false,
            ])
            ->addColumn('value', 'text', [
                'null' => false,
            ])
            ->addColumn('type', 'string', [
                'limit' => 20,
                'default' => 'string',
                'null' => false,
            ])
            ->addColumn('updated_at', 'timestamp', [
                'default' => 'CURRENT_TIMESTAMP',
            ])
            ->addIndex(['key'], [
                'unique' => true,
                'name' => 'idx_settings_key_unique',
            ])
            ->create();

        $this->insertPasswordPolicyDefaults();
    }

    private function insertPasswordPolicyDefaults(): void
    {
        $this->table('settings')->insert([
            [
                'key' => 'password.min_length',
                'value' => '8',
                'type' => 'int',
            ],
            [
                'key' => 'password.max_length',
                'value' => '64',
                'type' => 'int',
            ],
            [
                'key' => 'password.require_special',
                'value' => '1',
                'type' => 'bool',
            ],
            [
                'key' => 'password.require_digit',
                'value' => '1',
                'type' => 'bool',
            ],
            [
                'key' => 'password.require_uppercase',
                'value' => '1',
                'type' => 'bool',
            ],
            [
                'key' => 'password.expiration_days',
                'value' => '90',
                'type' => 'int',
            ],
        ])->saveData();
    }
}
