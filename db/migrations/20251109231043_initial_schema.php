<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class InitialSchema extends AbstractMigration
{
    public function up(): void
    {
        $this->execute(file_get_contents(__DIR__ . '/../initial-database.sql'));
    }
    
    public function down(): void
    {
        // opcjonalnie: nie cofać
    }
}
