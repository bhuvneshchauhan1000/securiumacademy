<?php

namespace App\Support;

trait HasHashIdRouteBinding
{
    public function resolveRouteBinding($value, $field = null)
    {
        if ($field === null) {
            $value = HashId::decode($value);
        }

        return parent::resolveRouteBinding($value, $field);
    }
}
