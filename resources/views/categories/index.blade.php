 
@extends('layout.app')

@section('title', 'Master Category')

@section('content')
    <div id="app">
      <div class="main-wrapper">
        <div class="main-content">
          <div class="container">
            <div class="card mt-5">
              <div class="card-header">
                <h3>Master Category</h3>
                <p class="text-end">
                  <a class="btn btn-primary" href="{{ route('categories.create') }}"><i class="bi bi-plus-circle-fill"></i> Add Data</a>
                </p>
              </div>
              <div class="card-body">
                @if (session('success'))
                  <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if (session('error'))
                  <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                <form action="{{ route('categories.index') }}" method="GET" class="d-flex justify-content-between mb-3">
                    <select name="perPage" onchange="this.form.submit()" class="form-select w-auto">
                        <option value="10"{{ $perPage == 10 ? ' selected' : '' }}>10 </option>
                        <option value="25"{{ $perPage == 25 ? ' selected' : '' }}>25 </option>
                        <option value="50"{{ $perPage == 50 ? ' selected' : '' }}>50 </option>
                        <option value="100"{{ $perPage == 100 ? ' selected' : '' }}>100 </option>
                    </select>
                    <div class="input-group w-25">
                        <input type="text" name="search" class="form-control" placeholder="Search..." value="{{ request('search') }}">
                        <button type="submit" class="btn btn-outline-secondary">Search</button>
                    </div>
                </form>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th hidden>ID</th>
                      <th>NO</th>
                      <th>NAME</th>
                      <th>DESCRIPTION</th>
                      <th>STATUS</th>
                      <th>ACTIONS</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($categories as $category)
                      <tr>
                        <td hidden>{{ $category->id }}</td>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>
                            @if($category->status)
                                <span class="badge bg-success">Enable</span>
                            @else
                                <span class="badge bg-danger">Disable</span>
                            @endif
                        </td>

                        <td>
                        
                          @if ($category->status)
                              <a href="{{ route('categories.toggleStatus', ['category' => $category->id]) }}" class="btn btn-warning btn-sm" onclick="event.preventDefault(); document.getElementById('toggle-status-{{ $category->id }}').submit();">
                                  <i class="bi bi-bookmark-x-fill"></i>
                              </a>
                          @else
                              <a href="{{ route('categories.toggleStatus', ['category' => $category->id]) }}" class="btn btn-success btn-sm" onclick="event.preventDefault(); document.getElementById('toggle-status-{{ $category->id }}').submit();">
                                  <i class="bi bi-bookmark-check-fill"></i>
                              </a>
                          @endif
                          <form id="toggle-status-{{ $category->id }}" action="{{ route('categories.toggleStatus', ['category' => $category->id]) }}" method="POST" style="display: none;">
                              @csrf
                              @method('POST')
                          </form>

                          <a href="{{ route('categories.edit', ['category' => $category->id]) }}" class="btn btn-secondary btn-sm"><i class="bi bi-pencil-square"></i></a>
                          <a href="#" class="btn btn-sm btn-danger" onclick="
                            event.preventDefault();
                            if (confirm('Do you want to remove this?')) {
                              document.getElementById('delete-row-{{ $category->id }}').submit();
                            }">
                            <i class="bi bi-trash3-fill"></i>
                          </a>
                          <form id="delete-row-{{ $category->id }}" action="{{ route('categories.destroy', ['category' => $category->id]) }}" method="POST">
                              <input type="hidden" name="_method" value="DELETE">
                              @csrf
                          </form>
                        </td>
                      </tr>
                    @empty
                      <tr>
                        <td colspan="8">
                            No record found!
                        </td>
                      </tr>
                    @endforelse
                  </tbody>
                </table>
                {{ $categories->appends(['search' => request('search'), 'perPage' => request('perPage')])->links('pagination::bootstrap-4') }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endsection