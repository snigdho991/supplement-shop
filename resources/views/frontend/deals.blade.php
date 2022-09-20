@extends('layouts.frontend-master')

@section('title', 'All Deals')

@section('content')

    <!-- Static Backdrop Modal -->
    <div class="modal fade" id="staticBackdropD" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="staticBackdropLabel">Deal Details</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <h5 class="mb-3 deal-title"></h5>

                    <p class="mb-3 deal-price"></p>

                    <div class="deal-photo-js">
                        
                    </div>
                    <br>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" style="margin: auto !important;" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
                    
    <section class="section" id="team" style="margin-top: 50px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mb-5">
                        <div class="small-title">Offers</div>
                        <h4>All Decent Deals</h4>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="row">

                        @foreach($all_deals as $all_deal)

                        <?php
                            $date_time = strtotime($all_deal->created_at);
                            $deal_date = date('d M, Y', $date_time);
                        ?>
                        <div class="col-lg-3 mb-3">
                        
                            <div class="item">
                                <div class="card text-center team-box">
                                    <div class="card-body">
                                        <div>
                                            <div class="zoom-gallery d-flex flex-wrap">
                                                <a href="{{ asset('assets/uploads/deals/'.$all_deal->deal_photo) }}" title="{{ $all_deal->deal_photo }}">
                                                    <img src="{{ asset('assets/uploads/deals/'.$all_deal->deal_photo) }}" alt="" style="width: 100% !important; height: 300px !important;" class="rounded">
                                                </a>
                                            </div>
                                        </div>

                                        <div class="mt-3">
                                            <h5>{{ str_limit($all_deal->deal_name, 20) }}</h5>
                                            <P class="text-muted mb-0">${{ $all_deal->deal_price }}</P>
                                        </div>

                                        <button class="btn btn-light btn-sm mt-3" id="getDeal" data-bs-toggle="modal" data-bs-target="#staticBackdropD" data-url="{{ route('get.single.deal', $all_deal->id) }}">View Deal <i class="bx bxs-right-arrow" style="position: relative; top: 1px;"></i> </button>
                                    </div>
                                    
                                </div>
                            </div>

                        </div>

                        @endforeach

                    </div>                
                </div>
            </div>

            <div class="d-flex justify-content-center">
                {{ $all_deals->links() }}
            </div>

        </div>
        <!-- end container -->
    </section>

@endsection

@section('styles')
    <style type="text/css">

    </style>
@endsection

@section('scripts')
    
    <script>
        $(document).ready(function(){

            $(document).on('click', '#getDeal', function(e){

                e.preventDefault();

                var url = $(this).data('url');

                $.ajax({
                    url: url,
                    type: 'GET',
                })
                .done(function(data){
                    $('.deal-title').html(data.deal_name);

                    $('.deal-price').html('<i class="bx bx-money me-1"></i> ' + '$' + data.deal_price);

                    $('.deal-photo-js').html('<img class="rounded img-fluid mx-auto d-block" style="height: 400px !important; width: 460px !important;" src=/assets/uploads/deals/' + data.deal_photo + '/>');
                })
                .fail(function(){
                    /*$('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
                    $('#modal-loader').hide();*/
                });

            });

        });
    </script>
@endsection