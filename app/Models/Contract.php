<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'contracts';

    protected $fillable = [
        'inquiries_id',
        'contracts_status',
        'payment_method',
        'payment_agreement',
    ];
    use HasFactory;

    public function payment()
    {
        return $this->hasMany(Payment::class, 'contracts_id');
    }
    public function maintenancecontract()
    {
        return $this->hasMany(MaintenanceContract::class, 'contracts_id');
    }
    public function inquiry()
    {
        return $this->belongsTo(Inquiry::class, 'inquiries_id');
    }

}
