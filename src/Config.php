<?php

declare(strict_types=1);

namespace MyComponent;

use Keboola\Component\Config\BaseConfig;

class Config extends BaseConfig
{
    /**
     * @return int
     */
    public function getMaxUsers(): int
    {
        return $this->getValue(['maxUsers', 100]);
    }
}
