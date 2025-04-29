<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Organization;
use App\Models\User;
use DB;
use Illuminate\Database\Seeder;
use Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->truncateAllDataFromDatabase();

        $this->call([
            UserSeeder::class,
            OrganizationSeeder::class,
            OrganizationUsersSeeder::class,
        ]);
    }

    private function truncateAllDataFromDatabase(): void
    {
        Schema::disableForeignKeyConstraints();

        $tables = DB::connection()->getSchemaBuilder()->getTables();
        foreach ($tables as $table) {
            if ($table['name'] === 'migrations') {
                continue;
            }
            DB::table($table['name'])->truncate();
        }

        Schema::enableForeignKeyConstraints();
    }
}
