@extends('layouts.master')
@section('title', 'All Events')

@section('content')
    <!-- ========================== Page Content ==================================== -->
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Event List</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Event List</li>
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
                                        <th>Date</th>
                                        <th>Tag</th>
                                        <th>Photo</th>
                                        <th>Details</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>


                                <tbody>
                                @foreach($events as $key => $event)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        
                                        <td id="tooltip-container">
                                            <span data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ $event->event_name }}">{{ str_limit($event->event_name, 20) }}</span>
                                        </td>
                                        
                                        <td>
                                            <?php
                                                $date_time = strtotime($event->event_date);
                                                $evn_date = date('d M, Y', $date_time);
                                            ?>
                                            {{ $evn_date }}
                                        </td>

                                        <td id="tooltip-container">
                                            <span data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ $event->event_tag }}">{{ str_limit($event->event_tag, 20) }}</span>
                                        </td>

                                        <td>
                                            @if($event->event_photo != null)
                                                <a class="image-popup-vertical-fit" href="{{ asset('assets/uploads/events/'.$event->event_photo) }}" title="{{ $event->event_photo }}">
                                                    <img class="img-fluid" alt="" src="{{ asset('assets/uploads/events/'.$event->event_photo) }}" style="width:90px !important; height:40px !important;">
                                                </a>
                                            @else
                                                <span class="text-danger" style="font-weight:600;">Not Available</span>
                                            @endif
                                            
                                        </td>

                                        <td id="tooltip-container">
                                            <span data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ $event->event_details }}">{{ str_limit($event->event_details, 30) }}</span>
                                        </td>
                                        
                                        <td>
                                            <div class="inline" style="display: flex; gap: 5px;">
                                                <a class="btn btn-outline-info btn-sm edit" href="{{ route('events.edit', $event->id) }}" title="Edit">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                
                                                <form method="POST" action="{{ route('events.destroy', $event->id) }}">
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