<?php

namespace App\Models;

use App\Models\AviaryReport;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Aviaryplace extends Model
{
    use HasFactory;
    use SoftDeletes;

    
    protected $fillable = [
        'name',
        'remarks'
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
        return $this->hasMany(AviaryReport::class,'aviaryplaces_id');
    }
}
