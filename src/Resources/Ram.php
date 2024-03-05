<?php

namespace Crafterlp\ActiveServersSdk\Resources;

class Ram
{
    private int $ram_id;
    private string $ram_name;
    private float $price;
    private int $units_left;
    private bool $is_available;

    /**
     * @param int $ram_id
     * @param string $ram_name
     * @param float $price
     * @param int $units_left
     * @param bool $is_available
     */
    public function __construct(int $ram_id, string $ram_name, float $price, int $units_left, bool $is_available)
    {
        $this->ram_id = $ram_id;
        $this->ram_name = $ram_name;
        $this->price = $price;
        $this->units_left = $units_left;
        $this->is_available = $is_available;
    }

    public function getRamId(): int
    {
        return $this->ram_id;
    }

    public function getRamName(): string
    {
        return $this->ram_name;
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