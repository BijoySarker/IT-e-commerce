@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">

        <!-- Page Header -->
        <div class="row mb-4">
            <div class="col-12">
                <h4 class="mb-3">Change Password</h4>
                <p class="text-muted">Update your password to ensure account security.</p>
            </div>
        </div>

        <!-- Change Password Form -->
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        
                        <!-- Form Title -->
                        <h5 class="card-title mb-4">Change Your Password</h5>

                        <!-- Display Validation Errors -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Change Password Form -->
                        <form method="post" action="{{ route('update.password') }}">
                            @csrf

                            <!-- Old Password -->
                            <div class="mb-4">
                                <label for="oldpassword" class="form-label">Old Password</label>
                                <input type="password" name="oldpassword" id="oldpassword" 
                                    class="form-control @error('oldpassword') is-invalid @enderror" 
                                    placeholder="Enter your old password">
                                @error('oldpassword')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- New Password -->
                            <div class="mb-4">
                                <label for="newpassword" class="form-label">New Password</label>
                                <input type="password" name="newpassword" id="newpassword" 
                                    class="form-control @error('newpassword') is-invalid @enderror" 
                                    placeholder="Enter a new password">
                                @error('newpassword')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Confirm Password -->
                            <div class="mb-4">
                                <label for="confirm_password" class="form-label">Confirm Password</label>
                                <input type="password" name="confirm_password" id="confirm_password" 
                                    class="form-control @error('confirm_password') is-invalid @enderror" 
                                    placeholder="Re-enter the new password">
                                @error('confirm_password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-key me-2"></i> Change Password
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
