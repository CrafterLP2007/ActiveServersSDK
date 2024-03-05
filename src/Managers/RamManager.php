<?php

namespace Crafterlp\ActiveServersSdk\Managers;

use Crafterlp\ActiveServersSdk\Resources\Ram;
use Crafterlp\ActiveServersSdk\Resources\Uplink\Uplink;

class RamManager extends Manager
{
    public function pagination($page = 1)
    {
        return $this->http->get('rams', [
            'page' => $page
        ]);
    }

    public function getById($id): ?Ram
    {
        $all = $this->getAll();
        foreach ($all as $value) {
            if ($value['ram_id'] == $id) {
                return $this->transfer($value, Ram::class);
            }
        }
        return null;
    }

    public function getByName($name): ?Ram
    {
        $all = $this->getRaw();
        foreach ($all as $value) {
            if ($value['ram_name'] == $name) {
                return $this->transfer($value, Ram::class);
            }
        }
        return null;
    }

    public function getAll() : array
    {
        $data = $this->http->get('rams');
        $rams = [];
        foreach ($data as $value) {
            $rams[] = $this->transfer($value, Ram::class);
        }
        return $rams;
    }

    public function getRaw() : array
    {
        return $this->http->get('rams');
    }
}