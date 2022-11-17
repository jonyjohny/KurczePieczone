<?php

namespace App\Models;

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

    public function reproductions()
    {
        return $this->belongsTo(Aviary::class, 'id_aviary');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
