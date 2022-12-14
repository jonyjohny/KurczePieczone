<?php

namespace App\Models;

use App\Models\User;
use App\Models\Aviaryplace;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AviaryReport extends Model
{
    use HasFactory;
    use SoftDeletes;

    
    protected $fillable = [
    ];

    public function aviaryplace()
    {
        return $this->belongsTo(Aviaryplace::class, 'aviaryplace_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
