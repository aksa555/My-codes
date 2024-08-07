<?php declare(strict_types=1);

namespace App\Services;

use App\Contracts\Services\QuizServiceInterface;
use App\Contracts\Repositories\QuizRepositoryInterface;

final class QuizService implements QuizServiceInterface

{
    public function __construct(private readonly QuizRepositoryInterface $quizRepository)
    {

    }

    public function store($data)
    {
        return $this->quizRepository->store($data);
    }

    public function update(int $id, array $data)
    {
        return $this->quizRepository->store($id,$data);
    }

    public function delete(int $id)
    {
        return $this->quizRepository->delete($id);
    }
}
