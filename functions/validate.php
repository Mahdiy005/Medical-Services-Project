<?php
declare(strict_types=1);

function checkEmpty(mixed $value): bool
{
    if(empty($value))
    {
        return false;
    }
    return true;
}

function isEmail(string $email): bool
{
    if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    }
    return true;
}

function check_length(string $value, int $min): bool
{
    return strlen(trim($value)) >= $min;
}