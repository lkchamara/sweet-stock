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

        $backstage = 'Backstage passes to a TAFKAL80ETC concert';
        $normal = 'normal';
        $agedBrie = 'Aged Brie';
        $sulfuras = 'Sulfuras, Hand of Ragnaros';
        $conjured = 'Conjured Mana Cake';

        $this->quality = ($this->name == $backstage and $this->quality < 50)?(($this->sellIn < 11)?(($this->sellIn < 6)?$this->quality+=2:++$this->quality):$this->quality):$this->quality;

        $this->sellIn = ($this->name != $sulfuras) ? --$this->sellIn : $this->sellIn;

        $this->quality = ($this->name == $normal and $this->quality > 0)?(($this->sellIn < 0)?$this->quality-=2:--$this->quality):$this->quality;

        $this->quality = (($this->name == $agedBrie or $this->name == $backstage) and $this->quality < 50) ? ++$this->quality : $this->quality;

        $this->quality = ($this->name == $agedBrie and $this->quality < 50 and $this->sellIn < 0) ? ++$this->quality : $this->quality;

        $this->quality = ($this->name == $backstage and $this->sellIn < 0) ? $this->quality=0 : $this->quality;

        $this->quality = ($this->name == $conjured and $this->quality > 0)?(($this->sellIn < 0)?$this->quality-=4:$this->quality-=2):$this->quality;

    }
}
