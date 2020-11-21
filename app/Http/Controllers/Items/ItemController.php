<?php

declare(strict_types=1);

namespace App\Http\Controllers\Items;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Models\Item;
use App\Repository\CategoryRepository;
use App\Repository\DefaultRepository;
use App\Repository\ItemRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

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
     * @return View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(): View
    {
        $this->authorize('item');
        $items = $this->itemRepository->getAll();

        return view('item.index')->with('items', $items);
    }


    /**
     * @return View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create(): View
    {
        $this->authorize('item');
        $categories = $this->categoryRepository->getAll();

        return view('item.create')->with('categories', $categories);
    }


    /**
     * @param  StoreItemRequest  $request
     * @return RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(StoreItemRequest $request): RedirectResponse
    {
        $this->authorize('item');
        if ($this->itemRepository->create($request->all())) {
            session()->flash('success', 'Your item has been saved.');

            return redirect()->route('items.index');
        }

        return redirect()->back();
    }


    /**
     * @param  Item  $item
     * @return View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Item $item): View
    {
        $this->authorize('item');
        return view('item.show')->with('item', $item);
    }


    /**
     * @param  Item  $item
     * @return View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Item $item): View
    {
        $this->authorize('item');
        $categories = $this->categoryRepository->getAll();

        return view('item.edit')->with('item', $item)->with('categories', $categories);
    }


    /**
     * @param  UpdateItemRequest  $request
     * @param  Item  $item
     * @return RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(UpdateItemRequest $request, Item $item): RedirectResponse
    {
        $this->authorize('item');
        if ($this->itemRepository->save($item, $request->all())) {
            session()->flash('success', 'Your item has been saved.');

            return redirect()->route('items.index');
        }

        return redirect()->back();
    }


    /**
     * @param  Item  $item
     * @return RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Item $item): RedirectResponse
    {
        $this->authorize('item');
        $this->itemRepository->destroy($item);
        session()->flash('success', 'Your item has been deleted.');

        return redirect()->route('items.index');
    }
}
