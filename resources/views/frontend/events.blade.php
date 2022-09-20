@extends('layouts.frontend-master')

@section('title', 'All Deals')

@section('content')

    <!-- Static Backdrop Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="staticBackdropLabel">Event Details</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5 class="mb-3 event-title"></h5>

                    <p class="mb-3 event-time"></p>

                    <div class="event-photo-js">
                        
                    </div>
                    <br>
                    <h6 class="event-details-js"></h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" style="margin: auto !important;" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
                    
    <section class="section" id="news" style="margin-top: 50px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mb-5">
                        <div class="small-title">Events</div>
                        <h4>All Events</h4>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">

                @foreach($all_events as $all_event)

                    <?php
                        $date_time = strtotime($all_event->event_date);
                        $evn_date = date('d M, Y', $date_time);
                    ?>
                    
                    <div class="col-xl-4 col-sm-6 mb-3">
                        <div class="blog-box mb-4 mb-xl-0">
                            <div class="position-relative">
                                
                                <a class="image-popup-vertical-fit" href="{{ asset('assets/uploads/events/'.$all_event->event_photo) }}" title="{{ $all_event->event_photo }}">
                                    <img src="{{ asset('assets/uploads/events/'.$all_event->event_photo) }}" alt="" class="rounded img-fluid mx-auto d-block">
                                </a>
                                
                                <div class="badge bg-success blog-badge font-size-11">{{ $all_event->event_tag }}</div>
                            </div>

                            <div class="mt-4 text-muted">
                                <p class="mb-2"><i class="bx bx-calendar me-1"></i> {{ $evn_date }} </p>
                                <h5 class="mb-3">{{ str_limit($all_event->event_name, 37) }}</h5>
                                <p>{{ str_limit($all_event->event_details, 90) }}</p>
                            </div>

                            <button class="btn btn-dark btn-sm" id="getEvent" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-url="{{ route('get.single.event', $all_event->id) }}">View Details <i class="bx bxs-right-arrow" style="position: relative; top: 1px;"></i></button>

                        </div>
                    </div>

                @endforeach

            </div>

            <div class="d-flex justify-content-center" style="margin-top: 20px;">
                {{ $all_events->links() }}
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>

@endsection

@section('scripts')
    
    <script>
        $(document).ready(function(){

            $(document).on('click', '#getEvent', function(e){

                e.preventDefault();

                var url = $(this).data('url');

                $.ajax({
                    url: url,
                    type: 'GET',
                })
                .done(function(data){
                    $('.event-title').html(data.event_name);

                    var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
                    var newdate = new Date(data.event_date);
                    var evndate  = newdate.toLocaleDateString("en-US", options);

                    $('.event-time').html('<i class="bx bx-calendar me-1"></i> ' + evndate);
                    $('.event-details-js').html(data.event_details);

                    $('.event-photo-js').html('<img class="rounded img-fluid mx-auto d-block" src=/assets/uploads/events/' + data.event_photo + '/>');
                })
                .fail(function(){
                    /*$('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
                    $('#modal-loader').hide();*/
                });

            });

        });
    </script>
@endsection