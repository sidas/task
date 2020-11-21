<?php

declare(strict_types=1);

namespace App\Repository;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class CategoryRepository implements DefaultRepository
{
    /**
     * @var Category|Model
     */
    protected $model;

    public function __construct(Category $model)
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
     * @param  array  $data
     * @return Model
     */
    public function create(array $data): Model
    {
        return Category::create($data);
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
