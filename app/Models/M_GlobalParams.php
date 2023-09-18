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

    public function appoinmentParam()
    {
        $globalParam = M_GlobalParams::where('params_name', '=', "Appointment")->first();
        if ($globalParam) {
            return $globalParam->id_params;
        }
        return null;
    }
    public function notesParam()
    {
        $globalParam = M_GlobalParams::where('params_name', '=', "Notes")->first();
        if ($globalParam) {
            return $globalParam->id_params;
        }
        return null;
    }
    public function reportParam()
    {
        $globalParam = M_GlobalParams::where('params_name', '=', "Report")->first();
        if ($globalParam) {
            return $globalParam->id_params;
        }
        return null;
    }
}
