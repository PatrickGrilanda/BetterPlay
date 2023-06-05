<?php

namespace App\Models;

use App\Enums\MediaStatus;
use App\Models\Traits\IdentifiesUsingUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ImageVideo extends Model
{
    use HasFactory, SoftDeletes, IdentifiesUsingUuids;

    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'path',
        'type'
    ];


    public function video()
    {
        return $this->belongsTo(Video::class);
    }
}
