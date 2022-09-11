@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <br>
                <h3 class="text-center">{{ __('Edit category') }}</h3>
                <hr>
            </div>
            <div class="col-md-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="col-md-12">
                <form action="{{ route('admin.categories.update', $category) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                        <div class="col-md-6">
                            <input id="title"
                                   type="text"
                                   class="form-control @error('name') is-invalid @enderror"
                                   name="name"
                                   value="{{ $category->name }}"
                                   autocomplete="title"
                                   autofocus
                            >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description"
                               class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
                        <div class="col-md-6">
                            <textarea name="description"
                                      class="form-control @error('description') is-invalid @enderror"
                                      id="description"
                                      cols="30"
                                      rows="10">{{ $category->description }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="thumbnail"
                               class="col-md-4 col-form-label text-md-right">{{ __('Thumbnail') }}</label>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="{{ $category->thumbnailUrl  }}" style="height: 350px" id="thumbnail-preview" alt="">
                                </div>
                                <div class="col-md-6">
                                    <input type="file" name="thumbnail" id="thumbnail">
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="form-group row">
                        <div class="col-md-10 text-right">
                            <input type="submit" class="btn btn-info" value="Update">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('footer-scripts')
    @vite(['resources/js/images-preview.js', 'resources/js/images-actions.js'])
@endpush
