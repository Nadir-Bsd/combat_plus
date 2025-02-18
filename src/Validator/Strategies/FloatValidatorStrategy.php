<?php

class FloatValidatorStrategy implements ValidationInterface
{
    public function validate($value): bool
    {
        return filter_var($value, FILTER_VALIDATE_FLOAT) !== false;
    }
}
