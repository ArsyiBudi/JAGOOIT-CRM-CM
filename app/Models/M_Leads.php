<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class M_Leads extends Model
{
    use HasFactory;

    protected $table  = 'leads';

    protected $primaryKey = 'id';
    protected $fillable = [
        'business_name',
        'business_sector',
        'address',
        'pic_name',
        'pic_contact_number',
        'client_indicator',
        'lead_status',
    ];
    
    public function statusParam() : BelongsTo
    {
        return $this->belongsTo(M_GlobalParams::class, 'lead_status', 'id_params');
    }

    public function latestActivity(){
        return $this->hasOne(M_Activity::class, 'leads_id', 'id')
        ->join('global_params', 'global_params.id_params', '=', 'activity.activity_type_id')
        ->select('global_params.params_name')
        ->withDefault('-');
    }

    public function emails()
    {
        return $this->hasMany(M_Emails::class, 'leads_id');
    }
}
