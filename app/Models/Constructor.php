<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Constructor extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'nation',
        'engine',
        'logo',
        'created_by'
    ];

    public function events(){
        return $this->hasMany(Team::class, 'engine', 'id');
    }

    public function creator(){
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

}
