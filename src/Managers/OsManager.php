<?php

namespace Crafterlp\ActiveServersSdk\Managers;

use Crafterlp\ActiveServersSdk\Resources\OperatingSystem\OperatingSystem;

class OsManager extends Manager
{
    public function pagination($page = 1)
    {
        return $this->http->get('os', [
            'page' => $page
        ]);
    }

    public function getById($id) : ?OperatingSystem
    {
        $all = $this->getRaw();
        foreach ($all as $value) {
            if ($value['os_id'] == $id) {
                return $this->transfer($value, OperatingSystem::class);
            }
        }
        return null;
    }

    public function getByName($name): ?OperatingSystem
    {
        $all = $this->getRaw();
        foreach ($all as $value) {
            if ($value['os_name'] == $name) {
                return $this->transfer($value, OperatingSystem::class);
            }
        }
        return null;
    }

    public function getAll() : array
    {
        $data = $this->http->get('os');
        $os = [];
        foreach ($data as $value) {
            $os[] = $this->transfer($value, OperatingSystem::class);
        }
        return $os;
    }

    public function getRaw() : array
    {
        return $this->http->get('os');
    }
}