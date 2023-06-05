<?php

namespace App\Enums;

enum CensureType: string
{
    case L = 'L';
    case CENSURA_10 = '10';
    case CENSURA_12 = '12';
    case CENSURA_14 = '14';
    case CENSURA_16 = '16';
    case CENSURA_18 = '18';

    public static function toArray()
    {
        $statuses = [];

        foreach (static::cases() as $status) {
            $statuses[$status->value] = $status->name;
        }

        return $statuses;
    }
}
