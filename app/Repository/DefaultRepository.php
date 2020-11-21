<?php

declare(strict_types=1);

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface DefaultRepository
{
    /**
     * @return Collection
     */
    public function getAll(): Collection;

    /**
     * @param  array  $data
     * @return Model
     */
    public function create(array $data): Model;

    /**
     * @param  Model  $model
     * @param  array  $data
     * @return bool
     */
    public function save(Model $model, array $data): bool;

    /**
     * @param  Model  $model
     * @return bool
     */
    public function destroy(Model $model): bool;
}
