<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customer';
    protected $primaryKey = 'id';
    protected $hidden = ['password'];
    protected $guarded = ['id'];

    public function getAuthPassword()
    {
        return $this->password;
    }
}
