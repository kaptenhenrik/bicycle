<?php

/**
 * @param $variable
 * @return mixed
 */
function env($variable)
{
    $file = file_get_contents(basePath() . '.env');
    $envArray = explode("\n", $file);
    $keyValues = array_map(function ($item) {
        $keyValue = explode('=', $item);
        return [$keyValue[0] => $keyValue[1]];
    }, $envArray);

    return head(array_column($keyValues, $variable));
}

/**
 * @param $array
 * @return mixed
 */
function head($array)
{
    return reset($array);
}

/**
 * @param $key
 * @param $array
 * @return mixed|null
 */
function array_get($key, $array)
{
    $array = wrap($array);
    return array_key_exists($key, $array) ? $array[$key] : null;
}

/**
 * @param $array
 * @return array
 */
function wrap($array)
{
    return is_array($array) ? $array : [$array];
}

/**
 * @return string
 */
function basePath()
{
    return dirname(__FILE__) . '/../';
}