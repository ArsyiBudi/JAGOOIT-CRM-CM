<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityModel extends Model
{
    use HasFactory;
    protected $table = 'activity';
    
    protected $fillable = [
        'activity_type_id',
        'leads_id',
        'xs1',
        'xs2',
        'xd',
        'desc',
    ];
}
