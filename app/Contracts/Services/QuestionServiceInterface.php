<?php  declare(strict_types=1);

namespace App\Contracts\Services;

interface QuestionServiceInterface
{

    public function showQuizForm();
    public function submitQuiz(array $data);

}

