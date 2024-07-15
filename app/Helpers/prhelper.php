<?php

if (!function_exists('removeAfterPeriod')) {
    /**
     * Remove the period and the characters following it in a string.
     *
     * @param string $string
     * @return string
     */
    function removeAfterPeriod($string) {
        $position = strpos($string, '.');
        return $position !== false ? substr($string, 0, $position) : $string;
    }
}

