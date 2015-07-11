<?php

namespace Wjdhollow\Glob;


class AntGlobSymbol
{
    const STAR = '\*';
    const QUESTION_MARK = '\?';
    const STAR_STAR = '\*\*';
    const STAR_STAR_SLASH = '\*\*\/';

    /**
     * @return string[] -> str
     */
    public static function symbolRegexMap()
    {
        return [
            AntGlobSymbol::STAR => '[^\/]*',
            AntGlobSymbol::QUESTION_MARK => '.',
            AntGlobSymbol::STAR_STAR => '(.*?)*',
            AntGlobSymbol::STAR_STAR_SLASH => '(\/?.*?\/)*',
        ];
    }
}