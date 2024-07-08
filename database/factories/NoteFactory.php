<?php
namespace Database\Factories;

use App\Models\Note;
use Illuminate\Database\Eloquent\Factories\Factory;
 
class NoteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Note::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'note' => $this->faker->sentence,
            'user_id' => 1, // Replace with logic to assign a user_id if needed
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
