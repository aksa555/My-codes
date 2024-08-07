<?php declare(strict_types=1);

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;

use App\Models\Quiz;
use App\Contracts\Repositories\QuizRepositoryInterface;
use CodeCoz\AimAdmin\Contracts\Service\CrudBoard\CrudGridLoaderInterface;
use CodeCoz\AimAdmin\Repository\AbstractAimAdminRepository;

class QuizRepository  extends AbstractAimAdminRepository implements QuizRepositoryInterface, CrudGridLoaderInterface
{

   public function getModelFqcn(): string
   {
     return Quiz::class;
   }

   public function getGridQuery(): ?Builder
   {
       return Quiz::query()->orderBy('created_at', 'desc');
   }

   public function store($data)
   {
       return Quiz::create($data);
   }

   public function update(int $id, array $data)
   {
       return Quiz::whereId($id)->update($data);
   }

   public function delete(int $id)
   {
       return Quiz::find($id)->delete();
   }

   public function applyFilterQuery(Builder $query, array $filters): Builder
   {
       // $filters_name = isset($filters['name']) ? $filters['name'] : "";
       // $query->where(DB::raw('lower(name)'), 'like', '%'.strtolower($filters_name).'%');

       return parent::applyFilterQuery($query, $filters);
   }

}
