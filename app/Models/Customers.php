<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



class Customers extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'customers';
    protected $primaryKey = 'id';


    // accessor// for field like user_name use setUserNameAttribute
    //database is not affected
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords($value);
    }


    //mutuator to show address field in all capital form
    //database is not affected
    public function getAddressAttribute($value)
    {
        return $this->attributes['address'] = strtoupper($value);
    }

    // defining which blood does customer have
    public function getBloodGroup()
    {
        return $this->hasMany(Blood::class, 'id', 'blood_id');
    }


}