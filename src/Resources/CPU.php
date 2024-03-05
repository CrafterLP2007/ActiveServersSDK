<?php

namespace Crafterlp\ActiveServersSdk\Resources;

class CPU
{
    private int $cpu_id;

    private string $cpu_name;

    private float $price;

    private int $units_left;

    private bool $is_available;

    /**
     * @param int $cpu_id
     * @param string $cpu_name
     * @param float $price
     * @param int $units_left
     * @param bool $is_available
     */
    public function __construct(int $cpu_id, string $cpu_name, float $price, int $units_left, bool $is_available)
    {
        $this->cpu_id = $cpu_id;
        $this->cpu_name = $cpu_name;
        $this->price = $price;
        $this->units_left = $units_left;
        $this->is_available = $is_available;
    }

    public function getCpuId(): int
    {
        return $this->cpu_id;
    }

    public function getCpuName(): string
    {
        return $this->cpu_name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getUnitsLeft(): int
    {
        return $this->units_left;
    }

    public function isIsAvailable(): bool
    {
        return $this->is_available;
    }
}