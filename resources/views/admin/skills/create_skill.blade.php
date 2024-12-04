@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-0 custom-card">
                    <div class="card-body">
                        <h4 class="card-title text-center mb-4">{{ isset($skill) ? 'Edit Skill' : 'Create New Skill' }}</h4>

                        <form method="POST" action="{{ isset($skill) ? route('skills.update', $skill->id) : route('skills.store') }}" enctype="multipart/form-data">
                            @csrf
                            @if(isset($skill)) @method('PUT') @endif
                            
                            <!-- Skill Title -->
                            <div class="mb-4">
                                <label for="title" class="form-label">Skill Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror custom-input" value="{{ isset($skill) ? $skill->title : old('title') }}" required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Skill Logo -->
                            <div class="mb-4">
                                <label for="logo_path" class="form-label">Skill Logo</label>
                                <input type="file" name="logo_path" class="form-control @error('logo_path') is-invalid @enderror custom-input">
                                @if(isset($skill) && $skill->logo_path)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $skill->logo_path) }}" alt="{{ $skill->title }}" class="img-fluid custom-img">
                                    </div>
                                @endif
                                @error('logo_path')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Skill Description -->
                            <div class="mb-4">
                                <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror custom-input" rows="5" required>{{ isset($skill) ? $skill->description : old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-lg custom-btn w-100">{{ isset($skill) ? 'Update Skill' : 'Create Skill' }}</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>

<style>
    /* Custom Card Styling */
    .custom-card {
        border-radius: 8px;
        border: none;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .card-body {
        padding: 30px;
    }

    .custom-input {
        border-radius: 8px;
        font-size: 16px;
        padding: 12px;
        transition: border 0.3s ease;
    }

    .custom-input:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    .custom-img {
        border-radius: 8px;
        max-width: 100px;
        transition: transform 0.3s ease;
    }

    .custom-img:hover {
        transform: scale(1.1);
    }

    .custom-btn {
        border-radius: 50px;
        padding: 12px 20px;
        font-size: 18px;
        transition: all 0.3s ease;
    }

    .custom-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    /* Error Message Styling */
    .invalid-feedback {
        font-size: 14px;
        color: #dc3545;
    }

    /* Labels and Form Elements */
    .form-label {
        font-size: 16px;
        font-weight: 600;
        color: #333;
    }

    .mb-4 {
        margin-bottom: 1.5rem;
    }

    /* Success Alert */
    .alert {
        border-radius: 8px;
        font-size: 16px;
        padding: 15px;
        margin-bottom: 20px;
    }

    /* Responsive Design */
    @media (max-width: 767px) {
        .custom-card {
            padding: 15px;
        }

        .custom-input,
        .custom-btn {
            font-size: 14px;
        }

        .custom-btn {
            padding: 10px 15px;
        }
    }
</style>

@endsection
