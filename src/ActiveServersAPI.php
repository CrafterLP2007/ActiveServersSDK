<?php

namespace Crafterlp\ActiveServersSdk;

use Crafterlp\ActiveServersSdk\Managers\CpuManager;
use Crafterlp\ActiveServersSdk\Managers\DiskManager;
use Crafterlp\ActiveServersSdk\Managers\GpuManager;
use Crafterlp\ActiveServersSdk\Managers\OrderManager;
use Crafterlp\ActiveServersSdk\Managers\OsManager;
use Crafterlp\ActiveServersSdk\Managers\RamManager;
use Crafterlp\ActiveServersSdk\Managers\UplinkManager;
use GuzzleHttp\Client;

class ActiveServersAPI
{

    /**
     * The base URI for the ActiveServersAPI API.
     *
     * @var string
     */
    private string $uri;

    /**
     * The Email Address of your account for the ActiveServersAPI API.
     *
     * @var string
     */
    private string $email;

    /**
     * The Password of your account for the ActiveServersAPI API.
     *
     * @var string
     */
    private string $password;

    /**
     * The HTTP Client for the ActiveServersAPI API.
     *
     * @var Http
     */
    private Http $http;

    /**
     * The CpuManager for the ActiveServersAPI API.
     *
     * @var CpuManager
     */
    public CpuManager $cpu;

    /**
     * The GpuManager for the ActiveServersAPI API.
     *
     * @var GpuManager
     */
    public GpuManager $gpu;

    /**
     * The DiskManager for the ActiveServersAPI API.
     *
     * @var DiskManager
     */
    public DiskManager $disk;

    /**
     * The UplinkManager for the ActiveServersAPI API.
     *
     * @var UplinkManager
     */
    public UplinkManager $uplink;

    /**
     * The RamManager for the ActiveServersAPI API.
     *
     * @var RamManager
     */
    public RamManager $ram;

    /**
     * The OSManager for the ActiveServersAPI API.
     *
     * @var OSManager
     */
    public OsManager $os;

    /**
     * The OrderManager for the ActiveServersAPI API.
     *
     * @var OrderManager
     */
    public OrderManager $order;

    /**
     * @param string $email
     * @param string $password
     * @param string $baseUri
     * @param Client|null $http
     */
    public function __construct(string $email, string $password, string $baseUri = "https://active-servers.com/calc-api", Client $http = null)
    {
        if (empty($baseUri)) {
            $baseUri = "https://active-servers.com/calc-api";
        }

        $this->uri = $baseUri;
        $this->email = $email;
        $this->password = $password;

        $this->http = new Http($this, $http);

        $this->cpu = new CpuManager($this, $this->http);
        $this->gpu = new GpuManager($this, $this->http);
        $this->disk = new DiskManager($this, $this->http);
        $this->uplink = new UplinkManager($this, $this->http);
        $this->ram = new RamManager($this, $this->http);
        $this->os = new OsManager($this, $this->http);
        $this->order = new OrderManager($this, $this->http);
    }

    public function getUri(): string
    {
        return $this->uri;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getHttp(): Http
    {
        return $this->http;
    }
}