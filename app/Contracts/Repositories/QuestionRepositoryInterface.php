<?php declare(strict_types=1);

namespace App\Contracts\Repositories;

interface QuestionRepositoryInterface
{
    public function showQuizForm();
    public function submitQuiz(array $data);

}
