<?php

namespace App\Enums;

enum ImageTypes: int
{
    case BANNER = 0;
    case THUMB = 1;
    case THUMB_HALF = 2;

    public static function toArray()
    {
        $statuses = [];

        foreach (static::cases() as $status) {
            $statuses[$status->value] = $status->name;
        }

        return $statuses;
    }
}
