@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">

        <!-- Page Header -->
        <div class="row mb-4">
            <div class="col-12 text-center">
                <h4 class="mb-3">Admin Profile</h4>
                <p class="text-muted">View your profile information or make updates as necessary.</p>
            </div>
        </div>

        <!-- Profile Card -->
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card shadow-sm">
                    
                    <!-- Profile Image -->
                    <div class="card-header text-center bg-light py-4">
                        <img class="rounded-circle avatar-xl" 
                            src="{{ (!empty($adminData->profile_image)) 
                                ? url('upload/admin_images/'.$adminData->profile_image) 
                                : url('upload/no_image.jpg') }}" 
                            alt="Profile Image">
                    </div>

                    <!-- Profile Details -->
                    <div class="card-body">
                        
                        <div class="text-center mb-3">
                            <h5 class="card-title mb-0">{{ $adminData->name }}</h5>
                            <p class="text-muted">Administrator</p>
                        </div>
                        
                        <hr class="my-3">
                        
                        <div class="mb-3">
                            <h6 class="card-title">Email Address:</h6>
                            <p class="text-muted">{{ $adminData->email }}</p>
                        </div>

                        <hr class="my-3">

                        <div class="mb-3">
                            <h6 class="card-title">Username:</h6>
                            <p class="text-muted">{{ $adminData->username }}</p>
                        </div>

                        <hr class="my-3">

                        <!-- Edit Profile Button -->
                        <div class="text-center">
                            <a href="{{ route('edit.profile') }}" class="btn btn-primary btn-rounded waves-effect waves-light">
                                <i class="fas fa-edit me-2"></i>Edit Profile
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
