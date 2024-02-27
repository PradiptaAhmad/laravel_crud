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
        return $this->belongsTo(Classes::class, 'KelasId', 'id');
    }

    // Define a factory for generating fake data
    protected static function newFactory()
    {
        return \Database\Factories\StudentFactory::new();
    }
}
