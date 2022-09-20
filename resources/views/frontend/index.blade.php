@extends('layouts.frontend-master')

@section('title', 'The Easiest Way to Buy High Quality Wine')

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

                    <div class="event-photo-js"></div>

                    <br>

                    <h6 class="event-details-js"></h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" style="margin: auto !important;" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

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
                    
        
    <section class="section hero-section bg-ico-hero" id="home" style="padding-top: 150px; padding-bottom: 100px;">
        <div class="bg-overlay bg-primary"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="text-white-50">
                        <h1 class="text-white font-weight-semibold mb-3 hero-title">Supplementtext - Dummy text will be here</h1>
                        <p class="font-size-14">Dummy details will be here.</p>
                        
                        <div class="button-items mt-4">
                            <a href="#" class="btn btn-success">Upcoming Events</a>
                            <a href="#" class="btn btn-light">Prior Offers</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-10 col-sm-12 ms-lg-auto">
                    <div class="card overflow-hidden mb-0 mt-5 mt-lg-0 session-slider">
                        
                            <iframe width="546" height="375" src="https://www.youtube.com/embed/bxoYtCfIBXQ" frameborder="0" title="YouTube video describing the WineText service" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
                        
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>

    <section class="section pt-4 bg-white" id="about" style="padding-top:40px !important;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mb-5">
                        <div class="small-title">Why us?</div>
                        <h4>Supplementtext.com</h4>
                    </div>

                    <div class="col-lg-12">
                        <div class="card border">
                            <div class="card-body">
                                <div class="media">
                                    <div class="avatar-xs me-3">
                                        <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                            <i class="mdi mdi-ethereum"></i>
                                        </span>
                                    </div>
                                    <div class="media-body">
                                        <h4>The Easiest Way to Buy High Quality Wine</h4>
                                        <p><i class="mdi mdi-arrow-down ms-1 text-danger"></i> At Ridiculously Low Prices</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="row align-items-center">
                <div class="col-lg-12">

                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>

    <section class="section" id="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mb-5">
                        <h4>Setup your free subscription</h4>
                        <div class="small-title">
                            Setup your free daily text subscription in less than 2 mins and get our daily deal text... Like it? Respond with just the number of bottles and you're all set. 10 seconds/day to get the most ridiculous wine deals delivered to your doorstep.
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

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
                            
                            <form class="needs-validation" action="{{ route('submit.query') }}" method="post" enctype="multipart/form-data" novalidate="">
                                @csrf

                                <h4 style="text-align: center; margin-bottom: 20px;" class="text-primary">Basic Information</h4>

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="mb-3 position-relative">
                                            <label for="validationTooltip01" class="form-label">E-mail</label>
                                            <input type="email" class="form-control" id="validationTooltip01" placeholder="Enter E-mail here" name="email" value="{{ old('email') }}" required="">
                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>

                                            <div class="invalid-tooltip">
                                                Please enter e-mail address.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3 position-relative">
                                            <label for="validationTooltip02" class="form-label">Cell Phone</label>
                                            <input type="number" class="form-control" id="validationTooltip02" name="phone" value="{{ old('phone') }}" placeholder="Enter Cell Phone">
                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>

                                            <div class="invalid-tooltip">
                                                Please enter your valid cell number.
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <br>

                                <h4 style="text-align: center; margin-bottom: 20px;" class="text-primary">WHERE CAN WE SHIP IT FOR YOU?</h4>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3 position-relative">
                                            <label for="validationTooltip03" class="form-label">First Name</label>
                                            <input type="text" class="form-control" id="validationTooltip03" placeholder="Enter Your First Name" name="firstname" value="{{ old('firstname') }}">
                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>

                                            <div class="invalid-tooltip">
                                                Please enter your first name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3 position-relative">
                                            <label for="validationTooltip04" class="form-label">Last Name</label>
                                            <input type="text" class="form-control" id="validationTooltip04" placeholder="Enter Your Last Name" name="lastname" value="{{ old('lastname') }}">
                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>

                                            <div class="invalid-tooltip">
                                                Please enter your last name.
                                            </div>
                                        </div>
                                    </div>                                           
                                </div>

                                <br>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3 position-relative">
                                            <label for="validationTooltip05" class="form-label">Business Name (optional)</label>
                                            <input type="text" class="form-control" id="validationTooltip05" placeholder="Enter Your Business Name" name="businessname" value="{{ old('businessname') }}">
                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <br>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3 position-relative">
                                            <label for="validationTooltip06" class="form-label">Address</label>
                                            <input type="text" class="form-control" id="validationTooltip06" placeholder="Enter Your Address" name="address" value="{{ old('address') }}">
                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <br>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3 position-relative">
                                            <label for="validationTooltip11" class="form-label">Zip</label>
                                            <input type="number" min="10000" max="99999" class="form-control zip" id="validationTooltip11" placeholder="Enter Your Zip Code Here" name="zip" required="">
                                            <div class="valid-tooltip">
                                                Looks good! Zip Code Exists.
                                            </div>

                                            <div class="invalid-tooltip zipcode">
                                                Please enter your 5 digit VALID zip code here.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3 position-relative">
                                            <label for="validationTooltip12" class="form-label">City</label>
                                            <input type="text" class="form-control city" id="validationTooltip12" placeholder="Enter Your City" name="city" required="">
                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>

                                            <div class="invalid-tooltip">
                                                Please enter your city.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3 position-relative">
                                            <label for="validationTooltip13" class="form-label customState">State</label>
                                            <br>
                                            <select class="form-control select2 state" required="" name="state" id="validationTooltip13">
                                                <option value="">Select State</option>
                                                
                                                    <option value="Arizona">Arizona</option>
                                                    <option value="California">California</option>
                                                    <option value="Colorado">Colorado</option>
                                                    <option value="Connecticut">Connecticut</option>
                                                    <option value="District Of Columbia">District Of Columbia</option>
                                                    <option value="Florida">Florida</option>
                                                    <option value="Georgia">Georgia</option>
                                                    <option value="Idaho">Idaho</option>
                                                    <option value="Indiana">Indiana</option>
                                                    <option value="Iowa">Iowa</option>
                                                    <option value="Kansas">Kansas</option>
                                                    <option value="Louisiana">Louisiana</option>
                                                    <option value="Maine">Maine</option>
                                                    <option value="Maryland">Maryland</option>
                                                    <option value="Massachusetts">Massachusetts</option>
                                                    <option value="Minnesota">Minnesota</option>
                                                    <option value="Missouri">Missouri</option>
                                                    <option value="Montana">Montana</option>
                                                    <option value="Nebraska">Nebraska</option>
                                                    <option value="Nevada">Nevada</option>
                                                    <option value="New Hampshire">New Hampshire</option>
                                                    <option value="New Jersey">New Jersey</option>
                                                    <option value="New Mexico">New Mexico</option>
                                                    <option value="New York">New York</option>
                                                    <option value="North Carolina">North Carolina</option>
                                                    <option value="Ohio">Ohio</option>
                                                    <option value="Oregon">Oregon</option>
                                                    <option value="Pennsylvania">Pennsylvania</option>
                                                    <option value="South Carolina">South Carolina</option>
                                                    <option value="Tennessee">Tennessee</option>
                                                    <option value="Vermont">Vermont</option>
                                                    <option value="Virginia">Virginia</option>
                                                    <option value="Washington">Washington</option>
                                                    <option value="West Virginia">West Virginia</option>
                                                    <option value="Wisconsin">Wisconsin</option>
                                                    <option value="Wyoming">Wyoming</option>
                                               
                                            </select>

                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>

                                            <div class="invalid-tooltip">
                                                Please select your state.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <br>

                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <br>
                                        <button class="btn btn-primary" style="margin-top: 6px !important; width: 100% !important" type="submit">Sign Up</button>
                                        
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

        </div>
        <!-- end container -->
    </section>

    <section class="section bg-white" id="news">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mb-5">
                        <div class="small-title">Events</div>
                        <h4>Upcoming Events</h4>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">

                @foreach($latest_events as $latest_event)

                    <?php
                        $date_time = strtotime($latest_event->event_date);
                        $evn_date = date('d M, Y', $date_time);
                    ?>
                    
                    <div class="col-xl-4 col-sm-6">
                        <div class="blog-box mb-4 mb-xl-0">
                            <div class="position-relative">
                                
                                <a class="image-popup-vertical-fit" href="{{ asset('assets/uploads/events/'.$latest_event->event_photo) }}" title="{{ $latest_event->event_photo }}">
                                    <img src="{{ asset('assets/uploads/events/'.$latest_event->event_photo) }}" alt="" class="rounded img-fluid mx-auto d-block">
                                </a>
                                
                                <div class="badge bg-success blog-badge font-size-11">{{ $latest_event->event_tag }}</div>
                            </div>

                            <div class="mt-4 text-muted">
                                <p class="mb-2"><i class="bx bx-calendar me-1"></i> {{ $evn_date }} </p>
                                <h5 class="mb-3">{{ str_limit($latest_event->event_name, 37) }}</h5>
                                <p>{{ str_limit($latest_event->event_details, 90) }}</p>
                            </div>

                            <button class="btn btn-dark btn-sm" id="getEvent" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-url="{{ route('get.single.event', $latest_event->id) }}">View Details <i class="bx bxs-right-arrow" style="position: relative; top: 1px;"></i></button>

                        </div>
                    </div>

                @endforeach

            </div>

            <div class="row">
                <div class="col-md-12" style="text-align: center; margin-top: 50px;">
                    <a href="{{ route('all.events') }}" class="btn btn-outline-info waves-effect waves-light"> All Events <i class="bx bx-right-arrow-circle font-size-20 align-middle me-1"></i></a>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>


    <section class="section" id="team">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mb-5">
                        <div class="small-title">Offers</div>
                        <h4>Recent Top Deals</h4>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="col-lg-12">
                <div class="owl-carousel owl-theme" id="team-carousel" dir="ltr">
                    @foreach($latest_deals as $latest_deal)

                    <?php
                        $date_time = strtotime($latest_deal->created_at);
                        $deal_date = date('d M, Y', $date_time);
                    ?>
                        <div class="item">
                            <div class="card text-center team-box">
                                <div class="card-body">
                                    <div>
                                        <div class="zoom-gallery flex-wrap">
                                            <a href="{{ asset('assets/uploads/deals/'.$latest_deal->deal_photo) }}" title="{{ $latest_deal->deal_photo }}">
                                                <img src="{{ asset('assets/uploads/deals/'.$latest_deal->deal_photo) }}" style="height: 300px !important;" alt="" class="rounded">
                                            </a>
                                        </div>
                                    </div>

                                    <div class="mt-3">
                                        <h5>{{ str_limit($latest_deal->deal_name, 20) }}</h5>
                                        <P class="text-muted mb-0">${{ $latest_deal->deal_price }}</P>
                                    </div>

                                    <button class="btn btn-light btn-sm mt-3" id="getDeal" data-bs-toggle="modal" data-bs-target="#staticBackdropD" data-url="{{ route('get.single.deal', $latest_deal->id) }}">View Deal <i class="bx bxs-right-arrow" style="position: relative; top: 1px;"></i></button>
                                </div>
                                
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>

            <div class="row">
                <div class="col-md-12" style="text-align: center; margin-top: 35px;">
                    <a href="{{ route('all.deals') }}" class="btn btn-outline-info waves-effect waves-light"> See All Deals <i class="bx bx-right-arrow-circle font-size-20 align-middle me-1"></i></a>
                </div>
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

    <script type="text/javascript">
        
        $('.zip').bind('focusout', function () {
            
            var zip = $(".zip").val();
            if(zip.length == 5) {
                $.ajax({
                    url: "http://api.zippopotam.us/us/" + zip,
                    cache: false,
                    dataType: "json",
                    type: "GET",
                  success: function(result, success) { 
                        $('.zipcode').css('display', 'none');                   
                        places = result['places'][0];
                        $(".city").val(places['place name']);
                        $('.state').append('<option value='+places['state']+' selected>'+places['state']+'</option>')
                        //$(".state").prop("disabled", true);
                    },
                    error: function(result, success) {
                        $('.zipcode').css('display', 'block');
                        var val = $(".state option:selected").last().val();
                        $('.state option[value='+val+']').remove();
                        //$(".state").prop("disabled", false);
                        $(".city").val('');
                    }
                });
            } else {
                $('.zipcode').css('display', 'block');  
                var val = $(".state option:selected").last().val();
                $('.state option[value='+val+']').remove();
                $(".state").prop("disabled", false);
                $(".city").val('');
            }
        });

    </script>
@endsection