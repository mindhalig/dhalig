@extends('layout.app')

@section('title', 'Master Category')

@section('content')
            <div id="app">
                <div class="main-wrapper">
                    <div class="main-content">
                        <div class="container">
                            <div class="card mt-5">
                                <div class="card-header">
                                    <h3>Edit Category</h3>
                                </div>
                                <div class="card-body">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form action="{{ route('categories.update', ['category' => $category->id]) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <l abel for="name" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $category->name) }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Description</label>
                                            <input type="text" class="form-control" id="description" name="description" value="{{ old('description', $category->description) }}" required>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary"><i class="bi bi-save-fill"></i> Save</button>
                                        <a href="{{ route('categories.index') }}" class="btn btn-danger"><i class="bi bi-x"></i> Cancel</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
