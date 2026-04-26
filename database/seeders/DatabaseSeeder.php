<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Wipe existing tenant databases that start with 'club_'
        $prefix = config('tenancy.database.prefix');
        $centralDb = config('database.connections.mysql.database');

        $databases = \Illuminate\Support\Facades\DB::select('SHOW DATABASES');
        foreach ($databases as $database) {
            $dbName = $database->Database;
            // Only drop databases that start with the prefix and are not the central DB
            if (str_starts_with($dbName, $prefix) && $dbName !== $centralDb) {
                \Illuminate\Support\Facades\DB::statement("DROP DATABASE `{$dbName}`");
            }
        }

        // Admin::factory(10)->create();

        $this->call([
            AdminSeeder::class,
            TenantSeeder::class,
        ]);
    }
}
