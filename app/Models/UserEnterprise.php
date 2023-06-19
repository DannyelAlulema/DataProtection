<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserEnterprise extends Model
{
    use HasFactory;

    protected $table = 'user_enterprises';

    protected $fillable = [
        'enterprise_id',
        'user_id',
        'paid'
    ];

    function user()
    {
        return $this->belongsTo(User::class);
    }

    function enterprise()
    {
        return $this->belongsTo(Enterprise::class);
    }
}
