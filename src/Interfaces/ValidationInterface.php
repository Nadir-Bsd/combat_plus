<?php

interface ValidationInterface
{
    public function validate($value): bool;
}