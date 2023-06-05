<?php

namespace App\Enums;

enum CastMemberType: int
{
    case DIRECTOR = 1;
    case ACTOR = 2;

    public static function toArray()
    {
        $statuses = [];

        foreach (static::cases() as $status) {
            $statuses[$status->value] = $status->name;
        }

        return $statuses;
    }
}
