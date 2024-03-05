<?php

namespace Crafterlp\ActiveServersSdk\Resources\Uplink;

class Uplink
{
    private int $uplink_id;
    private string $transfer_speed;
    private float $price;
    private int $units_left;
    private bool $is_available;
    private array $data_capacity;

    /**
     * @param int $uplink_id
     * @param string $transfer_speed
     * @param float $price
     * @param int $units_left
     * @param bool $is_available
     * @param array $data_capacity
     */
    public function __construct(int $uplink_id, string $transfer_speed, float $price, int $units_left, bool $is_available, array $data_capacity)
    {
        $this->uplink_id = $uplink_id;
        $this->transfer_speed = $transfer_speed;
        $this->price = $price;
        $this->units_left = $units_left;
        $this->is_available = $is_available;

        foreach ($data_capacity as $capacity) {
            $this->data_capacity[] = new UplinkCapacities($capacity['label'], $capacity['price']);
        }
    }

    public function getUplinkId(): int
    {
        return $this->uplink_id;
    }

    public function getTransferSpeed(): string
    {
        return $this->transfer_speed;
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

    public function getDataCapacity(): array
    {
        return $this->data_capacity;
    }
}