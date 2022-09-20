@extends('layouts.master')
@section('title', 'Spam Queries')

@section('content')
    <!-- ========================== Page Content ==================================== -->
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">SPAM Queries</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">SPAM Queries</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Date</th>
                                        <th>View</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>


                                <tbody>
                                @foreach($queries as $key => $query)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        
                                        <td id="tooltip-container">
                                            <span data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ $query->firstname . ' ' . $query->lastname }}">{{ $query->firstname . ' ' . $query->lastname }}</span>
                                        </td>

                                        <td>
                                            {{ $query->email }}
                                        </td>

                                        <td>
                                            {{ $query->phone }}
                                        </td>
                                        
                                        <td>
                                            <?php
                                                $date_time = strtotime($query->created_at);
                                                $qur_date = date('d M, Y', $date_time);
                                            ?>
                                            {{ $qur_date }}
                                        </td>

                                        <td>
                                            <a class="btn btn-primary btn-rounded btn-sm waves-effect waves-light" href="{{ route('query.manage', $query->id) }}"><i class="bx bx-loader bx-spin font-size-16 align-middle me-1"></i> View Details <i class="bx bxs-right-arrow" style="position: relative; top: 1px;"></i></a>
                                        </td>

                                        <td>
                                            <div class="inline" style="display: flex; gap: 5px;">
                                                
                                                <form action="{{ route('remove.spam') }}" method="post">
                                                    @csrf

                                                    <input type="hidden" name="query_id" value="{{ $query->id }}">                                        
                                                    <button type="submit" class="btn btn-secondary btn-sm waves-effect btn-label waves-light" onclick="return confirm('Are you sure to unspam the query?')" style="width: 100%;"><i class="bx bx-badge-check label-icon"></i> Un-Spam Query </button>

                                                </form>
                                                
                                                <form method="POST" action="{{ route('query.destroy', $query->id) }}">
                                                    @csrf
                                                    @method('delete')
                                                    
                                                    <button class="btn btn-danger btn-sm waves-effect btn-label waves-light" onclick="return confirm('Are you sure to delete?')" style="margin-left: 5px;" title="Delete" type="submit"><i class="bx bx-trash label-icon"></i> Delete </button> 
                                                </form>
                                            </div>
                                            
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->                
                
@endsection