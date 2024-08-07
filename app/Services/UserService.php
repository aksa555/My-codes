<?php declare(strict_types=1);

namespace App\Services;

use App\Contracts\Services\UserServiceInterface;
use App\Contracts\Repositories\UserRepositoryInterface;

final class UserService implements UserServiceInterface

{
    public function __construct(private readonly UserRepositoryInterface $userRepository)
    {

    }
}
