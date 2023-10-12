<?php

declare(strict_types=1);

namespace Pattern\Creational;

use Exception;

abstract class SingletonAbstract
{
    protected static SingletonAbstract $instance;

    protected function __construct() {}

    public static function getInstance(): static
    {
        static::$instance ??= new static();
        return static::$instance;
    }

    final protected function __clone() {}

    final protected function __wakeup() {}
}

class SomeService extends SingletonAbstract {}
$someService = SomeService::getInstance();

$someService->test();

class Teenager extends SingletonAbstract
{
    public function completeTask(TaskAbstract $task): void
    {
        // do some task
    }
}

abstract class TaskAbstract
{
    abstract public function doTask(): void;
}
class TakeOutGarbage extends TaskAbstract
{
    public function __construct(protected ?Teenager $teenager = null) {}

    protected function getTeenager(): Teenager
    {
        $this->teenager ??= Teenager::getInstance();
        return $this->teenager;
    }

    public function doTask(): void
    {
        $this->getTeenager()->completeTask($this);
    }
}

$takeOutGarbage = new TakeOutGarbage();
$takeOutGarbage->doTask();