<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Release extends Model
{
    use HasFactory;

    public function tracks() {
        return $this->hasMany("App\Models\Track");
    }

    public function genres() {
        return $this->belongsToMany("App\Models\Genre");
    }
}
