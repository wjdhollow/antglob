<?php

namespace Wjdhollow\Glob;

class AntGlob
{
    /** @var string  */
    private $glob;

    /**
     * @param string $glob
     */
    public function __construct($glob)
    {
        if (String::endsWith('/', $glob)) {
            $glob .= '**';
        }

        $this->glob = $glob;
    }

    /*
     * @return string
     */
    public function getBasePath()
    {
        if (!String::startsWith('/', $this->glob)) {
            return '';
        }
        $pos = 0;
        $arr = str_split($this->glob);
        $size = count($arr);

        for ($i = 0; $i < $size; $i++) {
            if ($arr[$i] == '*') {
                break;
            }
            else if ($arr[$i] == '/') {
                $pos = $i;
            }
        }

        return substr($this->glob, 0, $pos + 1);
    }

    /**
     * @return string
     */
    public function getRelative()
    {
        $basePath = $this->getBasePath();
        if (empty($basePath)) {
            return $this->glob;
        }
        else {
            return substr($this->glob, strlen($this->getBasePath()));
        }
    }

    /**
     * This method converts the glob pattern to a regex
     *
     * @return string
     */
    public function toRegex()
    {
        $regex = '/^' . $this->convertGlobSymbolsToRegex($this->glob) . '$/';

        return $regex;
    }

    /**
     * @param string $str
     * @return string
     */
    private function convertGlobSymbolsToRegex($str)
    {
        $escaped = preg_quote($str, DIRECTORY_SEPARATOR); // Escape regex characters
        $regex = '';
        $length = strlen($escaped);
        $i = 0;
        $map = AntGlobSymbol::symbolRegexMap();
        $keys = array_keys($map);

        while ($i < $length) {
            if ($i < $length - 5 && in_array(substr($escaped, $i, 6), $keys)) {
                $symbolKey = substr($escaped, $i, 6);
                $replacement = $map[$symbolKey];
            }
            else if ($i < $length - 3 && in_array(substr($escaped, $i, 4), $keys)) {
                $symbolKey = substr($escaped, $i, 4);
                $replacement = $map[$symbolKey];
            }

            else if ($i < $length -1 && in_array(substr($escaped, $i, 2), $keys)) {
                $symbolKey = substr($escaped, $i, 2);
                $replacement = $map[$symbolKey];
            }

            else {
                $symbolKey = substr($escaped, $i, 1);
                $replacement = $symbolKey;
            }

            $i += strlen($symbolKey);
            $regex .= $replacement;
        }

        return $regex;
    }

    /**
     * @param string $subject
     * @return bool
     */
    public function isMatch($subject)
    {
        $regex = $this->toRegex();
        return preg_match($regex, $subject) > 0;
    }
}