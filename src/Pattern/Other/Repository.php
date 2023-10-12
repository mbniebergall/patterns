<?php

declare(strict_types=1);

namespace Pattern\Other;



use Pattern\Behavioral\EntityInterface;

interface RepositoryInterface
{
    public function insert(EntityInterface $entity): int;
}
class DbAdapter
{
    public function insert(array $record): int
    {
        // inserts a record
        return 1;
    }
}

abstract class RepositoryAbstract implements RepositoryInterface
{
    public function __construct(protected DbAdapter $dbAdapter) {}

    public function insert(EntityInterface $entity): int
    {
        $this->dbAdapter->insert($entity->toArray());
        return 1;
    }
}

class UserEntity implements EntityInterface
{
    public function __construct(
        protected ?int $userId,
        protected string $username
    ) {}

    public function toArray(): array
    {
        return [
            'user_id' => $this->userId,
            'username' => $this->username,
        ];
    }
}

class UserRepository extends RepositoryAbstract {}

class UserService
{
    public function __construct(protected UserRepository $repository) {}

    public function create(UserEntity $userEntity): int
    {
        return $this->repository->insert($userEntity);
    }
}
