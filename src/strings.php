<?php

declare(strict_types=1);

namespace php\strings;

function compare(string $a, string $b) : int
{
    return $a <=> $b;
}

function contains(string $string, string $substring) : bool
{
    if (strlen($substring) === 0) {
        return true;
    }

    return strpos($string, $substring) !== false;
}

function has_prefix(string $string, string $prefix) : bool
{
    if (strlen($prefix) === 0) {
        return true;
    }

    return strpos($string, $prefix) === 0;
}

function has_suffix(string $string, string $suffix) : bool
{
    if (strlen($suffix) === 0) {
        return true;
    }

    return substr($string, -1 * strlen($suffix)) === $suffix;
}
