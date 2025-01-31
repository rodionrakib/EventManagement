<?php
class Validator {
    public static function string($string,$minLength=1,$maxLength=INFO_ALL)
    {
        $value = trim(strlen($string));
        return $value >= $minLength && $value < $maxLength;
    }

    public static function number($value)
    {
        return is_numeric($value);
    }

    public static function email($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);

    }

    public static function date($date,DateTime $minDate = null)
    {
        try {
           if (!$minDate) return  new DateTime($date);
            return new DateTime($date) &&  new DateTime($date) > $minDate;
        } catch (Exception $e) {
            return false;
        }
    }
}
