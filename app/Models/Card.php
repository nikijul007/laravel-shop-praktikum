<?php

namespace App\Models;

class Card
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;
    public $message = '';

    public function __construct($oldCard)
    {
        if ($oldCard) {
            $this->items = $oldCard->items;
            $this->totalQty = $oldCard->totalQty;
            $this->totalPrice = $oldCard->totalPrice;
        }
    }

    public function add($product, $anzahl)
    {
        $storedItem = ['qty' => 0, 'price' => $product->price, 'item' => $product, 'anzahl' => $anzahl];
        if ($this->items) {
            if (array_key_exists($product->id, $this->items)) {
                $storedItem = $this->items[$product->id];
            }
        }

        $storedItem['qty'] += $anzahl;
        $storedItem['price'] = $product->price * $storedItem['qty'];
        $this->items[$product->id] = $storedItem;
        $this->totalQty += $anzahl;
        $this->totalPrice += $product->price * $anzahl;
        $this->addSuccessMessage($amount = $anzahl);
    }

    public function addOne($product)
    {
        $storedItem = ['qty' => 0, 'price' => $product->price, 'item' => $product];
        if ($this->items) {
            if (array_key_exists($product->id, $this->items)) {
                $storedItem = $this->items[$product->id];
            }
        }
        $storedItem['qty']++;
        $storedItem['price'] = $product->price * $storedItem['qty'];
        $this->items[$product->id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $product->price;
        $this->addSuccessMessage($amount = 1);
    }

    public function reduceAmountOneFrom($product)
    {
        $storedItem = null;
        if ($this->items) {
            if (array_key_exists($product->id, $this->items)) {
                $storedItem = $this->items[$product->id];
            }
        }
        if ($storedItem === null || $storedItem['qty'] == 0) {
            return $this;
        }

        $this->removeSuccessMessage($amount = 1);
        if ($storedItem['qty'] == 1) {
            $items = $this->items;
            unset($items[$product->id]);
            $this->items = $items;
            $this->totalQty = $this->totalQty - $storedItem['qty'];
            $this->totalPrice = $this->totalPrice - ($product->price * $storedItem['qty']);

            return $this;
        }

        $storedItem['qty']--;
        $storedItem['price'] = $product->price * $storedItem['qty'];
        $this->items[$product->id] = $storedItem;
        $this->totalQty--;
        $this->totalPrice -= $product->price;
        $this->removeSuccessMessage($amount = 1);
    }

    public function reduceAllFrom($product)
    {
        $items = $this->items;
        if ($items === null) {
            return $this;
        }
        $item = array_get($items, $product->id);
        if ($item === null) {
            return $this;
        }

        $this->totalQty = $this->totalQty - (int) array_get($item, 'qty', 0);
        $this->totalPrice = $this->totalPrice - ($product->price * (int) array_get($item, 'qty', 0));

        array_forget($items, $product->id);
        $this->items = $items;
        $this->removeSuccessMessage($amount = 2);
    }

    /**
     * @param int $amount
     * @return string
     */
    protected function addSuccessMessage($amount)
    {
        $messageProduct = 'Produkt';
        if ((int) $amount > 1) {
            $messageProduct = 'Produkte';
        }

        return $this->message = "{$messageProduct} erfolgreich zum Warenkorb hinzugefügt";
    }

    /**
     * @param int $amount
     * @return string
     */
    protected function removeSuccessMessage($amount)
    {
        $messageProduct = 'Produkt';
        if ((int) $amount > 1) {
            $messageProduct = 'Produkte';
        }

        return $this->message = "{$messageProduct} erfolgreich aus dem Warenkorb entfernt";
    }

    public function message()
    {
        return $this->message;
    }
}
