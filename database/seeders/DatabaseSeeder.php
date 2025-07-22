<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Messenger;
use App\Models\Room;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'username' => 'superadmin',
            'password' => 'superadmin12345',
        ]);

        Messenger::factory()->create([
            'user_id' => '5',
            'driver_id' => '4',
            'room_id' => '1',
            'message' => 'bro',
            'customer_name' => 'Heaven Dave Ancheta',
            'driver_name' => 'John',
            'profile' => 'profile/gfIxDVIeSEtdSHq5gTAz0qZK3gIz0f62eVARRppR.jpg',
            'seenStatus' => '',
            'messageStatus' => '',
        ]);
        Room::factory()->create([
            'user_id' => '5',
            'driver_id' => '4',
             'customer_name' => 'John Done',
            'driver_name' => 'Heaven Dave Ancheta',
            'customer_profile' => 'profile/gfIxDVIeSEtdSHq5gTAz0qZK3gIz0f62eVARRppR.jpg',
            'driver_profile' => 'profile/gfIxDsIeSEtdSHq5gTAz0qZK3gIz0f62eVARRppR.jpg',
        ]);
    }
}
