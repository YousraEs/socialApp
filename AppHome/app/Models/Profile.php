<?php

namespace App\Models;

use App\Models\Publication;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
class Profile extends Authenticatable
{
    use HasFactory, AuthenticatableTrait;
    // use SoftDeletes;

    // protected $dates = ['created_at'];
    // sécurité
    protected $fillable = [
        'name',
        'email',
        'password',
        'bio',
        'image'
    ];

    // function de route model binding pour travailler avec name ou email ou ...
    // public function getRouteKeyName(){
    //     return 'name';
    // }

    public function getImageAttribute($value){
        return $value??'profile/profile.jpg';
    }

    public function publications(){
        return $this->hasMany(Publication::class);
    }
} 
