<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->name(),
            'deskripsi' => $this->faker->text(),
            'mulai' => $this->faker->dateTime(),
            'selesai' => $this->faker->dateTime(),
            'tempat' => $this->faker->streetName(),
            'link_gambar' => $this->faker->url(),
            'peserta' => $this->faker->name(),
            'penyelenggara' => $this->faker->name(),
            'status' => $this->faker->name(),
        ];
    }
}
