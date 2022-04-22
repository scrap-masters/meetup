<?php

declare(strict_types=1);

namespace Database\Factories;

use Blumilk\Meetup\Core\Models\Organization;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class OrganizationFactory extends Factory
{
    protected $model = Organization::class;

    public function definition(): array
    {
        return [
            "name" => $this->faker->company(),
            "description" => $this->faker->word(),
            "location" => $this->faker->country(),
            "organization_type" => $this->faker->word(),
            "foundation_date" => Carbon::createFromDate(2022, 01, 01),
            "number_of_employers" => $this->faker->randomNumber(),
            "logo_path" => $this->faker->url(),
            "website_url" => $this->faker->url(),
        ];
    }
}