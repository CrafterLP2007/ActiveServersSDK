<?php

namespace Crafterlp\ActiveServersSdk\Resources;

class GPU
{
    private int $gpu_id;

    private string $gpu_name;

    private float $price;

    private int $units_left;

    private bool $is_available;

    /**
     * @param int $gpu_id
     * @param string $gpu_name
     * @param float $price
     * @param int $units_left
     * @param bool $is_available
     */
    public function __construct(int $gpu_id, string $gpu_name, float $price, int $units_left, bool $is_available)
    {
        $this->gpu_id = $gpu_id;
        $this->gpu_name = $gpu_name;
        $this->price = $price;
        $this->units_left = $units_left;
        $this->is_available = $is_available;
    }

    public function getGpuId(): int
    {
        return $this->gpu_id;
    }

    public function getGpuName(): string
    {
        return $this->gpu_name;
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