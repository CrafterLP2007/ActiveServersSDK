<?php

namespace Crafterlp\ActiveServersSdk\Managers;

use Crafterlp\ActiveServersSdk\Resources\GPU;

class GpuManager extends Manager
{

    public function pagination($page = 1)
    {
        return $this->http->get('gpus', [
            'page' => $page
        ]);
    }

    public function getById($id): ?GPU
    {
        $all = $this->getAll();
        foreach ($all as $value) {
            if ($value['gpu_id'] == $id) {
                return $this->transfer($value, GPU::class);
            }
        }
        return null;
    }

    public function getByName($name)
    {
        $all = $this->getRaw();
        foreach ($all as $value) {
            if ($value['gpu_name'] == $name) {
                return $this->transfer($value, GPU::class);
            }
        }
        return null;
    }

    public function getAll() : array
    {
        $data = $this->http->get('gpus');
        $gpus = [];
        foreach ($data as $value) {
            $gpus[] = $this->transfer($value, GPU::class);
        }
        return $gpus;
    }

    public function getRaw() : array
    {
        return $this->http->get('gpus');
    }
}