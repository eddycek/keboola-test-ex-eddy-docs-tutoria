<?php

declare(strict_types=1);

namespace MyComponent;

use DateTime;
use Exception;
use Keboola\Component\BaseComponent;

class Component extends BaseComponent
{
    /**
     * @throws Exception
     */
    protected function run(): void
    {
        $file = fopen(sprintf('%s/out/tables/users-%s.csv',
            $this->getDataDir(),
            (new DateTime())->format('Y-m-d-H-i-s')
        ), 'wb');

        foreach (Users::make(random_int(1, $this->maxUsers())) as $user) {
            fputcsv($file, $user);
        }

        fclose($file);
    }

    /**
     * @return string
     */
    protected function getConfigClass(): string
    {
        return Config::class;
    }

    /**
     * @return string
     */
    protected function getConfigDefinitionClass(): string
    {
        return ConfigDefinition::class;
    }

    /**
     * @return int
     */
    private function maxUsers(): int
    {
        /** @var Config $config */
        $config = $this->getConfig();

        return $config->getMaxUsers();
    }
}
