<?php

namespace Crafterlp\ActiveServersSdk\Resources\OperatingSystem;

class OperatingSystemVersion
{
    private string $version;
    private string $setup_price;

    /**
     * @param string $version
     * @param string $setup_price
     */
    public function __construct(string $version, string $setup_price)
    {
        $this->version = $version;
        $this->setup_price = $setup_price;
    }

    public function getVersion(): string
    {
        return $this->version;
    }

    public function getSetupPrice(): string
    {
        return $this->setup_price;
    }
}