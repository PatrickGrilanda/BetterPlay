<?php

namespace App\Models;

use App\Models\Traits\IdentifiesUsingUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Media extends Model
{
    use HasFactory, SoftDeletes, IdentifiesUsingUuids;

    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'filePath',
        'mediaStatus',
        'encodedPath'
    ];

    protected $casts = [
        'mediaStatus' => MediaStatus::class
    ];
}
