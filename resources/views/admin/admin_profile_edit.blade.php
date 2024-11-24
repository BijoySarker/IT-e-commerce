@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

        <!-- Page Header -->
        <div class="row mb-4">
            <div class="col-12">
                <h4 class="mb-3">Edit Profile</h4>
                <p class="text-muted">Update your profile information and upload a new profile image.</p>
            </div>
        </div>

        <!-- Edit Profile Form -->
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        
                        <!-- Form Title -->
                        <h5 class="card-title mb-4">Update Profile Information</h5>

                        <!-- Form Start -->
                        <form method="post" action="{{ route('store.profile') }}" enctype="multipart/form-data">
                            @csrf

                            <!-- Name Field -->
                            <div class="mb-4">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" id="name" 
                                    class="form-control @error('name') is-invalid @enderror" 
                                    value="{{ $editData->name }}" placeholder="Enter your name">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Email Field -->
                            <div class="mb-4">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" 
                                    class="form-control @error('email') is-invalid @enderror" 
                                    value="{{ $editData->email }}" placeholder="Enter your email">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Username Field -->
                            <div class="mb-4">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="username" id="username" 
                                    class="form-control @error('username') is-invalid @enderror" 
                                    value="{{ $editData->username }}" placeholder="Enter your username">
                                @error('username')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Profile Image Upload -->
                            <div class="mb-4">
                                <label for="profile_image" class="form-label">Profile Image</label>
                                <input type="file" name="profile_image" id="profile_image" 
                                    class="form-control @error('profile_image') is-invalid @enderror">
                                @error('profile_image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Profile Image Preview -->
                            <div class="mb-4 text-center">
                                <img id="showImage" class="rounded-circle avatar-lg" 
                                    src="{{ !empty($editData->profile_image) 
                                        ? url('upload/admin_images/'.$editData->profile_image) 
                                        : url('upload/no_image.jpg') }}" 
                                    alt="Profile Image">
                            </div>

                            <!-- Submit Button -->
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-2"></i> Update Profile
                                </button>
                            </div>
                        </form>
                        <!-- Form End -->

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- jQuery Script for Profile Image Preview -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#profile_image').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        });
    });
</script>

@endsection
