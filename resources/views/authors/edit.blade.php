@extends('layout.app')

@section('title', 'Master Author')

@section('content')
            <div id="app">
                <div class="main-wrapper">
                    <div class="main-content">
                        <div class="container">
                            <div class="card mt-5">
                                <div class="card-header">
                                    <h3>Edit Author</h3>
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
                                    <form action="{{ route('authors.update', ['author' => $author->id]) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $author->name) }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Date Of Birth</label>
                                            <input type="date" class="form-control" id="dob" name="dob" value="{{ old('dob', $author->dob) }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="address" class="form-label">Address</label>
                                            <textarea class="form-control" id="address" name="address" rows="3" required>{{ old('address', $author->address) }}</textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary"><i class="bi bi-save-fill"></i> Save</button>
                                        <a href="{{ route('authors.index') }}" class="btn btn-danger"><i class="bi bi-x"></i> Cancel</a>
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
