<?php

declare(strict_types=1);

namespace Pattern\Other;

class ServiceLocator
{
    public function __construct(protected array $config) {}

    public function get(string $className): object
    {
        return new $className();
    }
}

$serviceLocator = new ServiceLocator([
    UserService::class => [UserRepository::class],
    UserRepository::class => [DbAdapter::class],
]);
$userService = $serviceLocator->get(UserService::class);

$userService->create(new UserEntity(null, 'demouser'));
