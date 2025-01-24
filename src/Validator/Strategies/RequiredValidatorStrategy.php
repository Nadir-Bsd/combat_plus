<?php

class RequiredValidatorStrategy implements ValidationInterface
{
    public function validate($value): bool
    {
        return isset($value) && !empty(trim($value));
    }
}