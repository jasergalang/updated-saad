<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    use HasFactory;

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
    public function maintenancecontract()
    {
        return $this->hasMany(MaintenanceContract::class, 'maintenances_id');
    }
}
