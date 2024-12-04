@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-0 custom-card">
                    <div class="card-body">
                        <h4 class="card-title text-center mb-4">{{ isset($project) ? 'Edit Project' : 'Create New Project' }}</h4>

                        <form method="POST" action="{{ isset($project) ? route('projects.update', $project->id) : route('projects.store') }}" enctype="multipart/form-data">
                            @csrf
                            @if(isset($project)) @method('PUT') @endif
                            
                            <!-- Project Title -->
                            <div class="mb-4">
                                <label for="title" class="form-label">Project Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror custom-input" 
                                       value="{{ isset($project) ? $project->title : old('title') }}" placeholder="Enter project title" required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Project Image -->
                            <div class="mb-4">
                                <label for="image" class="form-label">Project Image</label>
                                <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror custom-input">
                                @if(isset($project) && $project->image)
                                    <div class="mt-2 text-center">
                                        <img src="{{ asset($project->image) }}" alt="{{ $project->title }}" class="img-fluid custom-img">
                                    </div>
                                @endif
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Project Description -->
                            <div class="mb-4">
                                <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror custom-input" 
                                          rows="5" placeholder="Enter project description" required>{{ isset($project) ? $project->description : old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Project Link -->
                            <div class="mb-4">
                                <label for="link" class="form-label">Project Link <span class="text-danger">*</span></label>
                                <input type="url" name="link" id="link" class="form-control @error('link') is-invalid @enderror custom-input" 
                                       value="{{ isset($project) ? $project->link : old('link') }}" placeholder="Enter project link" required>
                                @error('link')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-lg custom-btn w-100">{{ isset($project) ? 'Update Project' : 'Create Project' }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .custom-card {
        border-radius: 12px;
        border: none;
        background-color: #ffffff;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    .card-body {
        padding: 30px;
    }

    .custom-input {
        border-radius: 8px;
        font-size: 16px;
        padding: 12px;
        transition: all 0.3s ease;
    }

    .custom-input:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    .custom-img {
        border-radius: 8px;
        width: 120px;
        height: auto;
        object-fit: cover;
        border: 1px solid #ddd;
        margin: 10px auto;
    }

    .custom-btn {
        border-radius: 50px;
        padding: 12px 20px;
        font-size: 18px;
        font-weight: 600;
        background-color: #007bff;
        border: none;
        transition: all 0.3s ease;
    }

    .custom-btn:hover {
        background-color: #0056b3;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    .form-label {
        font-size: 16px;
        font-weight: bold;
        color: #333;
    }

    .mb-4 {
        margin-bottom: 1.5rem;
    }

    .invalid-feedback {
        font-size: 14px;
        color: #e74c3c;
    }

    @media (max-width: 768px) {
        .card-body {
            padding: 20px;
        }

        .custom-btn {
            font-size: 16px;
            padding: 10px 15px;
        }

        .custom-input {
            font-size: 14px;
        }
    }
</style>

@endsection
