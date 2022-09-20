@extends('layouts.master')
@section('title', 'Query Details')

@section('content')
    
    <!-- Static Backdrop Modal -->
    <div class="modal fade" id="exampleModalScrollable" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Make an Order</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form class="needs-validation" action="{{ route('conver.to.order') }}" method="post" enctype="multipart/form-data" novalidate="">
                        @csrf
                        
                        <input type="hidden" name="query_id" value="{{ $query->id }}">

                        <div class="col-md-12">
                            <div class="mb-3 position-relative">
                                <label for="validationTooltip01" class="form-label">Product Name (*)</label>
                                <input type="text" class="form-control" id="validationTooltip01" placeholder="Enter product name" name="product_name" value="{{ old('product_name') }}" required="">
                                <div class="valid-tooltip">
                                    Looks good!
                                </div>

                                <div class="invalid-tooltip">
                                    Please enter product name.
                                </div>
                            </div>
                        </div>

                        <br>

                        <div class="col-md-12">
                            <div class="mb-3 position-relative">
                                
                                <label for="validationTooltip03" class="form-label">Upload Photo (Optional)</label>
                                <input type="file" class="form-control" id="validationTooltip03" placeholder="Upload Photo" name="photo">

                                <div class="valid-tooltip">
                                    Looks good!
                                </div>
                                
                            </div>
                        </div>

                        <br>

                        <div class="checkout">
                            <div class="col-md-12">
                                <div class="mb-3 position-relative">
                                    <label for="validationTooltip02" class="form-label">Per Unit Price (*)</label>
                                    <input type="number" min="0" step="0.01" class="form-control perunit" id="validationTooltip02" name="per_unit_price" value="{{ old('per_unit_price') }}" placeholder="Enter Per Unit Price" required="">
                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>

                                    <div class="invalid-tooltip">
                                        Please enter valid per unit price.
                                    </div>
                                </div>
                            </div> 

                            <br>     

                            <div class="col-md-12">
                                <div class="mb-3 position-relative">
                                    <label for="validationTooltip04" class="form-label">Quantity (*)</label>
                                    <input type="number" min="1" step="1" class="form-control quantity" id="validationTooltip04" name="quantity" value="{{ old('quantity') }}" placeholder="Enter Quantity" required="">
                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>

                                    <div class="invalid-tooltip">
                                        Please enter the quantity.
                                    </div>
                                </div>
                            </div> 

                            <br>  

                            <div class="col-md-12">
                                <div class="mb-3 position-relative">
                                    <label for="validationTooltip05" class="form-label">Total Price (At USD)</label>
                                    <input type="number" class="form-control total" id="validationTooltip05" step="0.01" placeholder="Calculation of total price" disabled="">
                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>
                                </div>
                            </div> 

                        </div>

                        <div class="col-md-12">
                            <div class="mb-3 position-relative">
                                <label for="validationTooltip11" class="form-label">Grand Total (*)</label>
                                <input type="number" step="0.01" min="0" class="form-control" id="validationTooltip11" name="grand_total" value="{{ old('grand_total') }}" placeholder="Enter Grand Total" required="">
                                <div class="valid-tooltip">
                                    Looks good!
                                </div>

                                <div class="invalid-tooltip">
                                    Please enter final grand total.
                                </div>
                            </div>
                        </div> 

                </div>

                <div class="modal-footer" style="margin-top:10px;">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-10">
                                <button type="submit" style="width: 100%; margin-left: .6rem;" class="btn btn-primary">Create New Order</button>
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
                        <h4 class="mb-sm-0 font-size-18">Query Details</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Query Details</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            @if($query->status == 2)

                <?php
                    $order = \App\Models\Order::where('query_id', $query->id)->first();
                ?>

                <div class="alert bg-success bg-gradient text-white" style="text-align: center; font-weight: 550;" role="alert">
                    <i class="mdi mdi-check-all me-2" style="font-weight: bold;"></i>
                    This query has been accepted and marked as ORDER. Go to the <a style="color:#fff; font-weight:bold; text-decoration: underline !important; font-style: oblique;" href="{{ route('order.manage', ['id' => $order->id, 'orderid' => $order->order_id]) }}">order page</a>.
                </div>
            @endif

            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
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
                            
                            <?php
                                $date_time = strtotime($query->created_at);
                                $not_date = date('d M, Y', $date_time);
                                $newDateTime = date('h:i A', $date_time);

                                $up_date_time = strtotime($query->updated_at);
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

                                        @if($query->status == 1)
                                            <h5 class="font-size-14"><i class="bx bx-timer me-1 text-primary"></i> Since</h5>
                                            <p class="text-muted mb-0" style="margin-left: 22px;">{{ $query->created_at->diffForHumans() }}</p>
                                        @elseif($query->status == 0)
                                            <h5 class="font-size-14"><i class="bx bx-calendar-x me-1 text-primary"></i> Declined At</h5>
                                            <p class="text-muted mb-0">{{ $not_date }} - {{ $newDateTime }}</p>
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
                                            @if($query->status == 1)
                                                <i class="bx bx-right-arrow-circle bx-fade-left me-1 text-info"></i>
                                                <span class="text-info" style="font-weight: 450;">PENDING</span>
                                            @elseif($query->status == 0)
                                                <i class="bx bx-right-arrow-circle bx-fade-left me-1 text-danger"></i> 
                                                <span class="text-danger" style="font-weight: 450;">SPAM</span>
                                            @elseif($query->status == 2)
                                                <i class="bx bx-right-arrow-circle bx-fade-left me-1 text-success"></i> 
                                                <span class="text-success" style="font-weight: 450;">ORDER</span>
                                            @endif
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-4 col-sm-6" id="tooltip-container">
                    {{-- <div class="card text-center">
                    <div class="card-body">
                        <span class="badge rounded-pill badge-soft-primary font-size-11">Sender Info</span>
                        <div class="avatar-sm mx-auto mb-4">
                            <br><span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-16">
                                {{ $avatar }}
                            </span>
                        </div>
                        <br>

                        <label class="form-label">Full Name <i class="bx bx-right-arrow-circle font-size-15" style="position: relative; top: 3px;"></i></label>
                        <h5 class="font-size-15 mb-1" style="margin-top: -5px;"><a href="#" class="text-dark" data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="left" title="{{ $query->firstname . ' ' . $query->lastname }}">{{ $query->firstname . ' ' . $query->lastname }}</a></h5><br>

                        <p style="font-weight: 450;">
                            <label class="form-label me-1">E-mail
                                <i class="bx bx-right-arrow-circle font-size-15" style="position: relative;top: 2px;"></i>
                            </label> 
                            {{ $query->email }}
                        </p>

                        <p style="font-weight: 450;">
                            <label class="form-label me-1">Cell/Phone 
                                <i class="bx bx-right-arrow-circle font-size-15" style="position: relative;top: 2px;"></i>
                            </label> 
                            {{ $query->phone }}
                        </p>

                    </div>
                    </div> --}}

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

                    @if($query->status == 1)

                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 mb-4">
                                        <div class="card border mb-0">
                                            <div class="card-header">
                                                <h6 class="my-0 text-dark text-center">Administrator Confirmation</h6>
                                            </div> 

                                            <div class="card-body bg-transparent text-center">
                                                
                                                <small class="text-info">You can Approve the query as Order or Decline the query.</small>
                                                
                                            </div>
                                        </div>
                                    </div>
                                                                           
                                    <div class="col-md-6">
                                        <form action="" method="post">
                                            @csrf
                                            
                                            <button type="button" class="btn btn-success waves-effect btn-label waves-light" data-bs-toggle="modal" data-bs-target="#exampleModalScrollable" style="width: 100%;"><i class="bx bx-check-double label-icon"></i> Accept As Order</button>
                                        </form>
                                    </div>

                                    <div class="col-md-6">
                                        <form action="{{ route('mark.spam') }}" method="post">
                                            @csrf

                                            <input type="hidden" name="query_id" value="{{ $query->id }}">                                        
                                            <button type="submit" class="btn btn-danger waves-effect btn-label waves-light" onclick="return confirm('Are you sure to mark the query as SPAM?')" style="width: 100%;"><i class="bx bx-block label-icon"></i> Mark As Spam </button>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @elseif($query->status == 0)

                        <div class="card">                        
                            <div class="card-body">                            
                                <div class="row">
                                    <div class="col-md-12 mb-4">
                                        <div class="card border mb-0">
                                            <div class="card-header">
                                                <h6 class="my-0 text-dark text-center">Administrator Confirmation</h6>
                                            </div> 

                                            <div class="card-body bg-transparent text-center">
                                                
                                                <small class="text-danger">This query is marked as SPAM. Click below to unspam.</small>
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3"></div>
                                                                           
                                    <div class="col-md-6">
                                        <form action="{{ route('remove.spam') }}" method="post">
                                            @csrf

                                            <input type="hidden" name="query_id" value="{{ $query->id }}">                                        
                                            <button type="submit" class="btn btn-light waves-effect btn-label waves-light" onclick="return confirm('Are you sure to unspam the query?')" style="width: 100%;"><i class="bx bx-badge-check label-icon"></i> Un-Spam Query </button>

                                        </form>
                                    </div>

                                    <div class="col-md-3"></div>
                                </div>
                           </div>
                        </div>

                    @endif

                </div>

            </div>

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->                
                
@endsection


@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $(".checkout").on("keyup", ".quantity", function(){
                var price = $(".perunit").val();
                var quantity = $(this).val();
                $(".total").val(price * quantity);
            });

            $(".checkout").on("keyup", ".perunit", function(){
                var quantity = $(".quantity").val();
                var price = $(this).val();
                $(".total").val(price * quantity);
            })
        })
    </script>
@endsection