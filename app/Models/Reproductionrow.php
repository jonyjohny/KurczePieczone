<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reproductionrow extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'remarks',
    ];

    public function reproduction()
    {
        return $this->belongsTo(Reproduction::class, 'id_reproduction');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function reproductionreport()
    {
        return $this->hasMany(ReproductionReport::class, 'reproductionrow_id');
    }

    public function reproductionrowcage()
    {
        return $this->hasMany(Reproductionrowcages::class, 'reproductionrow_id');
    }
}
