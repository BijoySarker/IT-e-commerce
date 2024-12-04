@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <h4 class="text-center mb-4">All Projects</h4>
        <a href="{{ route('projects.create') }}" class="btn btn-success mb-3">Add New Project</a>
        <div class="table-responsive">
            <table class="table table-hover table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col" class="text-center">Image</th>
                        <th scope="col">Link</th>
                        <th scope="col" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                        <tr>
                            <td class="fw-semibold">{{ $project->title }}</td>
                            <td>{{ Str::limit($project->description, 50) }}</td>
                            <td class="text-center">
                                <img 
                                    src="{{ asset($project->image) }}" 
                                    alt="{{ $project->title }}" 
                                    class="img-thumbnail project-img">
                            </td>
                            <td>
                                <a href="{{ $project->link }}" target="_blank" class="text-decoration-none text-primary">
                                    {{ $project->link }}
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this project?')">
                                        <i class="fas fa-trash"></i> Delete
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

<style>
    .table-hover tbody tr:hover {
        background-color: #f8f9fa;
    }
    .table thead th {
        vertical-align: middle;
        text-align: center;
    }

    .project-img {
        width: 100px;
        height: 50px;
        object-fit: cover;
        border: 1px solid #ddd;
    }

    .btn {
        transition: all 0.3s ease-in-out;
    }
    .btn:hover {
        opacity: 0.8;
    }

    .page-content {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    
</style>

@endsection
