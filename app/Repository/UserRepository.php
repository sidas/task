<?php

declare(strict_types=1);

namespace App\Repository;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class UserRepository implements DefaultRepository
{
    /**
     * @var User|Model
     */
    protected Model $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        return $this->model->all();
    }

    /**
     * @param string $name
     * @return Model
     */
    public function findOneByName(string $name): Model
    {
        return $this->model->where('name', $name)->first();
    }

    /**
     * @param  array  $data
     * @return Model
     */
    public function create(array $data): Model
    {
        return User::create($data);
    }

    /**
     * @param  Model  $model
     * @param  array  $data
     * @return bool
     */
    public function save(Model $model, array $data): bool
    {
        return $model->update($data);
    }

    /**
     * @param  Model  $model
     * @return bool
     * @throws \Exception
     */
    public function destroy(Model $model): bool
    {
        return $model->delete();
    }
}
