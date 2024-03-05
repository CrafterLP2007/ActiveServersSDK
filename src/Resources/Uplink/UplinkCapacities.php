<?php

namespace Crafterlp\ActiveServersSdk\Resources\Uplink;

class UplinkCapacities
{
    private string $label;
    private float $price;

    /**
     * @param string $label
     * @param float $price
     */
    public function __construct(string $label, float $price)
    {
        $this->label = $label;
        $this->price = $price;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function getPrice(): float
    {
        return $this->price;
    }
}