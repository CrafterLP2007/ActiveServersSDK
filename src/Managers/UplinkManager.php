<?php

namespace Crafterlp\ActiveServersSdk\Managers;

use Crafterlp\ActiveServersSdk\Resources\Uplink\Uplink;

class UplinkManager extends Manager
{

    public function pagination($page = 1)
    {
        return $this->http->get('uplinks', [
            'page' => $page
        ]);
    }

    public function getById($id): ?Uplink
    {
        $all = $this->getRaw();
        foreach ($all as $value) {
            if ($value['uplink_id'] == $id) {
                return $this->transfer($value, Uplink::class);
            }
        }
        return null;
    }

    public function getAll() : array
    {
        $data = $this->http->get('uplinks');
        $uplinks = [];
        foreach ($data as $value) {
            $uplinks[] = $this->transfer($value, Uplink::class);
        }
        return $uplinks;
    }

    public function getRaw() : array
    {
        return $this->http->get('uplinks');
    }
}