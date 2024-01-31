<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $table = 'artists';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function role() {
        return $this->hasOne(Role::class);
    }

    public function artworks() {
        return $this->hasMany(Artwork::class);
    }
    use HasFactory;
}
