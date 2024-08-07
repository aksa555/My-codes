<?php declare(strict_types=1);

namespace App\Services;

use App\Contracts\Services\QuestionServiceInterface;
use App\Contracts\Repositories\QuestionRepositoryInterface;

final class QuestionService implements QuestionServiceInterface

{
    public function __construct(private readonly QuestionRepositoryInterface $questionRepository)
    {

    }


    public function showQuizForm()
    {
        // Retrieve 10 questions from the database
        // return Question::with('options')->take(10)->get();
        return $this->questionRepository->store($data);
    }

    public function submitQuiz(array $data)
    {
       
        return $this->questionRepository->store($data);
    }
}
