<?php

namespace App\Models;

use App\Models\User;
use App\Models\Reproductionrow;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReproductionReport extends Model
{
    use HasFactory;
    use SoftDeletes;

    
    protected $fillable = [
    ];

    public function reproductionrow()
    {
        return $this->belongsTo(Reproductionrow::class, 'reproductionrows_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
