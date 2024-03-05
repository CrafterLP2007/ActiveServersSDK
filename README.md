<h1 align="center">ActiveServers-SDK</h1>
<p align="center"> <img src="https://www.active-servers.com/img/logo3.png"> </p>
<p align="center">This SDK provides functionalities to interact with the ActiveServers API for managing servers and resources.</p>

<p align="center">
<a href="https://packagist.org/packages/"><img src="https://img.shields.io/packagist/dt/" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/"><img src="https://img.shields.io/packagist/v/" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/"><img src="https://img.shields.io/packagist/l/" alt="License"></a>
</p>

## Installation

### Install via Composer
To use this SDK, you can install it via composer:
```bash
composer require crafterlp/activeservers-sdk
```

### Getting the API Credentials
At the moment you still have to request an API beta. To do this you have to write an email to support.


## Usage
### Initialization
To use the SDK, you need to create a new instance of the `ActiveServers` class and pass the Email and Password as parameters.

```php
use CrafterLP\ActiveServersSDK\ActiveServers;

$api = new ActiveServersAPI("your_email@example.com", "your_password");
```

### Example Usage for CPU
The following example shows how to use the SDK to interact with the CPU resource.
```php
// Get CPU by ID
$cpu = $api->cpu->getById("1");

//Get CPU by Name
$cpu = $api->cpu->getByName("Intel Core i9-9900K");

// Get all CPUs
$cpus = $api->cpu->getAll();

//Get CPU ID
$cpu->getCpuId();

// Get CPU Name
$cpu->getCpuName();

// Get CPU Price
$cpu->getCpuPrice();

// Get Units left of CPU
$cpu->getUnitsLeft();

// Check if CPU is available
$cpu->isAvailable();
```

### Example Usage for GPU
The following example shows how to use the SDK to interact with the GPU resource.
```php
// Get GPU by ID
$gpu = $api->gpu->getById("1");

//Get GPU by Name
$gpu = $api->gpu->getByName("NVIDIA GeForce RTX 2080 Ti");

// Get all GPUs
$gpus = $api->gpu->getAll();

//Get GPU ID
$gpu->getGpuId();

// Get GPU Name
$gpu->getGpuName();

// Get GPU Price
$gpu->getGpuPrice();

// Get Units left of GPU
$gpu->getUnitsLeft();

// Check if GPU is available
$gpu->isAvailable();
```

### Example Usage for RAM
The following example shows how to use the SDK to interact with the RAM resource.
```php
// Get RAM by ID
$ram = $api->ram->getById("1");

//Get RAM by Name
$ram = $api->ram->getByName("16GB DDR4 RAM");

// Get all RAMs
$rams = $api->ram->getAll();

//Get RAM ID
$ram->getRamId();

// Get RAM Name
$ram->getRamName();

// Get RAM Price
$ram->getRamPrice();

// Get Units left of RAM
$ram->getUnitsLeft();

// Check if RAM is available
$ram->isAvailable();
```

### Example Usage for Disk
The following example shows how to use the SDK to interact with the Disk resource.
```php
// Get Disk by ID
$disk = $api->disk->getById("1");

// Get all Disks
$disks = $api->disk->getAll();

//Get Disk ID
$disk->getDiskId();

// Get Form Factor
$disk->getDiskFormFactor();

// Get Disk price
$disk->getDiskPrice();

// Get Units left of Disk
$disk->getUnitsLeft();

// Check if Disk is available
$disk->isAvailable();
```

### Example Usage for Uplink
The following example shows how to use the SDK to interact with the Uplink resource.
```php
// Get Uplink by ID
$uplink = $api->uplink->getById("1");

// Get all Uplinks
$uplinks = $api->uplink->getAll();

//Get Uplink ID
$uplink->getUplinkId();

// Get Transfer speed
$uplink->getTransferSpeed();

// Get Uplink price
$uplink->getUplinkPrice();

// Get Units left of Uplink
$uplink->getUnitsLeft();

// Check if Uplink is available
$uplink->isAvailable();

// Get data capacities
$uplink->getDataCapacities(); // Returns an array with the data capacities

// Get data capacity
$uplink->getDataCapacities()[0]; // Returns the first data capacity

// Get data capacity label
$uplink->getDataCapacities()[0]->getLabel(); // Returns the label of the first data capacity

// Get data capacity price
$uplink->getDataCapacities()[0]->getPrice(); // Returns the price of the first data capacity
```

### Example Usage for OperatingSystem
The following example shows how to use the SDK to interact with the OperatingSystem resource.
```php
// Get OperatingSystem by ID
$os = $api->os->getById("1");

// Get OperatingSystem by Name
$os = $api->os->getByName("CentOs");

// Get all OperatingSystems
$oss = $api->os->getAll();

//Get OperatingSystem ID
$os->getOsId();

// Get OperatingSystem Name
$os->getOsName();

// Get Units left of OperatingSystem
$os->getUnitsLeft();

// Check if OperatingSystem is available
$os->isAvailable();

// Get OperatingSystem versions
$os->getOsVersion();

// Get OperatingSystem with version
$os->getOsVersion()[0]; // Returns the first version

// Get OperatingSystem version
$os->getOsVersion()[0]->getVersion(); // Returns the label of the first version

// Get OperatingSystem version setup price
$os->getOsVersion()[0]->getSetupPrice(); // Returns the price of the first version
```

### Example Usage to create a new Order
To create a new order, you can use the `OrderBuilder` class to create a new order.
```php
use CrafterLP\ActiveServersSDK\OrderBuilder;

$order = (new OrderBuilder())
            ->setCpu(1, 1
            ->addDisk(1, 1)
            ->setRam(1, 1)
            ->setGpu(1, 1)
            ->setUplink(1, 1, "Fair Use 50TB")
            ->setOperatingSystem(1, 1, "CentOS 7")
            ->setCustomerEmail("customer@mail.de")
            ->setDiscountLevel("first_server")
            ->setContractType("dedicated_server")
            ->setContractDuration(1)
            ->setPaymentMethod("bank_transfer")
            ->setComments("My first server!")
            ->setCustomerNo("123")
            ->build(); // Don't forget to build the order

$api->order->createOrder($order);
```

### Example Usage to get an Order
To get an order, you can use the `OrderBuilder` class to create a new order.
```php
$order = $api->order->getById("1");

// Get Ordered ID
$order->getOrderId();

// Get Ordered CPU
$order->getCpu();

// Get Ordered Disks
$order->getDisks();

// Get Ordered RAM
$order->getRam();

// Get Ordered GPU
$order->getGpu();

// Get Ordered Operating System
$order->getOs();

// Get Ordered Uplink
$order->getUplink();

// Get Setup Cost
$order->getSetupCost();

// Get Monthly Cost
$order->getMonthlyCost();

// Get Customer Email
$order->getCustomerEmail();

// Get Discount Level
$order->getDiscountLevel();

// Get Contract Type
$order->getContractType();

// Get Contract Duration
$order->getContractDuration();

// Get Payment Method
$order->getPaymentMethod();

// Get Status
$order->getStatus();

// Get Comments
$order->getComments();

// Get Customer No
$order->getCustomerNo();

// Get Created At
$order->getCreatedTimestamp();

// Get Updated At
$order->getModifiedTimestamp();
```

## Extra Methods
Use the `getRaw()` function in each manager to get the raw response from the API.
```php
// Gets all CPUs as raw response/array
$cpu = $api->cpu->getRaw();
```

## Licence
The ActiveServers-SDK is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).