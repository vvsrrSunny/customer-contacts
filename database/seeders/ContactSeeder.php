<?php

namespace Database\Seeders;

use App\Models\Contact;
use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure we have some customers to associate contacts with
        $customers = Customer::all();

        if ($customers->isEmpty()) {
            $customers = Customer::factory(3)->create(); // Create 5 customers if none exist
        }

        // Create 10 contacts and associate them with random customers
        Contact::factory(0)->create([
            'customer_id' => $customers[0]->id,
        ]);

        Contact::factory(3)->create([
            'customer_id' => $customers[1]->id,
        ]);

        Contact::factory(5)->create([
            'customer_id' => $customers[2]->id,
        ]);
    }
}
