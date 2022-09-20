@extends('layouts.master')
@section('title', 'Edit Deal')

@section('content')

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Edit Deal</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Edit Deal</li>
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
                            
                            <form class="needs-validation" action="{{ route('deals.update', $deal->id) }}" method="post" enctype="multipart/form-data" novalidate="">
                                @method('PATCH')
                                @csrf

                                @if($deal->deal_photo != null)
                                    <div class="row">
                                        <div class="col-md-5"></div>
                                        <div class="col-md-2">
                                            <p style="text-align: center; font-weight: bold;font-size: .8125rem; line-height: 1.5; color: #495057; font-weight: 500;"> Current Deal Photo </p>
                                            <a class="image-popup-vertical-fit" href="{{ asset('assets/uploads/deals/'.$deal->deal_photo) }}" title="{{ $deal->deal_photo }}">
                                                <img class="img-fluid img-thumbnail rounded-circle" alt="" src="{{ asset('assets/uploads/deals/'.$deal->deal_photo) }}" style="width:175px; height:175px;">
                                            </a>
                                        </div>
                                        <div class="col-md-5"></div>
                                    </div>
                                    <br>
                                @endif

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3 position-relative">
                                            <label for="validationTooltip01" class="form-label">Deal Name</label>
                                            <input type="text" class="form-control" id="validationTooltip01" placeholder="Enter Deal name" name="deal_name" value="{{ old('deal_name', $deal->deal_name) }}" required="">

                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>

                                            <div class="invalid-tooltip">
                                                Please enter deal name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3 position-relative">
                                            <label for="validationTooltip02">Deal Price</label>
                                            <input type="number" step="0.01" class="form-control" id="validationTooltip02" placeholder="Enter Deal name" name="deal_price" value="{{ old('deal_price', $deal->deal_price) }}" required="">

                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>

                                            <div class="invalid-tooltip">
                                                Please enter deal price.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <br>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3 position-relative">
                                            <label for="validationTooltip04" class="form-label">Upload Deal Photo</label>
                                            <input type="file" class="form-control" id="validationTooltip04" name="deal_photo">
                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>

                                            <div class="invalid-tooltip">
                                                Please upload an deal photo.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <br>
                                        <button class="btn btn-primary" style="margin-top: 6px !important; width: 100% !important" type="submit">Update Deal</button>
                                        
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
