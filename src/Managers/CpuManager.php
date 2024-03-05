<?php

namespace Crafterlp\ActiveServersSdk\Managers;

use Crafterlp\ActiveServersSdk\Resources\CPU;

class CpuManager extends Manager
{

    public function pagination($page = 1)
    {
        return $this->http->get('/cpus', [
            'page' => $page
        ]);
    }

    public function getById($id) : ?CPU
    {
        $all = $this->getAll();
        foreach ($all as $value) {
            if ($value['cpu_id'] == $id) {
                return $this->transfer($value, CPU::class);
            }
        }
        return null;
    }

    public function getByName($name) : ?CPU
    {
        $all = $this->getRaw();
        foreach ($all as $value) {
            if ($value['cpu_name'] == $name) {
                return $this->transfer($value, CPU::class);
            }
        }
        return null;
    }

    public function getAll() : array
    {
        $data = $this->http->get('cpus');
        $cpus = [];
        foreach ($data as $value) {
            $cpus[] = $this->transfer($value, CPU::class);
        }
        return $cpus;
    }

    public function getRaw() : array
    {
        return $this->http->get('cpus');
    }
}