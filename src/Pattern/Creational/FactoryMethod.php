<?php

declare(strict_types=1);

namespace Pattern\Creational;

abstract class Bike {}

class RoadBike extends Bike {}

interface BikeFactoryInterface
{
    public function createBike(): Bike;
}

abstract class BikeFactoryAbstract implements BikeFactoryInterface {}

class RoadBikeFactory extends BikeFactoryAbstract
{
    public function createBike(): RoadBike
    {
        return new RoadBike();
    }
}


$roadBike = (new RoadBikeFactory())->createBike();

class Thing
{
}

class ThingFactory
{
    public function createThing(): Thing
    {
        return new Thing();
    }
}

$thing = (new ThingFactory())->createThing();