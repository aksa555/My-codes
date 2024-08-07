<?php declare(strict_types=1);

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;

use App\Models\Question;
use App\Contracts\Repositories\QuestionRepositoryInterface;
use CodeCoz\AimAdmin\Contracts\Service\CrudBoard\CrudGridLoaderInterface;
use CodeCoz\AimAdmin\Repository\AbstractAimAdminRepository;

class QuestionRepository  extends AbstractAimAdminRepository implements QuestionRepositoryInterface, CrudGridLoaderInterface
{

   public function getModelFqcn(): string
   {
     return Question::class;
   }

   public function getGridQuery(): ?Builder
   {
       return Question::query()->orderBy('created_at', 'desc');
   }

   public function showQuizForm()
   {
       // Retrieve 10 questions from the database
       return Question::with('options')->take(10)->get();
   }

   public function submitQuiz(array $data)
   {
       // Process the submitted quiz data
       // Implement your quiz submission logic here

       // Return a response, or boolean, or any required data
       return true;
   }


   public function applyFilterQuery(Builder $query, array $filters): Builder
   {
       // $filters_name = isset($filters['name']) ? $filters['name'] : "";
       // $query->where(DB::raw('lower(name)'), 'like', '%'.strtolower($filters_name).'%');

       return parent::applyFilterQuery($query, $filters);
   }

}
