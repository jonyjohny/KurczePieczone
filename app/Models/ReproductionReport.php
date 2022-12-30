<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReproductionReport extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
    ];

    public function reproductionrow()
    {
        return $this->belongsTo(Reproductionrow::class, 'reproductionrow_id');
    }

    public function reproductionrowcage()
    {
        return $this->belongsTo(Reproductionrowcages::class, 'reproductionrowcage_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
