<?php declare(strict_types=1);

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;

use App\Models\User;
use App\Contracts\Repositories\UserRepositoryInterface;
use CodeCoz\AimAdmin\Contracts\Service\CrudBoard\CrudGridLoaderInterface;
use CodeCoz\AimAdmin\Repository\AbstractAimAdminRepository;

class UserRepository  extends AbstractAimAdminRepository implements UserRepositoryInterface, CrudGridLoaderInterface
{

   public function getModelFqcn(): string
   {
     return User::class;
   }

   public function getGridQuery(): ?Builder
   {
       return User::query()->orderBy('created_at', 'desc');
   }

   public function applyFilterQuery(Builder $query, array $filters): Builder
   {
       // $filters_name = isset($filters['name']) ? $filters['name'] : "";
       // $query->where(DB::raw('lower(name)'), 'like', '%'.strtolower($filters_name).'%');

       return parent::applyFilterQuery($query, $filters);
   }

}
