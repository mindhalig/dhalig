@extends('layout.app')
@section('title', 'Master Category')
@section('content')
<div class="container">
    <h2>Add New Category</h2>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" id="description" name="description" required>
        </div>
       
        <button type="submit" class="btn btn-primary"><i class="bi bi-save-fill"></i> Save</button>
        <a href="{{ route('categories.index') }}" class="btn btn-danger"><i class="bi bi-x"></i> Cancel</a>
    </form>
</div>
@endsection
