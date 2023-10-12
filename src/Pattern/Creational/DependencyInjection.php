<?php

declare(strict_types=1);

namespace Pattern\Creational;

abstract class Bait {}
class Worm extends Bait {}
class Fly extends Bait {}
class SpinnerLure extends Bait {}

class FishingPole
{
    public function __construct(public Bait $bait) {}

    public function setBait(Bait $bait): void
    {
        $this->bait = $bait;
    }

    public function castBait(Bait $bait): void
    {
        $this->bait = $bait;
    }
}

$pole = new FishingPole(new Worm());
$pole->setBait(new Fly());
$pole->castBait(new SpinnerLure());