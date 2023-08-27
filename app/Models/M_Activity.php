<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Activity extends Model
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

    public function lead()
    {
        return $this->belongsTo(M_Leads::class, 'leads_id');
    }

    public function activityType()
    {
        return $this->belongsTo(M_GlobalParams::class, 'activity_type_id', 'id_params');
    }
}
