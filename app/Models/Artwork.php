<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artwork extends Model
{
    protected $table = 'artworks';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function artist() {
        return $this->belongsTo(Artist::class);
    }
    use HasFactory;
}
