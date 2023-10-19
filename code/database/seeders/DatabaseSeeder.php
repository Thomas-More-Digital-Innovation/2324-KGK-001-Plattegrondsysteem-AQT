<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            WerkplekSeeder::class,
            PlantSeeder::class,
            InventarisSeeder::class,
            PlantgroepSeeder::class,
            DiersoortSeeder::class, 
            DierSeeder::class,
            ProtocoltypeSeeder::class,
            ProtocolDetailSeeder::class,
            DierProtocolSeeder::class,
            VoedingsrichtlijnenSeeder::class,
            VoedingstypeSeeder::class,
            LampSeeder::class,
            LampkantSeeder::class,
            CommentSeeder::class,
            MedischeFicheSeeder::class
        ]);
    }
}
