<?php

class SecurityValidator
{

    private static function wp_atc_intval($field): int
    {
        return intval($field);
    }
    private static function wp_atc_sanitize_text_field($field)
    {
        return sanitize_text_field($field);
    }
    private static function wp_atc_sanitize_textarea_field($str)
    {
        return sanitize_textarea_field($str);
    }

    public static function wp_atc_integer_validator($field): int|bool
    {
        return self::wp_atc_intval(self::wp_atc_sanitize_text_field($field));
    }

    public static function wp_atc_string_validator($field): string
    {
        return self::wp_atc_sanitize_text_field($field);
    }
    public static function wp_atc_textarea_validator($str): string
    {
        return self::wp_atc_sanitize_textarea_field($str);
    }

    public static function wp_atc_phonenumber_validator($field): int
    {
        return self::wp_atc_intval(self::wp_atc_sanitize_text_field($field));
    }

    public static function wp_atc_nonce_validator($nonce): bool
    {
        return isset($nonce) && wp_verify_nonce($nonce);
    }
}
