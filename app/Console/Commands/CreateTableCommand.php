<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CreateTableCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-table-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create table';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $schemaName = config("database.connections.pgsql.database");
        $charset = config("database.connections.psql.charset");
        $collation = config("database.connections.mysql.collation");
        config(["database.connections.mysql.database" => null]);


        $query = "CREATE DATABASE IF NOT EXISTS $schemaName CHARACTER SET $charset COLLATE $collation;";

        DB::statement($query);
        config(["database.connections.mysql.database" => $schemaName]);

    }
}
