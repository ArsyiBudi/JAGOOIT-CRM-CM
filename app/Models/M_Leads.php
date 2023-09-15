<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

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

    public function hasOneOrder() : HasOne
    {
        return $this -> hasOne(M_Orders::class, 'leads_id');
    }
    
    public function orders() : HasMany
    {
        return $this -> hasMany(M_Orders::class, 'leads_id');
    }

    public function hasOneEmail() : HasOne
    {
        return $this -> hasOne(M_Emails::class, 'leads_id');
    }

    public function emails() : HasMany
    {
        return $this->hasMany(M_Emails::class, 'leads_id');
    }

    public function hasOneActivity()
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
        )->latest();
    }

    public function ActivityData() : HasMany
    {
        return $this -> hasMany(M_Activity::class, 'leads_id')->latest();
    }

    public function hasNote() : HasOne
    {
        return $this -> hasOne(M_Activity::class, 'leads_id')->where('activity_type_id', 10)->latest();
    }

    public function hasOnePopks() : HasOne
    {
        return $this -> hasOne(M_Popks::class, 'leads_id');
    }

    public function popks() : HasMany
    {
        return $this -> hasMany(M_Popks::class, 'leads_id');
    }
}