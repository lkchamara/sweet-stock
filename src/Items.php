<?php

namespace App;

class Items
{

    public function normalItems() {

        $this->degradeSellIn(1);

        if ($this->quality > 0) {
            if ($this->sellIn < 0) {
                $this->degradeQuality(2);
            } else {
                $this->degradeQuality(1);
            }
        }
    }

    public function brieItems() {

        $this->degradeSellIn(1);
        $this->increaseQuality(1);

        if ($this->sellIn < 0) {
            $this->increaseQuality(1);
        }
    }

    public function sulfurasItems() {
        $this->quality = 80;
    }

    public function backstagePasses () {
       
        $this->degradeSellIn(1);

        if ($this->sellIn < 0) {
            $this->degradeQuality($this->quality);

        } elseif ($this->sellIn < 5) {
            $this->increaseQuality(3);

        } elseif ($this->sellIn < 10) {
            $this->increaseQuality(2);

        } else {
            $this->increaseQuality(1);

        }
    }

    public function conjuredItems () {

        $this->degradeSellIn(1);

        if ($this->quality > 0 and $this->sellIn < 0) {
            $this->degradeQuality(4);
        }
        if ($this->quality > 0 and $this->sellIn >= 0) {
            $this->degradeQuality(2);
        }
    }

    public function degradeSellIn($n) {
        $this->sellIn = $this->sellIn - $n;
    }

    public function increaseQuality($n) {
        $this->quality = ($this->quality + $n > 50) ? 50 : $this->quality + $n;
    }

    public function degradeQuality($n) {
        $this->quality = $this->quality - $n;
    }
}