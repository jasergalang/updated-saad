<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    protected $table = 'tenants';

    protected $fillable = ['id'];
    use HasFactory;

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function contract()
    {
        return $this->hasOne(Contract::class);
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }
    public function adminmanagetenant()
    {
        return $this->hasMany(AdminManagePayment::class, 'tenant_id');
    }
}
