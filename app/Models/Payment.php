<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    public function adminmanagepayment()
    {
        return $this->hasMany(AdminManageTenant::class, 'payment_id');
    }
    public function contract()
    {
        return $this->belongsTo(Contract::class, 'contracts_id');
    }
    public function owners()
    {
        return $this->belongsTo(Owner::class);
    }

}
