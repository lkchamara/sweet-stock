<?php

namespace App;

class SweetStock extends Items
{
    public $name;

    public $quality;

    public $sellIn;

    public function __construct($name, $quality, $sellIn)
    {
        $this->name = $name;
        $this->quality = $quality;
        $this->sellIn = $sellIn;
        $this->initial();
    }

    public static function of($name, $quality, $sellIn) {
        return new static($name, $quality, $sellIn);
    }

    public function tick()
    {
        if ($this->name == 'normal') {
            $this->normalItems();

        } else if ($this->name === 'Aged Brie') {
            $this->brieItems();

        } else if ($this->name === 'Sulfuras, Hand of Ragnaros') {
            $this->sulfurasItems();

        } else if ($this->name === 'Backstage passes to a TAFKAL80ETC concert') {
            $this->backstagePasses();

        } else if ($this->name === 'Conjured Mana Cake') {
            $this->conjuredItems();
            
        }
    }
}
