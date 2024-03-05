<?php

namespace Crafterlp\ActiveServersSdk\Managers;

use Crafterlp\ActiveServersSdk\Resources\Order;

class OrderManager extends Manager
{

    public function pagination($page = 1)
    {
        return $this->http->get('order', [
            'page' => $page
        ]);
    }

    public function getById($id) : Order
    {
        $data = $this->http->get('order/' . $id);
        return $this->transfer($data, Order::class);
    }

    public function create(array $data) : array
    {
        return $this->http->post('order', $data);
    }
}