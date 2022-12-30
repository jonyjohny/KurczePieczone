<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reproductionrowcages extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
    ];

    public function reproductionrow()
    {
        return $this->belongsTo(Reproductionrow::class, 'reproductionrow_id');
    }

    public function reproductionreport()
    {
        return $this->hasMany(ReproductionReport::class, 'reproductionrowcage_id');
    }
}
