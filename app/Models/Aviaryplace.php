<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aviaryplace extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'remarks',
    ];

    public function aviary()
    {
        return $this->belongsTo(Aviary::class, 'id_aviary');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function aviaryreport()
    {
        return $this->hasMany(AviaryReport::class, 'aviaryplace_id');
    }
}
