<?php

namespace App\Models;

use App\Models\User;
use App\Models\Reproduction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reproductionrow extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'name',
        'remarks'
    ];

    public function reproduction()
    {
        return $this->belongsTo(Reproduction::class, 'id_reproduction');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
