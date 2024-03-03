<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
    public function properties()
    {
        return $this->hasOne(Property::class);
    }
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
    public function maintenancecontract()
    {
        return $this->hasMany(MaintenanceContract::class, 'contracts_id');
    }
}
