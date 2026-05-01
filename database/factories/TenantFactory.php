<?php

namespace Database\Factories;

use App\Models\Model;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Artisan;
use Spatie\Permission\Models\Role;

/**
 * @extends Factory<Model>
 */
class TenantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->unique()->word(),
            'manager_email' => $this->faker->unique()->safeEmail(),
            'status' => $this->faker->randomElement(['active', 'inactive']),
        ];
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterCreating(function (Tenant $tenant) {
            $tenant->domains()->create([
                'domain' => $tenant->id.'.localhost',
            ]);
            tenancy()->initialize($tenant->id);
            Artisan::call('db:seed', ['--class' => 'RolesSeeder']);
            // seed position , skill , player
            Artisan::call('db:seed', ['--class' => 'PositionSeeder']);
            Artisan::call('db:seed', ['--class' => 'SkillSeeder']);
            Artisan::call('db:seed', ['--class' => 'PlayerSeeder']);

            $user = User::factory()->create([
                'name' => 'Test Admin',
                'email' => $tenant->manager_email,
            ]);
            // assign role manager to user
            $user->assignRole('manager');

            tenancy()->end();

        });
    }
}
