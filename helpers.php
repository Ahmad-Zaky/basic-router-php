<?php


/**
 * Undocumented function
 *
 * @param [type] $dump
 * @return void
 */
if (! function_exists('d')) {
    function d($dump='')
    {
        return is_string($dump) AND die($dump);
    }
}

/**
 * Undocumented function
 *
 * @param [type] $dump
 * @return void
 */
if (! function_exists('dd')) {
    function dd()
    {
        foreach (func_get_args() as $dump) {
			echo "<pre>";
            var_dump($dump);
			echo "</pre>";
		}
        die;
    }
}

/**
 * Undocumented function
 *
 * @param [type] $dump
 * @return void
 */
if (! function_exists('dump')) {
    function dump($dump='')
    {
        foreach (func_get_args() as $dump) {
			echo "<pre>";
            var_dump($dump);
			echo "</pre>";
		}
    }
}
