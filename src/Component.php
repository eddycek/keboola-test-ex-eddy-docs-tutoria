<?php

declare(strict_types=1);

namespace MyComponent;

use RuntimeException;
use DateTime;
use Exception;
use Keboola\Component\BaseComponent;

class Component extends BaseComponent
{
    protected function run(): void
    {
        $file = fopen(sprintf(
            '%s/out/tables/users-%s.csv',
            $this->getDataDir(),
            (new DateTime())->format('Y-m-d-H-i-s')
        ), 'wb');

        if ($file === false) {
            throw new RuntimeException('File not exist.');
        }

        foreach (Users::make(random_int(1, $this->maxUsers())) as $user) {
            fputcsv($file, $user);
        }

        fclose($file);
    }

    protected function getConfigClass(): string
    {
        return Config::class;
    }

    protected function getConfigDefinitionClass(): string
    {
        return ConfigDefinition::class;
    }

    private function maxUsers(): int
    {
        /** @var Config $config */
        $config = $this->getConfig();

        return $config->getMaxUsers();
    }
}
