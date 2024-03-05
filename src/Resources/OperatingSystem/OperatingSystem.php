<?php

namespace Crafterlp\ActiveServersSdk\Resources\OperatingSystem;

class OperatingSystem
{
    private int $os_id;
    private string $os_name;
    private int $units_left;
    private array $os_version;

    /**
     * @param int $os_id
     * @param string $os_name
     * @param int $units_left
     * @param array $os_version
     */
    public function __construct(int $os_id, string $os_name, int $units_left, array $os_version)
    {
        $this->os_id = $os_id;
        $this->os_name = $os_name;
        $this->units_left = $units_left;

        foreach ($os_version as $version) {
            $this->os_version[] = new OperatingSystemVersion($version['version'], $version['setup_price']);
        }
    }

    public function getOsId(): int
    {
        return $this->os_id;
    }

    public function getOsName(): string
    {
        return $this->os_name;
    }

    public function getUnitsLeft(): int
    {
        return $this->units_left;
    }

    public function getOsVersion(): array
    {
        return $this->os_version;
    }
}