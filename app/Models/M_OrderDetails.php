<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class M_OrderDetails extends Model
{
    use HasFactory;

    protected $table = 'order_details';

    protected $primaryKey = 'id';

    protected $fillable = [
        'talent_id',
        'order_id',
        'pre_score',
        'post_score',
        'group_score',
        'final_score',
        'recruitment_status'
    ];

    public function orders()
    {
        return $this -> belongsTo(M_Orders::class, 'order_id');
    }

    public function talentData() : BelongsTo
    {
        return $this -> belongsTo(M_Talents::class, 'talent_id', 'id');
    }
}
