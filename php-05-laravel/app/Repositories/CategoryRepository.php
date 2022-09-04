<?php


namespace App\Repositories;


use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Repositories\Contracts\Product;
use Illuminate\Support\Facades\DB;

class CategoryRepository implements Contracts\CategoryRepositoryContract
{

    public function create(CreateCategoryRequest $request): Category
    {
        try {
            DB::beginTransaction();
            $data = $request->validated();

            $category = Category::create($data);

            DB::commit();
            return $category;
        } catch (\Exception $e){
            logs()->warning($e);
            DB::rollBack();
            return false;
        }
    }

    public function update(Category $category, UpdateCategoryRequest $request): bool
    {
        try {
            DB::beginTransaction();
            $category->update($request->validated());

            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            logs()->warning($e);
            return false;
        }
    }
}
