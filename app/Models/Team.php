<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'principal',
        'engine',
        'entry',
        'logo',
        'bg_image',
    ];

    public function creator(){
        return $this->belongsTo(Constructor::class, 'engine', 'id');
    }

    public function crew(){
        return $this->hasMany(Team::class, 'team', 'id');
    }
}
