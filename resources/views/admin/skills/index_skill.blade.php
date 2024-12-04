@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm border-0 custom-card">
                    <div class="card-body">
                        <h4 class="card-title mb-4 text-center">Skills List</h4>
                        <a href="{{ route('skills.create') }}" class="btn btn-success mb-3 custom-btn"><i class="fas fa-plus"></i> Add New Skill</a>

                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover custom-table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Logo</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($skills as $skill)
                                        <tr>
                                            <td>
                                                <img src="{{ asset('storage/' . $skill->logo_path) }}" alt="{{ $skill->title }}" class="img-fluid" width="50">
                                            </td>
                                            <td>{{ $skill->title }}</td>
                                            <td>{{ Str::limit($skill->description, 50) }}</td>
                                            <td>
                                                <a href="{{ route('skills.edit', $skill->id) }}" class="btn btn-info btn-sm custom-btn-sm">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <form action="{{ route('skills.destroy', $skill->id) }}" method="POST" style="display:inline;" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm custom-btn-sm" onclick="return confirm('Are you sure you want to delete this skill?')">
                                                        <i class="fas fa-trash-alt"></i> Delete
                                                    </button>
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
        </div>
    </div>
</div>

<style>
    .custom-card {
        border-radius: 8px;
        border: none;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .card-body {
        padding: 25px;
    }

    .custom-btn {
        padding: 10px 15px;
        font-size: 16px;
        transition: all 0.3s ease;
    }

    .custom-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .custom-btn-sm {
        padding: 6px 12px;
        font-size: 14px;
    }

    .custom-table {
        border-radius: 8px;
        overflow: hidden;
    }

    .custom-table th {
        background-color: #343a40;
        color: white;
        font-weight: 600;
    }

    .custom-table td {
        vertical-align: middle;
    }

    .custom-table tbody tr:hover {
        background-color: #f4f4f4;
        transition: background-color 0.3s;
    }

    .custom-table img {
        border-radius: 5px;
        transition: transform 0.3s ease;
    }

    .custom-table img:hover {
        transform: scale(1.1);
    }

    .alert {
        border-radius: 8px;
        font-size: 16px;
        padding: 15px;
    }

    .btn {
        border-radius: 25px;
        padding: 10px 20px;
        transition: transform 0.2s ease;
    }

    .btn:hover {
        transform: scale(1.05);
    }

    .card-title {
        font-size: 1.8rem;
        font-weight: 600;
        color: #333;
    }
</style>

@endsection
