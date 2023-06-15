<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'pay_request_state_id',
        'user_enterprise_id',
        'detail',
        'voucher_path'
    ];

    public function state()
    {
        return $this->belongsTo(PayRequestState::class, 'pay_request_state_id');
    }

    public function userEnterprise()
    {
        return $this->belongsTo(UserEnterprise::class, 'user_enterprise_id');
    }
}
