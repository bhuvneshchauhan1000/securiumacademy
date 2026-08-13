<?php

namespace App\Support;

use Hashids\Hashids;

class HashId
{
    protected static ?Hashids $hashids = null;

    public static function hashids(): Hashids
    {
        if (static::$hashids === null) {
            static::$hashids = new Hashids(config('app.key'), 12);
        }

        return static::$hashids;
    }

    public static function encode(int $id): string
    {
        return static::hashids()->encode($id);
    }

    public static function decode(string $value): ?int
    {
        $ids = static::hashids()->decode($value);

        return $ids[0] ?? null;
    }
}
