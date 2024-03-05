<?php

namespace Crafterlp\ActiveServersSdk\Builders;

class OrderBuilder
{
    private int $cpuId;
    private int $cpuQuantity;
    private array $disks = [];
    private int $ramId;
    private int $ramQuantity;
    private int $gpuId;
    private int $gpuQuantity;
    private int $uplinkId;
    private int $uplinkQuantity;
    private string $uplinkLabel;
    private int $osId;
    private int $osQuantity;
    private string $osVersion;
    private string $customerEmail;
    private string $discountLevel;
    private string $contractType;
    private int $contractDuration;
    private string $paymentMethod;
    private string $comments;
    private string $customerNo;

    public function __construct()
    {
        return $this;
    }

    public function setCpu(int $id, int $quantity) : static
    {
        $this->cpuId = $id;
        $this->cpuQuantity = $quantity;

        return $this;
    }

    public function addDisk(int $id, int $quantity): static
    {
        $this->disks[] = ['id' => $id, 'quantity' => $quantity];

        return $this;
    }

    public function setRam(int $id, int $quantity): static
    {
        $this->ramId = $id;
        $this->ramQuantity = $quantity;

        return $this;
    }

    public function setGpu(int $id, int $quantity): static
    {
        $this->gpuId = $id;
        $this->gpuQuantity = $quantity;

        return $this;
    }

    public function setUplink(int $id, int $quantity, string $label): static
    {
        $this->uplinkId = $id;
        $this->uplinkQuantity = $quantity;
        $this->uplinkLabel = $label;

        return $this;
    }

    public function setOperatingSystem(int $id, int $quantity, string $version): static
    {
         $this->osId = $id;
         $this->osQuantity = $quantity;
         $this->osVersion = $version;

         return $this;
     }

    public function setCustomerEmail(string $email): static
    {
         $this->customerEmail = $email;

         return $this;
     }

    public function setDiscountLevel(string $level): static
    {
         $this->discountLevel = $level;

         return $this;
     }

    public function setContractType(string $type): static
    {
         $this->contractType = $type;

         return $this;
     }

    public function setContractDuration(int $duration): static
    {
         $this->contractDuration = $duration;

         return $this;
     }

    public function setPaymentMethod(string $method): static
    {
         $this->paymentMethod = $method;

         return $this;
     }

    public function setComments(string $comments): static
    {
         $this->comments = $comments;

         return $this;
     }

    public function setCustomerNo(string $no): static
    {
         $this->customerNo = $no;

         return $this;
     }

    public function build(): array
    {
        return [
            'order' => [
                'cpu' => ['id' => $this->cpuId, 'quantity' => $this->cpuQuantity],
                'disks' => $this->disks,
                'ram' => ['id' => $this->ramId, 'quantity' => $this->ramQuantity],
                'gpu' => ['id' => $this->gpuId, 'quantity' => $this->gpuQuantity],
                'uplink' => ['id' => $this->uplinkId, 'quantity' => $this->uplinkQuantity, 'label' => $this->uplinkLabel],
                'os' => ['id' => $this->osId, 'quantity' => $this->osQuantity, 'version' => $this->osVersion],
                'customer_email' => $this->customerEmail,
                'discount_level' => $this->discountLevel,
                'contract_type' => $this->contractType,
                'contract_duration' => $this->contractDuration,
                'payment_method' => $this->paymentMethod,
                'comments' => $this->comments,
                'customer_no' => $this->customerNo
            ]
        ];
    }
}