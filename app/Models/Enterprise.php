<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enterprise extends Model
{
    use HasFactory;

    protected $fillable = [
        'sector_id',
        'personal_data_use_id',
        'personal_data_activity_id',
        'address',
        'bussines_name',
        'description',
        'ci_ruc',
        'email',
        'legal_representative',
        'phone_number'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_enterprises')->withPivot('paid');
    }

    public function dataUse()
    {
        return $this->belongsTo(PersonalDataUse::class, 'personal_data_use_id');
    }

    public function dataActivity()
    {
        return $this->belongsTo(PersonalDataActivity::class, 'personal_data_activity_id');
    }

    public function sector()
    {
        return $this->belongsTo(Sector::class, 'sector_id');
    }
}
