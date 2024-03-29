@extends('layouts.frontend-master')

@section('title', 'Privacy & Policy')

@section('content')
        
    <section class="section" id="faqs" style="margin-top: 50px !important;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mb-5">
                        <div class="small-title">Website Privacy</div>
                        <h4>Privacy & Policy</h4>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="vertical-nav">
                        <div class="row">
                            <div class="col-lg-2 col-sm-4">
                                <div class="nav flex-column nav-pills" role="tablist">
                                    <a class="nav-link active" id="v-pills-gen-ques-tab" data-bs-toggle="pill" href="#v-pills-gen-ques" role="tab">
                                        <i class= "bx bx-help-circle nav-icon d-block mb-2"></i>
                                        <p class="font-weight-bold mb-0">General Questions</p>
                                    </a>
                                    <a class="nav-link" id="v-pills-token-sale-tab" data-bs-toggle="pill" href="#v-pills-token-sale" role="tab"> 
                                        <i class= "bx bx-receipt nav-icon d-block mb-2"></i>
                                        <p class="font-weight-bold mb-0">Privacy</p>
                                    </a>
                                    <a class="nav-link" id="v-pills-roadmap-tab" data-bs-toggle="pill" href="#v-pills-roadmap" role="tab">
                                        <i class= "bx bx-timer d-block nav-icon mb-2"></i>
                                        <p class="font-weight-bold mb-0">Policy</p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-10 col-sm-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="v-pills-gen-ques" role="tabpanel">
                                                <h4 class="card-title mb-4">General Questions</h4>
                                                
                                                <div>
                                                    <div id="gen-ques-accordion" class="accordion custom-accordion">
                                                        <div class="mb-3">
                                                            <a href="#general-collapseOne" class="accordion-list" data-bs-toggle="collapse"
                                                                                            aria-expanded="true"
                                                                                            aria-controls="general-collapseOne">
                                                                
                                                                <div>What is Lorem Ipsum ?</div>
                                                                <i class="mdi mdi-minus accor-plus-icon"></i>
                                                                
                                                            </a>
                                    
                                                            <div id="general-collapseOne" class="collapse show" data-bs-parent="#gen-ques-accordion">
                                                                <div class="card-body">
                                                                    <p class="mb-0">Everyone realizes why a new common language would be desirable: one could refuse to pay expensive translators. To achieve this, it would be necessary to have uniform grammar, pronunciation and more common words.</p>
                                                                </div>
                                                            </div>
                                                        </div>
        
                                                        <div class="mb-3">
                                                            <a href="#general-collapseTwo" class="accordion-list collapsed" data-bs-toggle="collapse"
                                                                            aria-expanded="false"
                                                                            aria-controls="general-collapseTwo">
                                                                <div>Why do we use it ?</div>
                                                                <i class="mdi mdi-minus accor-plus-icon"></i>
                                                            </a>
                                                            <div id="general-collapseTwo" class="collapse" data-bs-parent="#gen-ques-accordion">
                                                                <div class="card-body">
                                                                    <p class="mb-0">If several languages coalesce, the grammar of the resulting language is more simple and regular than that of the individual languages. The new common language will be more simple and regular than the existing European languages.</p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <a href="#general-collapseThree" class="accordion-list collapsed" data-bs-toggle="collapse"
                                                                            aria-expanded="false"
                                                                            aria-controls="general-collapseThree">
                                                                <div>Where does it come from ?</div>
                                                                <i class="mdi mdi-minus accor-plus-icon"></i>
                                                            </a>
                                                            <div id="general-collapseThree" class="collapse" data-bs-parent="#gen-ques-accordion">
                                                                <div class="card-body">
                                                                    <p class="mb-0">It will be as simple as Occidental; in fact, it will be Occidental. To an English person, it will seem like simplified English, as a skeptical Cambridge friend of mine told me what Occidental.</p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div>
                                                            <a href="#general-collapseFour" class="accordion-list collapsed" data-bs-toggle="collapse"
                                                                            aria-expanded="false"
                                                                            aria-controls="general-collapseFour">
                                                                <div>Where can I get some ?</div>
                                                                <i class="mdi mdi-minus accor-plus-icon"></i>
                                                            </a>
                                                            <div id="general-collapseFour" class="collapse" data-bs-parent="#gen-ques-accordion">
                                                                <div class="card-body">
                                                                    <p class="mb-0">To an English person, it will seem like simplified English, as a skeptical Cambridge friend of mine told me what Occidental is. The European languages are members of the same family. Their separate existence is a myth.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="v-pills-token-sale" role="tabpanel">
                                                <h4 class="card-title mb-4">Privacy</h4>
                                                    
                                                <div>
                                                    <div id="token-accordion" class="accordion custom-accordion">
                                                        <div class="mb-3">
                                                            <a href="#token-collapseOne" class="accordion-list collapsed" data-bs-toggle="collapse"
                                                                            aria-expanded="false"
                                                                            aria-controls="token-collapseOne">
                                                                <div>Why do we use it ?</div>
                                                                <i class="mdi mdi-minus accor-plus-icon"></i>
                                                            </a>
                                                            <div id="token-collapseOne" class="collapse" data-bs-parent="#token-accordion">
                                                                <div class="card-body">
                                                                    <p class="mb-0">If several languages coalesce, the grammar of the resulting language is more simple and regular than that of the individual languages. The new common language will be more simple and regular than the existing European languages.</p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <a href="#token-collapseTwo" class="accordion-list" data-bs-toggle="collapse"
                                                                                            aria-expanded="true"
                                                                                            aria-controls="token-collapseTwo">
                                                                
                                                                <div>What is Lorem Ipsum ?</div>
                                                                <i class="mdi mdi-minus accor-plus-icon"></i>
                                                                
                                                            </a>
                                    
                                                            <div id="token-collapseTwo" class="collapse show" data-bs-parent="#token-accordion">
                                                                <div class="card-body">
                                                                    <p class="mb-0">Everyone realizes why a new common language would be desirable: one could refuse to pay expensive translators. To achieve this, it would be necessary to have uniform grammar, pronunciation and more common words.</p>
                                                                </div>
                                                            </div>
                                                        </div>
        
                                                        <div class="mb-3">
                                                            <a href="#token-collapseThree" class="accordion-list collapsed" data-bs-toggle="collapse"
                                                                            aria-expanded="false"
                                                                            aria-controls="token-collapseThree">
                                                                <div>Where can I get some ?</div>
                                                                <i class="mdi mdi-minus accor-plus-icon"></i>
                                                            </a>
                                                            <div id="token-collapseThree" class="collapse" data-bs-parent="#token-accordion">
                                                                <div class="card-body">
                                                                    <p class="mb-0">To an English person, it will seem like simplified English, as a skeptical Cambridge friend of mine told me what Occidental is. The European languages are members of the same family. Their separate existence is a myth.</p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div>
                                                            <a href="#token-collapseFour" class="accordion-list collapsed" data-bs-toggle="collapse"
                                                                            aria-expanded="false"
                                                                            aria-controls="token-collapseFour">
                                                                <div>Where does it come from ?</div>
                                                                <i class="mdi mdi-minus accor-plus-icon"></i>
                                                            </a>
                                                            <div id="token-collapseFour" class="collapse" data-bs-parent="#token-accordion">
                                                                <div class="card-body">
                                                                    <p class="mb-0">It will be as simple as Occidental; in fact, it will be Occidental. To an English person, it will seem like simplified English, as a skeptical Cambridge friend of mine told me what Occidental.</p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="v-pills-roadmap" role="tabpanel">
                                                <h4 class="card-title mb-4">Policy</h4>
                                                    
                                                <div>
                                                    <div id="roadmap-accordion" class="accordion custom-accordion">

                                                        <div class="mb-3">
                                                            <a href="#roadmap-collapseOne" class="accordion-list" data-bs-toggle="collapse"
                                                                                            aria-expanded="true"
                                                                                            aria-controls="roadmap-collapseOne">
                                                                


                                                                <div>Where can I get some ?</div>
                                                                <i class="mdi mdi-minus accor-plus-icon"></i>
                                                                
                                                            </a>
                                    
                                                            <div id="roadmap-collapseOne" class="collapse show" data-bs-parent="#roadmap-accordion">
                                                                <div class="card-body">
                                                                    <p class="mb-0">Everyone realizes why a new common language would be desirable: one could refuse to pay expensive translators. To achieve this, it would be necessary to have uniform grammar, pronunciation and more common words.</p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <a href="#roadmap-collapseTwo" class="accordion-list collapsed" data-bs-toggle="collapse"
                                                                            aria-expanded="false"
                                                                            aria-controls="roadmap-collapseTwo">
                                                                <div>What is Lorem Ipsum ?</div>
                                                                <i class="mdi mdi-minus accor-plus-icon"></i>
                                                            </a>
                                                            <div id="roadmap-collapseTwo" class="collapse" data-bs-parent="#roadmap-accordion">
                                                                <div class="card-body">
                                                                    <p class="mb-0">If several languages coalesce, the grammar of the resulting language is more simple and regular than that of the individual languages. The new common language will be more simple and regular than the existing European languages.</p>
                                                                </div>
                                                            </div>
                                                        </div>


        
                                                        <div class="mb-3">
                                                            <a href="#roadmap-collapseThree" class="accordion-list collapsed" data-bs-toggle="collapse"
                                                                            aria-expanded="false"
                                                                            aria-controls="roadmap-collapseThree">
                                                                <div>Why do we use it ?</div>
                                                                <i class="mdi mdi-minus accor-plus-icon"></i>
                                                            </a>
                                                            <div id="roadmap-collapseThree" class="collapse" data-bs-parent="#roadmap-accordion">
                                                                <div class="card-body">
                                                                    <p class="mb-0">To an English person, it will seem like simplified English, as a skeptical Cambridge friend of mine told me what Occidental is. The European languages are members of the same family. Their separate existence is a myth.</p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div>
                                                            <a href="#roadmap-collapseFour" class="accordion-list collapsed" data-bs-toggle="collapse"
                                                                            aria-expanded="false"
                                                                            aria-controls="roadmap-collapseFour">
                                                                <div>Where does it come from ?</div>
                                                                <i class="mdi mdi-minus accor-plus-icon"></i>
                                                            </a>
                                                            <div id="roadmap-collapseFour" class="collapse" data-bs-parent="#roadmap-accordion">
                                                                <div class="card-body">
                                                                    <p class="mb-0">It will be as simple as Occidental; in fact, it will be Occidental. To an English person, it will seem like simplified English, as a skeptical Cambridge friend of mine told me what Occidental.</p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end vertical nav -->
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
        
@endsection