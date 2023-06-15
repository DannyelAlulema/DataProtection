<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'appointment_state_id',
        'user_enterprise_id',
        'date',
        'start_at',
        'end_at'
    ];

    public function state()
    {
        return $this->belongsTo(AppointmentState::class, 'appointment_state_id');
    }

    public function userEnterprise()
    {
        return $this->belongsTo(UserEnterprise::class);
    }
}
