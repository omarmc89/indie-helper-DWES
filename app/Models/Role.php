<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Role extends Model
{
    use HasFactory;
    
    protected $table = 'roles';
    protected $primaryKey = 'id';
    public $timestamps = true;
    

    public function users() {
        return $this->belongsToMany(User::class);
    }

    public function artist() {
        return $this->hasMany(Artist::class);
    }
    
    public function organizer() {
        return $this->hasMany(Organiser::class);
    }
}
