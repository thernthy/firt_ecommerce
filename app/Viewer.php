<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
class Viewer extends Model
{
    protected $fillable = ['name', 'email']; // Define fillable fields

    // Add any relationships here (e.g., if a Viewer has many something)
    // Example: public function something()
    // {
    //     return $this->hasMany(Something::class);
    // }
}