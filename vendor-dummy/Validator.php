<?php

namespace Framework;

class Validator
{
    const EU_DATE = '/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/';

    /**
     * @param string $str
     * @param int $min
     * @param int $max
     * @return bool
     */
    public static function length(string $str, int $min = 0, int $max = 65353): bool
    {
        return strlen($str) >= $min && strlen($str) <= $max;
    }

    /**
     * @param string $dateStr
     * @param string $regex
     * @return bool
     */
    public static function dateFormat(string $dateStr, string $regex = self::EU_DATE): bool
    {
        return preg_match($regex, $dateStr);
    }
}