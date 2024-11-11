<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . '../vendor/autoload.php';
// require_once __DIR__ . '/../../vendor/autoload.php';

use Firebase\JWT\JWT;

class JwtHelper {

    private static $key = "00f8c32d772955d4f790f0f67eb3ea16916a07e4d21e4cb2553cd317225b32e5"; // Use a secure key here

    public static function generate_jwt($payload) {
        return JWT::encode($payload, self::$key, 'HS256');
    }

    public static function decode_jwt($jwt) {
        return JWT::decode($jwt, self::$key, ['HS256']);
    }
}
