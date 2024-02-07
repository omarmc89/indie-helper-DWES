<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organiser extends Model
{
    protected $table = 'organisers';
    protected $primaryKey = 'id';
    public $timestamps = false;
    
    public function rol() {
        return $this->hasOne(Role::class);
    }
    use HasFactory;
}
