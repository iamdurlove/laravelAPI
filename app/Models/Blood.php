<?php

namespace App\Models;

use Database\Seeders\CustomerSeeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blood extends Model
{
    use HasFactory;
    protected $table = 'blood';
    protected $primaryKey = 'id';

    // defining list of customers have blood-id = id in blood
    public function getCustomers()
    {
        return $this->hasMany(Customers::class, 'blood_id', 'id');
    }
}