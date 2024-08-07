<?php declare(strict_types=1);

namespace App\Contracts\Repositories;

interface QuizRepositoryInterface
{
    function store (array $data);
    function update (int $id,array $data);
    function delete (int $id);
}
