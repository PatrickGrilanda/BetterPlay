<?php

namespace App\Models\Traits;

use Ramsey\Uuid\Uuid;


trait IdentifiesUsingUuids
{

    protected static function bootIdentifiesUsingUuids()
    {
        static::creating(function ($model) {
            $model->setAttribute($model->getKeyName(), Uuid::uuid4());
        });
    }
}
