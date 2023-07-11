<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enterprise extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'sector_id',
        'personal_data_use_id',
        'personal_data_activity_id',
        'address',
        'bussines_name',
        'description',
        'ci_ruc',
        'email',
        'phone_number',
        'legal_representative',
        'legal_representative_ci',
        'legal_representative_phone',
        'legal_representative_email',
        'thirdPartyEmployees',
        'candidateData',
        'supplierData',
        'customerData',
        'thirdPartyCustomerData',
        'employeeData'
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

    function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
