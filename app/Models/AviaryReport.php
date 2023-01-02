<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
