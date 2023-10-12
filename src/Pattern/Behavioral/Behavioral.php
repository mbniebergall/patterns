<?php

declare(strict_types=1);

namespace Pattern\Behavioral;

class Command
{
    public function __construct(protected string $name) {}

    public function getName(): string
    {
        return $this->name;
    }
}

interface Logger
{
    public function log(string $message): void;
    public function error(string $message): void;
}

class SysLogger implements Logger
{
    public function log(string $message): void {}
    public function error(string $message): void {}
}

class DbLogger implements Logger
{
    public function log(string $message): void {}
    public function error(string $message): void {}
}

class QueueWorker
{
    public function __construct(protected Logger $logger) {}

    public function handle(Command $cmd): bool
    {
        $this->logger->log('Starting: ' . $cmd->getName());
        return true;
    }
}

$queueWorker = new QueueWorker(new SysLogger());
$queueWorker->handle(new Command('Sys Strategy'));

$queueWorker = new QueueWorker(new DbLogger());
$queueWorker->handle(new Command('Db Command'));