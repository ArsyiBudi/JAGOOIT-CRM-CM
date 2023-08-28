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

    public function emails()
    {
        return $this->hasMany(M_Emails::class, 'leads_id');
    }

    public function latestActivity()
    {
        return $this->hasOne(M_Activity::class, 'leads_id')->latest();
    }

    public function latestActivityParams()
    {
        return $this->hasOneThrough(
            M_GlobalParams::class,
            M_Activity::class,
            'leads_id',
            'id_params',
            'id',
            'activity_type_id'
        );
    }
}
