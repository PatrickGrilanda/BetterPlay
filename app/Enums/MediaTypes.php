<?php

namespace App\Enums;

enum MediaTypes: int
{
    case VIDEO = 0;
    case TRAILER = 1;

    public static function toArray()
    {
        $statuses = [];

        foreach (static::cases() as $status) {
            $statuses[$status->value] = $status->name;
        }

        return $statuses;
    }
}
