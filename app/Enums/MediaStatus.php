<?php

namespace App\Enums;

enum MediaStatus: int
{
    case PROCESSING = 0;
    case PENDING = 1;
    case COMPLETE = 2;

    public static function toArray()
    {
        $statuses = [];

        foreach (static::cases() as $status) {
            $statuses[$status->value] = $status->name;
        }

        return $statuses;
    }
}
