<?php

if (!function_exists('redirect')) {
    function redirect(string $url) {
        $basepath = 'http://' . $_SERVER['SERVER_NAME'];
        header("Location: " . $basepath . $url);
    }
}