@extends('layouts.app')

@section('content')

    <div class="container mx-auto">
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="w-100 p-3">
                            <thead class="bg-white border-b">
                            <tr>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    ID
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    Thumbnail
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    Name
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    Description
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    Products
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    Actions
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr class="bg-gray-100 border-b">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $category->id }}</td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"><img src="{{ $category->thumbnailUrl }}" width="100" height="100" alt=""></td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ $category->name }}</td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ $category->description }}</td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ $category->products->count() }}</td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        <a class="btn btn-primary" href="{{ route('admin.categories.edit', $category) }}" >
                                            {{ __('Edit') }}
                                        </a>
                                        <form action="{{ route('admin.categories.destroy', $category) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" class="btn btn-danger form-control" value="Remove">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{ $categories->links('admin.navigate.index') }}
    </div>
@endsection
