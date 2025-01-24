<?php

class Validator
{
    private $strategies = [];

    public function addStrategy(string $field, ValidationInterface $strategy)
    {
        if (!isset($this->strategies[$field])) {
            $this->strategies[$field] = [];
        }
        $this->strategies[$field][] = $strategy;
    }

    public function validate(array $data): bool
    {

        foreach ($this->strategies as $field => $strategies) {
            foreach ($strategies as $strategy) {
                if (!isset($data[$field]) || !$strategy->validate($data[$field])) {
                    return false;
                }
            }
        }
        return true;
    }

    public function sanitize(array $data): array
    {
        $newData = [];
        foreach ($data as $key => $value) {
            if($key === 'name') {
                $newData[$key] = $value;
                continue;
            }
            
            if($key === 'id_user') {
                $newData[$key] = $value;
                continue;
            }
            
            $newData[$key] = $value * 100;
        }

        $sanitizedData = [];
        foreach ($newData as $field => $value) {
            $sanitizedData[$field] = htmlspecialchars(trim($value));
        }
        return $sanitizedData;
    }

    public function checkMethods(string $method): bool
    {
        if ($_SERVER['REQUEST_METHOD'] !== $method) {
            header("location: ../../public/home.php?error{$method}=1");
            exit;
        }
        return true;
    }
}

