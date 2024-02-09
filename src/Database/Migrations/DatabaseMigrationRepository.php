<?php

namespace Orvital\Core\Database\Migrations;

use Illuminate\Database\Migrations\DatabaseMigrationRepository as BaseDatabaseMigrationRepository;
use Illuminate\Support\Str;

class DatabaseMigrationRepository extends BaseDatabaseMigrationRepository
{
    public function log($file, $batch)
    {
        $record = [
            'id' => (string) Str::ulid(),
            'migration' => $file,
            'batch' => $batch,
        ];

        $this->table()->insert($record);
    }

    public function createRepository()
    {
        $schema = $this->getConnection()->getSchemaBuilder();

        $schema->create($this->table, function ($table) {
            $table->ulid('id')->primary();
            $table->integer('batch');
            $table->string('migration');
        });
    }
}
