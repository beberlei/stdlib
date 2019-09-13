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

    return index($string, $substring) >= 0;
}

function has_prefix(string $string, string $prefix) : bool
{
    if (strlen($prefix) === 0) {
        return true;
    }

    return index($string, $prefix) === 0;
}

function has_suffix(string $string, string $suffix) : bool
{
    if (strlen($suffix) === 0) {
        return true;
    }

    return substr($string, -1 * strlen($suffix)) === $suffix;
}

function index(string $string, string $substring) : int
{
    $pos = strpos($string, $substring);

    if ($pos === false) {
        return -1;
    }

    return $pos;
}

function join(array $strings, string $separator) : string
{
    return implode($separator, $strings);
}

function last_index(string $string, string $substring) : int
{
    $pos = strrpos($string, $substring);

    if ($pos === false) {
        return -1;
    }

    return $pos;
}

function map(callable $fn, string $string) : string
{
    $len = strlen($string);
    $new = "";

    for ($i = 0; $i < $len; $i++) {
        $new .= $fn($string[$i]);
    }

    return $new;
}

function repeat(string $string, int $count) : string
{
    if ($count < 0) {
        throw new \UnexpectedValueException("Count is required to be >= 0.");
    }

    return str_repeat($string, $count);
}

function replace(string $string, string $old, string $new, int $n = -1)
{
    if ($n < 0) {
        return str_replace($old, $new, $string);
    }

    return preg_replace('(' . preg_quote($old) . ')', $new, $string, $n);
}

function split(string $string, string $separator) : array
{
    if (strlen($separator) === 0) {
        return str_split($string);
    }

    return explode($separator, $string);
}
