<?php

if (!function_exists('maskEmail')) {
    function maskEmail($email)
    {
        $emailParts = explode("@", $email);
        $name = $emailParts[ 0 ];
        $domain = $emailParts[ 1 ];

        $maskedName = substr($name, 0, 1) . str_repeat('*', strlen($name) - 2) . substr($name, -1);
        $maskedEmail = $maskedName . '@' . $domain;

        return $maskedEmail;
    }
}

if (!function_exists('formatPhoneNumber')) {
    function formatPhoneNumber($phoneNumber)
    {
        if (strlen($phoneNumber) == 12) {
            return substr($phoneNumber, 0, 4) . '-' . substr($phoneNumber, 4, 4) . '-' . substr($phoneNumber, 8, 4);
        }

        return $phoneNumber;
    }
}
