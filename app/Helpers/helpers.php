<?php

if (!function_exists('sensorNama')) {
    function sensorNama($nama) {
        $length = strlen($nama);
        
        if ($length <= 1) {
            return '*';
        } elseif ($length <= 3) {
            return $nama[0] . str_repeat('*', $length - 1);
        } elseif ($length == 4) {
            return strtoupper($nama[0]) . '***' . strtoupper($nama[$length - 1]);
        } else {
            $firstChars = substr($nama, 0, 2);
            $lastChars = substr($nama, -2);
            $stars = str_repeat('*', max(3, $length - 4));
            return $firstChars . $stars . $lastChars;
        }
    }
}