@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row mb-4">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Contact Message All</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card shadow-sm border-light">
                        <div class="card-body">
                            <h4 class="card-title">Contact Message All</h4>
                            <table id="datatable" class="table table-striped table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Sl</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Message</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i = 1)
                                    @foreach($contacts as $item)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->phone }}</td>
                                            <td class="message-cell">{{ $item->message }}</td>
                                            <td>{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</td>
                                            <td>
                                                <a href="{{ route('delete.message', $item->id) }}" 
                                                   class="btn btn-danger btn-sm delete-message" 
                                                   title="Delete Data">
                                                    <i class="fas fa-trash-alt"></i> Delete
                                                </a>
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
@endsection

@push('styles')
    <style>
        /* General styling for the table */
        #datatable {
            width: 100%;
            border-collapse: collapse;
        }

        /* Styling for the card */
        .card {
            border-radius: 8px;
            border: 1px solid #e1e4e8;
        }

        .card-body {
            padding: 1.5rem;
        }

        /* Styling the table header */
        .thead-dark th {
            background-color: #343a40;
            color: #ffffff;
            text-align: center;
        }

        /* Styling for the message cell */
        .message-cell {
            word-wrap: break-word;
            white-space: pre-wrap;
            padding: 10px;
            background-color: #f9f9f9;
        }

        /* Styling action buttons */
        .btn-sm {
            font-size: 14px;
            padding: 5px 10px;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }

        /* Table row hover effect */
        tr:hover {
            background-color: #f1f1f1;
        }

        /* Table data styling */
        td {
            text-align: center;
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.delete-message').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    const confirmation = window.confirm("Are you sure you want to delete this message?");
                    
                    if (confirmation) {
                        window.location.href = this.href;
                    }
                });
            });
        });
    </script>
@endpush