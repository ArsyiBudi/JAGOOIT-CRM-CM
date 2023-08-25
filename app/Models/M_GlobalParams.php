<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_GlobalParams extends Model
{
    use HasFactory;

    protected $table = 'global_params';

    protected $primaryKey = 'id_params';

    protected $fillable = [
        'params_name',
        'id_params_type',
        'param_type'
    ];
}
