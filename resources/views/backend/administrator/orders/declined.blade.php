@extends('layouts.master')
@section('title', 'Declined Orders')

@section('content')
    <!-- ========================== Page Content ==================================== -->
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Declined Orders</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Declined Orders</li>
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
                                        <th>Oeder ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Date</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>View</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>


                                <tbody>
                                @foreach($orders as $key => $order)

                                    <?php
                                        $query = App\Models\AllQuery::findOrFail($order->query_id);
                                    ?>
                                    <tr>
                                        <td>{{ $key + 1 }}</td>

                                        <td id="tooltip-container">
                                            <span data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ $order->order_id }}" style="font-weight: 500;">{{ $order->order_id }}</span>
                                        </td>
                                        
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
                                            <span style="font-weight:550;">${{ $order->grand_total }}</span>
                                        </td>

                                        <td>
                                            <span class="badge badge-soft-danger">DECLINED</span>
                                        </td>

                                        <td>
                                            <a class="btn btn-success btn-rounded btn-sm waves-effect waves-light" href="{{ route('order.manage', ['id' => $order->id, 'orderid' => $order->order_id]) }}"><i class="bx bx-loader bx-spin font-size-16 align-middle me-1"></i> View Order <i class="bx bxs-right-arrow" style="position: relative; top: 1px;"></i></a>
                                        </td>

                                        <td>                                          
                                            <div class="inline" style="display: flex; gap: 5px;">
                                                
                                                <form method="POST" action="{{ route('order.destroy', $order->id) }}">
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