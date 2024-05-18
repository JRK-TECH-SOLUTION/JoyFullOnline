<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\SystemUser;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        SystemUser::factory()->create([
            'FullName' => 'Administrator',
            'Email' => 'admin@admin.com',
            'PhoneNumber' => '09123456789',
            'Address' => 'Admin Address',
            'role' => 'Owner',
            'Password' => '$2y$10$E02qN8SybAEdNjmP1nz7Y.TRuJylO56964iogwlJzHa..KWHtcIFe',
            'VerificationCode' => '123456',
            'email_verified_at'=> now(),
            'Status'=> 'Active',
            'remember_token'=> '123',
        ]);
        SystemUser::factory()->create([
            'FullName' => 'Kitchen Staff',
            'Email' => 'Kitchen@admin.com',
            'PhoneNumber' => '09123456798',
            'Address' => 'Kitchen Address',
            'role' => 'Kitchen',
            'Password' => '$2y$10$E02qN8SybAEdNjmP1nz7Y.TRuJylO56964iogwlJzHa..KWHtcIFe',
            'VerificationCode' => '123456',
            'email_verified_at'=> now(),
            'Status'=> 'Active',
            'remember_token'=> '123',
        ]);
        SystemUser::factory()->create([
            'FullName' => 'Rider 1',
            'Email' => 'Rider@admin.com',
            'PhoneNumber' => '09123456798',
            'Address' => 'Rider1 Address',
            'role' => 'Rider',
            'Password' => '$2y$10$E02qN8SybAEdNjmP1nz7Y.TRuJylO56964iogwlJzHa..KWHtcIFe',
            'VerificationCode' => '123456',
            'email_verified_at'=> now(),
            'Status'=> 'Active',
            'remember_token'=> '123',
        ]);

    }
}
