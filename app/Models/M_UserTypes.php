<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_UserTypes extends Model
{
    use HasFactory;

    protected $table = 'user_types';

    protected $primaryKey = 'id';

    protected $fillable = [
        'description'
    ];
}
