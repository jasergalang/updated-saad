<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceContract extends Model
{
    use HasFactory;

    public function maintenances()
    {
        return $this->belongsTo(Maintenance::class, 'maintenances_id');
    }
    public function contracts()
    {
        return $this->belongsTo(Contract::class, 'contracts_id');
    }
}
