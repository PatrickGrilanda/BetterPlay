<?php

namespace App\Models;

use App\Models\Traits\IdentifiesUsingUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CastMember extends Model
{
    use HasFactory, SoftDeletes, IdentifiesUsingUuids;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'name',
        'type'
    ];

    public function videos()
    {
        return $this->belongsToMany(Video::class);
    }
}
