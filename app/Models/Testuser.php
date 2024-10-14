<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testuser extends Model
{
    use HasFactory;
    protected $table = 'testusers';
    public $timestamps = false;
    public function addressData()
    {
        return $this->hasOne('App\Models\Address' , 'member_id');
    }
}
