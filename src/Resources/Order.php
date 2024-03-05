<?php

namespace Crafterlp\ActiveServersSdk\Resources;

class Order
{
    private int $id;
    private string $cpu;
    private array $disks;
    private string $ram;
    private string $gpu;
    private string $os;
    private string $uplink;
    private float $setupCost;
    private float $monthlyCost;
    private string $customerEmail;
    private string $discountLevel;
    private string $contractType;
    private string $contractDuration;
    private string $paymentMethod;
    private string $status;
    private string $comments;
    private string $customerNo;
    private string $createdTimestamp;
    private string $modifiedTimestamp;

    /**
     * @param int $id
     * @param string $cpu
     * @param array $disks
     * @param string $ram
     * @param string $gpu
     * @param string $os
     * @param string $uplink
     * @param float $setupCost
     * @param float $monthlyCost
     * @param string $customerEmail
     * @param string $discountLevel
     * @param string $contractType
     * @param string $contractDuration
     * @param string $paymentMethod
     * @param string $status
     * @param string $comments
     * @param string $customerNo
     * @param string $createdTimestamp
     * @param string $modifiedTimestamp
     */
    public function __construct(int $id, string $cpu, array $disks, string $ram, string $gpu, string $os, string $uplink, float $setupCost, float $monthlyCost, string $customerEmail, string $discountLevel, string $contractType, string $contractDuration, string $paymentMethod, string $status, string $comments, string $customerNo, string $createdTimestamp, string $modifiedTimestamp)
    {
        $this->id = $id;
        $this->cpu = $cpu;

        foreach ($disks as $disk) {
            $this->disks[] = new Disk($disk['disk_id'], $disk['disk_name'], $disk['price'], $disk['units_left'], $disk['is_available']);
        }

        $this->ram = $ram;
        $this->gpu = $gpu;
        $this->os = $os;
        $this->uplink = $uplink;
        $this->setupCost = $setupCost;
        $this->monthlyCost = $monthlyCost;
        $this->customerEmail = $customerEmail;
        $this->discountLevel = $discountLevel;
        $this->contractType = $contractType;
        $this->contractDuration = $contractDuration;
        $this->paymentMethod = $paymentMethod;
        $this->status = $status;
        $this->comments = $comments;
        $this->customerNo = $customerNo;
        $this->createdTimestamp = $createdTimestamp;
        $this->modifiedTimestamp = $modifiedTimestamp;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getCpu(): string
    {
        return $this->cpu;
    }

    public function getDisks(): array
    {
        return $this->disks;
    }

    public function getRam(): string
    {
        return $this->ram;
    }

    public function getGpu(): string
    {
        return $this->gpu;
    }

    public function getOs(): string
    {
        return $this->os;
    }

    public function getUplink(): string
    {
        return $this->uplink;
    }

    public function getSetupCost(): float
    {
        return $this->setupCost;
    }

    public function getMonthlyCost(): float
    {
        return $this->monthlyCost;
    }

    public function getCustomerEmail(): string
    {
        return $this->customerEmail;
    }

    public function getDiscountLevel(): string
    {
        return $this->discountLevel;
    }

    public function getContractType(): string
    {
        return $this->contractType;
    }

    public function getContractDuration(): string
    {
        return $this->contractDuration;
    }

    public function getPaymentMethod(): string
    {
        return $this->paymentMethod;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getComments(): string
    {
        return $this->comments;
    }

    public function getCustomerNo(): string
    {
        return $this->customerNo;
    }

    public function getCreatedTimestamp(): string
    {
        return $this->createdTimestamp;
    }

    public function getModifiedTimestamp(): string
    {
        return $this->modifiedTimestamp;
    }
}