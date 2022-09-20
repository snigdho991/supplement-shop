@extends('layouts.master')
@section('title', 'Order Details')

@section('content')
    
    <!-- Static Backdrop Modal -->
    <div class="modal fade" id="exampleModalScrollable" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Mark an Order</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form class="needs-validation" action="{{ route('change.order.status') }}" method="post" novalidate="">
                        @csrf

                        <input type="hidden" name="order_id" value="{{ $order->id }}">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="validationTooltip01" class="form-label">Change Status</label>
                                    
                                    <select class="form-control {{-- select2 --}}" id="validationTooltip01" name="order_status" required="">
                                        
                                        <option value="">Select</option>
                                        <option value="pending" @if($order->status == "pending") selected="" @endif>
                                            Pending
                                        </option>
                                        <option value="accepted" @if($order->status == "accepted") selected="" @endif>
                                            Accepted
                                        </option>

                                        <option value="declined" @if($order->status == "declined") selected="" @endif>
                                            Declined
                                        </option>
                                        
                                    </select>

                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>

                                    <div class="invalid-tooltip">
                                        Please select a status.
                                    </div>
                                </div>
                            </div>
                        </div>

                </div>

                <div class="modal-footer" style="margin-top:10px;">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-10">
                                <button type="submit" style="width: 100%; margin-left: .6rem;" class="btn btn-primary">Save Order Status</button>
                            </div>

                            <div class="col-2">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                    </form>

                    
            </div>
        </div>
    </div>

    <!-- ========================== Page Content ==================================== -->
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Order Details</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Order Details</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            @if($order->status == 'accepted')
                <div class="alert bg-success bg-gradient text-white" style="text-align: center; font-weight: 550;" role="alert">
                    <i class="mdi mdi-check-all me-2" style="font-weight: bold;"></i>
                    This ORDER has been accepted and approved. You earned <b>${{ $order->grand_total }}</b>
                </div>
            @elseif($order->status == 'declined')
                <div class="alert bg-danger bg-gradient text-white" style="text-align: center; font-weight: 550;" role="alert">
                    <i class="mdi mdi-xamarin-outline me-2" style="font-weight: bold;"></i>
                    This ORDER has been DECLINED!
                </div>
            @else
                <div class="alert bg-primary bg-gradient text-white" style="text-align: center; font-weight: 550;" role="alert">
                    <i class="mdi mdi-shield-alert-outline me-2" style="font-weight: bold;"></i>
                    This ORDER is PENDING now!
                </div>
            @endif

            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="media">
                            
                                <div class="media-body overflow-hidden">
                                    <h5 class="text-truncate font-size-15">Order ID : <span class="text-primary" style="font-weight: 600;">{{ $order->order_id }}</span></h5>
                                    <p class="text-muted">You can track your own prefered order by using this Order ID.</p>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <h5 class="font-size-15 mt-4">Order Details :</h5>
                                    <div class="text-muted mt-4">
                                        
                                        <p><i class="mdi mdi-chevron-right text-primary me-1"></i> Product Name: <span style="font-weight: 550;">{{ $order->product_name }}</span></p>

                                        <p><i class="mdi mdi-chevron-right text-primary me-1"></i> Per Unit Price: <span style="font-weight: 550;">${{ $order->per_unit_price }}</span></p>

                                        <p><i class="mdi mdi-chevron-right text-primary me-1"></i> Quantity: <span style="font-weight: 550;">{{ $order->quantity }}</span></p>
                                        
                                        <p><i class="mdi mdi-chevron-right text-primary me-1"></i> Total Price: <span style="font-weight: 550;">${{ number_format((float) $order->per_unit_price * $order->quantity, 2, '.', '') }}</span></p>

                                        <p><i class="mdi mdi-chevron-right text-primary me-1"></i> Grand Total: <span style="font-weight: 550;">${{ $order->grand_total }}</span></p>

                                    </div>
                                </div>

                                @if($order->photo)

                                    <div class="col-md-6">
                                        <div class="zoom-gallery d-flex flex-wrap">
                                                
                                            <a href="{{ asset('assets/uploads/orders/'.$order->photo) }}" title="{{ $order->photo }}"><img src="{{ asset('assets/uploads/orders/'.$order->photo) }}" style="height: 160px;" alt="order-image" width="275"></a>
                                        </div>
                                    </div>

                                @endif

                            </div>
                            
                            <?php
                                $date_time = strtotime($order->created_at);
                                $not_date = date('d M, Y', $date_time);
                                $newDateTime = date('h:i A', $date_time);

                                $up_date_time = strtotime($order->updated_at);
                                $up_not_date = date('d M, Y', $up_date_time);
                                $newDateTimeUp = date('h:i A', $up_date_time);
                            ?>
                            <div class="row task-dates">

                                <div class="col-sm-4 col-4">
                                    <div class="mt-4">
                                        <h5 class="font-size-14"><i class="bx bx-calendar me-1 text-primary"></i> Start Date</h5>
                                        <p class="text-muted mb-0">{{ $not_date }} - {{ $newDateTime }}</p>
                                    </div>
                                </div>

                                <div class="col-sm-4 col-4">
                                    <div class="mt-4">

                                        @if($order->status == 'pending')
                                            <h5 class="font-size-14"><i class="bx bx-timer me-1 text-primary"></i> Since</h5>
                                            <p class="text-muted mb-0" style="margin-left: 22px;">{{ $order->created_at->diffForHumans() }}</p>
                                        @elseif($order->status == 'declined')
                                            <h5 class="font-size-14"><i class="bx bx-calendar-x me-1 text-primary"></i> Declined At</h5>
                                            <p class="text-muted mb-0">{{ $up_not_date }} - {{ $newDateTimeUp }}</p>
                                        @else
                                            <h5 class="font-size-14"><i class="bx bx-calendar-check me-1 text-primary"></i> Ordered At</h5>
                                            <p class="text-muted mb-0">{{ $up_not_date }} - {{ $newDateTimeUp }}</p>
                                        @endif

                                    </div>
                                </div>

                                <div class="col-sm-4 col-4">
                                    <div class="mt-4">
                                        <h5 class="font-size-14"><i class="bx bx-stats me-1 text-primary"></i> Status</h5>
                                        <p class="text-dark mb-0 font-size-14">
                                            @if($order->status == 'pending')
                                                <i class="bx bx-right-arrow-circle bx-fade-left me-1 text-info"></i>
                                                <span class="text-info" style="font-weight: 450;">PENDING</span>
                                            @elseif($order->status == 'declined')
                                                <i class="bx bx-right-arrow-circle bx-fade-left me-1 text-danger"></i> 
                                                <span class="text-danger" style="font-weight: 450;">DECLINED</span>
                                            @elseif($order->status == 'accepted')
                                                <i class="bx bx-right-arrow-circle bx-fade-left me-1 text-success"></i> 
                                                <span class="text-success" style="font-weight: 450;">SUCCESSFUL ORDER</span>
                                            @endif
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-4 col-sm-6" id="tooltip-container">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    <div class="card border mb-0">
                                        <div class="card-header">
                                            <h6 class="my-0 text-dark text-center">Administrator Confirmation</h6>
                                        </div> 

                                        <div class="card-body bg-transparent text-center">
                                            
                                            <small class="text-info">You can mark the order as pending, successful or declined.</small>
                                            
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-2"></div>
                                                                       
                                <div class="col-md-8">

                                   <button type="button" class="btn btn-dark waves-effect btn-label waves-light" data-bs-toggle="modal" data-bs-target="#exampleModalScrollable" style="width: 100%;"> 
                                        <i class="bx bx-paper-plane label-icon"></i> Change Order Status
                                    </button>
                            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">

                            <div class="media">
                            
                                <div class="media-body overflow-hidden">
                                    <h5 class="text-truncate font-size-15">Query Details <i class="bx bx-right-arrow-circle font-size-20 align-middle me-1"></i></h5>
                                    
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <h5 class="font-size-15 mt-4">Sender Details :</h5>
                                    <div class="text-muted mt-4">
                                        
                                        <p><i class="mdi mdi-chevron-right text-primary me-1"></i> First Name: <span style="font-weight: 550;">{{ $query->firstname }}</span></p>

                                        <p><i class="mdi mdi-chevron-right text-primary me-1"></i> Last Name: <span style="font-weight: 550;">{{ $query->lastname }}</span></p>

                                        <p><i class="mdi mdi-chevron-right text-primary me-1"></i> E-mail: <span style="font-weight: 550;">{{ $query->email }}</span></p>
                                        
                                        <p><i class="mdi mdi-chevron-right text-primary me-1"></i> Cell/Phone: <span style="font-weight: 550;">{{ $query->phone }}</span></p>

                                        <p><i class="mdi mdi-chevron-right text-primary me-1"></i> Business Name: <span style="font-weight: 550;">{{ $query->businessname }}</span></p>

                                    </div>
                                </div>

                                
                                <div class="col-md-6">
                                    <h5 class="font-size-15 mt-4">Delivery Details :</h5>
                                    <div class="text-muted mt-4">
                                        
                                        <p><i class="mdi mdi-chevron-right text-primary me-1"></i> Address: <span style="font-weight: 550;">{{ $query->address }}</span></p>

                                        <p><i class="mdi mdi-chevron-right text-primary me-1"></i> Zip Code: <span style="font-weight: 550;">{{ $query->zip }}</span></p>

                                        <p><i class="mdi mdi-chevron-right text-primary me-1"></i> City: <span style="font-weight: 550;">{{ $query->city }}</span></p>
                                        
                                        <p><i class="mdi mdi-chevron-right text-primary me-1"></i> State: <span style="font-weight: 550;">{{ $query->state }}</span></p>

                                        <p><i class="mdi mdi-chevron-right text-primary me-1"></i> IP Address: <span style="font-weight: 550;">{{ $query->ip_address }}</span></p>

                                    </div>
                                </div>

                            </div>
                            
                        </div>
                    </div>

                </div>

                <div class="col-lg-4 col-sm-6" id="tooltip-container">
                    <div class="card">
                        <div class="card-body">
                            <div class="media">
                                <div class="avatar-md me-4">
                                    <span class="avatar-title rounded-circle bg-light text-danger font-size-16">
                                        {{ $avatar }}
                                    </span>
                                </div>

                                <div class="media-body overflow-hidden">
                                    <h5 class="text-truncate font-size-15">
                                        <a href="#" class="text-dark" data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $query->firstname . ' ' . $query->lastname }}">
                                            <i class="bx bx-right-arrow-circle font-size-15" style="position: relative;top: 2px;"></i>
                                            
                                            {{ $query->firstname . ' ' . $query->lastname }}
                                        </a>
                                    </h5>
                                    
                                    <h6 class="mb-2"><i class="bx bx-right-arrow-circle font-size-15" style="position: relative;top: 2px;"></i> {{ $query->email }}</h6>
                                    
                                    <h6 style="margin-top: .60rem!important;"><i class="bx bx-right-arrow-circle font-size-15" style="position: relative;top: 2px;"></i> {{ $query->phone }}</h6>
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->                
                
@endsection
