<?php

namespace vendor;

class Input
{
    public static function addslashes($data)
    {
        foreach($data as $key => $value) {
            if (is_array($value)) {
                $data[$key] = static::addslashes($value);
            } else if (is_string($value)) {
                $data[$key] = addslashes($value);
            } else {
                $data[$key] = $value;
            }
        }
        return $data;
    }
}

?>