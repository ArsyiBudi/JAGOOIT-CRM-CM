<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class M_Emails extends Model
{
    use HasFactory;

    protected $table = 'emails';

    protected $primaryKey = 'id';

    protected $fillable = [
        'leads_id',
        'email_name'
    ];

    public $timestamps = false;

    public function lead()
    {
        return $this->belongsTo(M_Leads::class, 'leads_id');
    }
}
