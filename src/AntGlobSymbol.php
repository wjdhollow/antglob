<?php

namespace Wjdhollow;


class AntGlobSymbol
{
    const STAR = '\*';
    const QUESTION_MARK = '\?';
    const STAR_STAR = '\*\*';

    /**
     * @return string[] -> str
     */
    public static function symbolRegexMap()
    {
        return [
            AntGlobSymbol::STAR => '^[\/]*',
            AntGlobSymbol::QUESTION_MARK => '.',
            AntGlobSymbol::STAR_STAR => '.*',
        ];
    }
}