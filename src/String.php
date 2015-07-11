<?php

namespace Wjdhollow\Glob;


class String
{
    /**
     * * @param string $needle
     * @param string $haystack
     * @return bool
     */
    public static function startsWith($needle, $haystack)
    {
        $length = strlen($needle);
        return (substr($haystack, 0, $length) === $needle);
    }

    /**
     * @param string $needle
     * @param string $haystack
     * @return bool
     */
    public static function endsWith($needle, $haystack)
    {
        $length = strlen($needle);
        if ($length == 0) {
            return true;
        }

        return (substr($haystack, -$length) === $needle);
    }
}