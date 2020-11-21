<?php

declare(strict_types=1);

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Repository\CategoryRepository;
use App\Repository\DefaultRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * @var CategoryRepository|DefaultRepository
     */
    protected DefaultRepository $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }


    public function index(): View
    {
        $this->authorize('category');
        $categories = $this->categoryRepository->getAll();

        return view('category.index')->with('categories', $categories);
    }


    public function create(): View
    {
        $this->authorize('category');
        return view('category.create');
    }


    public function store(StoreCategoryRequest $request): RedirectResponse
    {
        $this->authorize('category');
        if ($this->categoryRepository->create($request->all())) {
            session()->flash('success', 'Your product has been saved.');

            return redirect()->route('categories.index');
        }

        return redirect()->back();
    }

    public function show(Category $category): View
    {
        $this->authorize('category');
        return view('category.show')->with('items', $category->products()->get());
    }


    public function edit(Category $category): View
    {
        $this->authorize('category');
        return view('category.edit')->with('category', $category);
    }

    public function update(UpdateCategoryRequest $request, Category $category): RedirectResponse
    {
        $this->authorize('category');
        if ($this->categoryRepository->save($category, $request->all())) {
            session()->flash('success', 'Your product has been saved.');

            return redirect()->route('categories.index');
        }

        return redirect()->back();
    }

    public function destroy(Category $category): RedirectResponse
    {
        $this->authorize('category');
        $this->categoryRepository->destroy($category);
        session()->flash('success', 'Your product has been deleted.');

        return redirect()->route('categories.index');
    }
}
