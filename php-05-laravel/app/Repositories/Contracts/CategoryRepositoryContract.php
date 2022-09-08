<?php


namespace App\Repositories\Contracts;





use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;

interface CategoryRepositoryContract
{
    public function create(CreateCategoryRequest $request): Category|bool;
    public function update(Category $category, UpdateCategoryRequest $request): bool;
}
