<?php

namespace App;

class SweetStock
{
    public $name;

    public $quality;

    public $sellIn;

    public function __construct($name, $quality, $sellIn)
    {
        $this->name = $name;
        $this->quality = $name === 'Sulfuras, Hand of Ragnaros' ? 80 : $quality;
        $this->sellIn = $sellIn;
    }

    public static function of($name, $quality, $sellIn) {
        return new static($name, $quality, $sellIn);
    }

    public function tick()
    {
        $this->quality = (($this->name == 'Aged Brie' or $this->name == 'Backstage passes to a TAFKAL80ETC concert') and $this->quality < 50) ? ++$this->quality : $this->quality;
        $this->quality = ($this->name == 'Backstage passes to a TAFKAL80ETC concert' and $this->quality < 50) ? (($this->sellIn < 11) ? ($this->sellIn < 6) ? $this->quality+=2 : ++$this->quality : $this->quality) : $this->quality;

        $this->sellIn = ($this->name != 'Sulfuras, Hand of Ragnaros') ? --$this->sellIn : $this->sellIn;

        $this->quality = ($this->sellIn < 0 and $this->name == 'Aged Brie' and $this->quality < 50) ? ++$this->quality : $this->quality;
        $this->quality = ($this->sellIn < 0 and $this->name == 'Backstage passes to a TAFKAL80ETC concert') ? 0 : $this->quality;

        $this->quality = ($this->name == 'normal' and $this->quality > 0) ? (($this->sellIn < 0) ? $this->quality-=2 : --$this->quality) : $this->quality;

        $this->quality = ($this->name == 'Conjured Mana Cake' and $this->quality > 0)?(($this->sellIn < 0)?$this->quality-=4:$this->quality-=2):$this->quality;
    }
}
