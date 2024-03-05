<?php

namespace Crafterlp\ActiveServersSdk\Managers;

use Crafterlp\ActiveServersSdk\Resources\Disk;

class DiskManager extends Manager
{

    public function pagination($page = 1)
    {
        return $this->http->get('disks', [
            'page' => $page
        ]);
    }

    public function getById($id): ?Disk
    {
        $all = $this->getRaw();
        foreach ($all as $value) {
            if ($value['disk_id'] == $id) {
                return $this->transfer($value, Disk::class);
            }
        }
        return null;
    }

    public function getAll() : array
    {
        $data = $this->http->get('disks');
        $disks = [];
        foreach ($data as $value) {
            $disks[] = $this->transfer($value, Disk::class);
        }
        return $disks;
    }

    public function getRaw() : array
    {
        return $this->http->get('disks');
    }
}