@extends('layouts.master')
@section('title', 'All Deals')

@section('content')
    <!-- ========================== Page Content ==================================== -->
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Deal List</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Deal List</li>
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
                                        <th>Photo</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>


                                <tbody>
                                @foreach($deals as $key => $deal)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        
                                        <td id="tooltip-container">
                                            <span data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ $deal->deal_name }}">{{ str_limit($deal->deal_name, 40) }}</span>
                                        </td>
                                        
                                        <td>
                                            @if($deal->deal_photo != null)
                                                <a class="image-popup-vertical-fit" href="{{ asset('assets/uploads/deals/'.$deal->deal_photo) }}" title="{{ $deal->deal_photo }}">
                                                    <img class="img-fluid" alt="" src="{{ asset('assets/uploads/deals/'.$deal->deal_photo) }}" style="width:90px !important; height:40px !important;">
                                                </a>
                                            @else
                                                <span class="text-danger" style="font-weight:600;">Not Available</span>
                                            @endif                                           
                                        </td>

                                        <td>
                                            <span class="text-body fw-bold">
                                                ${{ $deal->deal_price }}
                                            </span>
                                        </td>
                                        
                                        <td>
                                            
                                            <div class="inline" style="display: flex; gap: 5px;">
                                                <a class="btn btn-outline-info btn-sm edit" href="{{ route('deals.edit', $deal->id) }}" title="Edit">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                
                                                <form method="POST" action="{{ route('deals.destroy', $deal->id) }}">
                                                    @csrf
                                                    @method('delete')
                                                    
                                                    <button class="btn btn-outline-danger btn-sm delete" onclick="return confirm('Are you sure to delete?')" style="margin-left: 5px;" title="Delete" type="submit"><i class="fas fa-trash-alt"></i></button> 
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