<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('services')->insert([
            ['name' => 'General Service', 'description' => 'Full check-up and bike inspection.','price' => 500.00],
            ['name' => 'Oil Change', 'description' => 'Engine oil replacement for smooth performance.','price' => 300.00,],
            ['name' => 'Brake & Safety Check', 'description' => 'Inspection and maintenance of brake system.','price' => 250.00,],
            ['name' => 'Battery & Electrical Check', 'description' => 'Checking battery health, lights, and wiring.','price' => 350.00,],
            ['name' => 'Chain & Tyre Maintenance', 'description' => 'Chain lubrication, tyre pressure, and wheel alignment.','price' => 250.00,],
            ['name' => 'Water Wash & Polishing', 'description' => 'Complete bike cleaning and polishing.','price' => 200.00,],
        ]);
    }
}
