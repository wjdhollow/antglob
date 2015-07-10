<?php

namespace Wjdhollow;


class Path
{

    /**
     * @param string $path
     * @return bool
     */
    public static function isAbsolute($path)
    {
        return String::startsWith('/', $path);
    }

    /**
     * @param string $path
     * @return bool
     */
    public static function isRelative($path)
    {
        return !Path::isAbsolute($path);
    }
}