<?php

namespace App\Models;

use App\Models\User;
use App\Models\Incubationincubator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class IncubationReport extends Model
{
    use HasFactory;
    use SoftDeletes;

    
    protected $fillable = [
    ];

    public function incubationincubator()
    {
        return $this->belongsTo(Incubationincubator::class, 'incubationincubator_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
