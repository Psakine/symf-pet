<?php

declare(strict_types=1);

namespace App\Model;


abstract class BaseModel
{
    public function __construct(array $data = [])
    {
        $this->fill($data);
    }

    private function fill(array $data): void
    {
        foreach ($data as $key => $value) {
            $property = $this->toCamelCase($key);
            $method = $this->getSetterMethodName($property);

            if (property_exists($this, $property) && method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    private function toCamelCase(string $name): string
    {
        return lcfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $name))));
    }

    private function toStakeCase(string $name): string
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $name));
    }

    private function getSetterMethodName(string $name): string
    {
        return 'set' . ucfirst($name);
    }
}
