<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['Nama', 'NIS', 'KelasId', 'Alamat'];

    public function class()
    {
        // Assuming 'KelasId' is the foreign key in the 'students' table
        return $this->belongsTo(Classes::class, 'KelasId', 'id');
    }
    protected $model = Student::class;

    public function definition()
    {
        return [
            'Nama' => $this->faker->unique()->word,
            'NIS' => $this->faker->unique()->randomNumber(8),
            'KelasId' => $this->faker->numberBetween(1, 4),
            'Alamat' => $this->faker->address(),
            // Add other fields as needed
        ];
    }
}
