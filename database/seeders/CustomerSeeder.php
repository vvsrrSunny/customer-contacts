<?php

namespace Database\Seeders;

use App\Enums\Category;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::create([
            'name' => 'Customer A',
            'reference' => 'REF001',
            'category' => Category::Gold->value, // Example category, replace as per your Category enum
            'description' => 'Description for Customer A',
            'start_date' => now()->format('d/m/Y'),
        ]);

        Customer::create([
            'name' => 'Customer B',
            'reference' => 'REF002',
            'category' => Category::Silver->value, // Example category, replace as per your Category enum
            'description' => 'Description for Customer B',
            'start_date' => now()->subYear(6)->format('d/m/Y'),
        ]);

        Customer::create([
            'name' => 'Customer C',
            'reference' => 'REF003',
            'category' => Category::Bronze->value, // Example category, replace as per your Category enum
            'description' => 'Description for Customer C',
            'start_date' => now()->subMonths(6)->format('d/m/Y'),
        ]);
    }
}
