<?php

class UserMapper implements MapperInterface
{
    public static function hydrate(array $data): User
    {
        return new User(
            $data['id'],
            $data['name'],
            $data['heroObject']
        );
    }
}
?>