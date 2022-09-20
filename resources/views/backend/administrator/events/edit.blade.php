@extends('layouts.master')
@section('title', 'Edit Event')

@section('content')

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Edit Event</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Edit Event</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            @if(count($errors) > 0)
                                <div class="alert alert-dismissible fade show color-box bg-danger bg-gradient p-4" role="alert">
                                    <x-jet-validation-errors class="mb-4 my-2 text-white" />
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                            
                            <form class="needs-validation" action="{{ route('events.update', $event->id) }}" method="post" enctype="multipart/form-data" novalidate="">
                                @method('PATCH')
                                @csrf

                                @if($event->event_photo != null)
                                    <div class="row">
                                        <div class="col-md-5"></div>
                                        <div class="col-md-2">
                                            <p style="text-align: center; font-weight: bold;font-size: .8125rem; line-height: 1.5; color: #495057; font-weight: 500;"> Current Event Photo </p>
                                            <a class="image-popup-vertical-fit" href="{{ asset('assets/uploads/events/'.$event->event_photo) }}" title="{{ $event->event_photo }}">
                                                <img class="img-fluid img-thumbnail rounded-circle" alt="" src="{{ asset('assets/uploads/events/'.$event->event_photo) }}" style="width:175px; height:175px;">
                                            </a>
                                        </div>
                                        <div class="col-md-5"></div>
                                    </div>
                                    <br>
                                @endif

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3 position-relative">
                                            <label for="validationTooltip01" class="form-label">Event Name</label>
                                            <input type="text" class="form-control" id="validationTooltip01" placeholder="Enter Event name" name="event_name" value="{{ old('event_name', $event->event_name) }}" required="">
                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>

                                            <div class="invalid-tooltip">
                                                Please enter event name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label for="validationTooltip02">Event Date</label>
                                            <div class="input-group" id="datepicker1">
                                                <input type="text" class="form-control datehighlight" id="validationTooltip02" placeholder="yyyy-mm-dd" name="event_date" data-date-format="yyyy-mm-dd" data-date-container="#datepicker1" data-provide="datepicker" autocomplete="off" value="{{ old('event_date', date('Y-m-d', strtotime($event->event_date)))}}" required="">

                                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                <div class="valid-tooltip">
                                                    Looks good!
                                                </div>

                                                <div class="invalid-tooltip">
                                                    Please select an event date.
                                                </div>
                                            </div><!-- input-group -->
                                        </div>
                                    </div>
                                </div>

                                <br>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3 position-relative">
                                            <label for="validationTooltip03" class="form-label">Event Tag</label>
                                            <input type="text" class="form-control" id="validationTooltip03" name="event_tag" value="{{ old('event_tag', $event->event_tag) }}" placeholder="Enter Event Tag" required="">
                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>

                                            <div class="invalid-tooltip">
                                                Please enter event tag.
                                            </div>
                                        </div>
                                    </div>  

                                    <div class="col-md-6">
                                        <div class="mb-3 position-relative">
                                            <label for="validationTooltip04" class="form-label">Upload Event Photo</label>
                                            <input type="file" class="form-control" id="validationTooltip04" name="event_photo">
                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>

                                            <div class="invalid-tooltip">
                                                Please upload an event photo.
                                            </div>
                                        </div>
                                    </div>                                   
                                </div>

                                <br>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3 position-relative">
                                            <label for="validationTooltip05" class="form-label">Event Details</label>
                                            
                                            <textarea name="event_details" class="form-control" id="validationTooltip05" placeholder="Enter Event Details" rows="5" required="">{{ old('event_details', $event->event_details) }}</textarea>

                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>

                                            <div class="invalid-tooltip">
                                                Please add event details.
                                            </div>
                                        </div>
                                    </div> 
                                </div>

                                <br>

                                <div class="row">
                                    <div class="col-md-12">
                                        <br>
                                        <button class="btn btn-primary" style="margin-top: 6px !important; width: 100% !important" type="submit">Update Event</button>
                                        
                                    </div>
                                </div>

                            </form>

                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

        </div> <!-- container-fluid -->
    </div>

@endsection
