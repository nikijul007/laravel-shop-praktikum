<?php

namespace App\Models;

class Card
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;
    public $anzahl = 1;

    public function __construct($oldCard)
    {
        if ($oldCard) {
            $this->items = $oldCard->items;
            $this->totalQty = $oldCard->totalQty;
            $this->totalPrice = $oldCard->totalPrice;
        }
    }

    public function add($item, $id, $anzahl)
    {
        $storedItem = ['qty' => 0, 'price' => $item->price, 'item' => $item, 'anzahl' => $anzahl];
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }

        $storedItem['qty'] += $anzahl;
        $storedItem['price'] = $item->price * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->totalQty += $anzahl;
        $this->totalPrice += $item->price * $anzahl;
    }

    public function addOne($item, $id)
    {
        $storedItem = ['qty' => 0, 'price' => $item->price, 'item' => $item];
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['qty']++;
        $storedItem['price'] = $item->price * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $item->price;
    }

    public function reduceBy1($item, $id)
    {
        $storedItem = null;
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }
        if ($storedItem === null) {
            return $this;
        }
        if ($storedItem['qty'] == 0) {
            return $this;
        }
        if ($storedItem['qty'] == 1) {
            $items = $this->items;
            unset($items[$id]);
            $this->items = $items;
            $this->totalQty = $this->totalQty - $storedItem['qty'];
            $this->totalPrice = $this->totalPrice - ($item->price * $storedItem['qty']);

            return $this;
        }

        $storedItem['qty']--;
        $storedItem['price'] = $item->price * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->totalQty--;
        $this->totalPrice -= $item->price;
    }

    public function reduceAll($item, $id)
    {
        $storedItem = ['qty' => 0, 'price' => $item->price, 'item' => $item];
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }
        $items = $this->items;
        unset($items[$id]);
        $this->items = $items;
        $this->totalQty = $this->totalQty - $storedItem['qty'];
        $this->totalPrice = $this->totalPrice - ($item->price * $storedItem['qty']);
    }
}
