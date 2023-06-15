<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserEnterprise extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'enterprise_id',
        'user_id',
        'paid'
    ];

    protected $table = 'user_enterprises';

    function user()
    {
        return $this->belongsTo(User::class);
    }

    function enterprise()
    {
        return $this->belongsTo(Enterprise::class);
    }
}
