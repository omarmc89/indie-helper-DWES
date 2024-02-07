<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Painting extends Model
{
    use HasFactory;

    protected $table = 'paintings';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function artwork() {
        return $this->hasOne(Artwork::class);
    }
}

//añadir a painting y photo
