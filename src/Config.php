<?php

declare(strict_types=1);

namespace MyComponent;

use Keboola\Component\Config\BaseConfig;

class Config extends BaseConfig
{
    public function getMaxUsers(): int
    {
        return (int) $this->getValue(['parameters', 'maxUsers']);
    }
}
