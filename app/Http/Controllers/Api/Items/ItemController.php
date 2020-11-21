<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Items;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Repository\CategoryRepository;
use App\Repository\DefaultRepository;
use App\Repository\ItemRepository;
use App\Http\Resources\Item as ItemResource;

class ItemController extends Controller
{
    /**
     * @var ItemRepository|DefaultRepository
     */
    protected DefaultRepository $itemRepository;

    /**
     * @var CategoryRepository|DefaultRepository
     */
    protected DefaultRepository $categoryRepository;

    public function __construct(ItemRepository $itemRepository, CategoryRepository $categoryRepository)
    {
        $this->itemRepository = $itemRepository;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @param  Item  $item
     * @return ItemResource
     */
    public function show(Item $item): ItemResource
    {
        return new ItemResource($item);
    }
}
