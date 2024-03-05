<?php

namespace Crafterlp\ActiveServersSdk\Resources;

class Disk
{
    private int $disk_id;
    private string $form_factor;
    private float $price;
    private int $units_left;
    private bool $is_available;

    /**
     * @param int $disk_id
     * @param string $form_factor
     * @param float $price
     * @param int $units_left
     * @param bool $is_available
     */
    public function __construct(int $disk_id, string $form_factor, float $price, int $units_left, bool $is_available)
    {
        $this->disk_id = $disk_id;
        $this->form_factor = $form_factor;
        $this->price = $price;
        $this->units_left = $units_left;
        $this->is_available = $is_available;
    }

    public function getDiskId(): int
    {
        return $this->disk_id;
    }

    public function getDiskFactor(): string
    {
        return $this->form_factor;
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