@extends('Home.layout.master')

@section('content')
    {{-- <div class="container"> --}}
    <div class="main-content">
        <!-- ========================== Contact section start ================== -->
        <section class="contact section" id="contact">
            <div class="container">
                <div class="row">
                    <div class="section-title padd-15">
                        <h2>Contact Me</h2>
                    </div>
                </div>
                <h3 class="contact-title padd-15">Have You Any Questions ?</h3>
                <h4 class="contact-sub-title padd-15">I'M AT YOUR SERVICES</h4>
                <div class="row">
                    <!-- contact info item start  -->
                    <div class="contact-info-item padd-15">
                        <div class="icon"><i class="fa fa-phone"></i></div>
                        <h4>Call Us On</h4>
                        <a href="Tel:9258160499">+91 92581 60499</a>
                    </div>
                    <!-- contact info item end  -->
                    <!-- contact info item start  -->
                    <div class="contact-info-item padd-15">
                        <div class="icon"><i class="fa fa-map-marker-alt"></i></div>
                        <h4>Office</h4>
                        <a href="https://maps.app.goo.gl/8WaPxbKXuoWmecuS8" target="_blank">Bareilly</a>
                    </div>
                    <!-- contact info item end  -->
                    <!-- contact info item start  -->
                    <div class="contact-info-item padd-15">
                        <div class="icon"><i class="fa fa-envelope"></i></div>
                        <h4>Email</h4>
                        <a href="Mailto:rathoredarshika740@gmail.com">rathoredarshika740@gmail.com</a>
                    </div>
                    <!-- contact info item end  -->
                    <!-- contact info item start  -->
                    <div class="contact-info-item padd-15">
                        <div class="icon"><i class="fa fa-globe-europe"></i></div>
                        <h4>Website</h4>
                        <a href="">www.-----.com</a>
                    </div>
                    <!-- contact info item end  -->
                </div>
                <h3 class="contact-title padd-15">SEND ME AN EMAIL ?</h3>
                <h4 class="contact-sub-title padd-15">I'M VERY RESPONSIVE TO MESSAGE</h4>
                <!-- ===== CONTACT FORM === -->
                <div class="row">
                    <div class="contact-form padd-15">
                        <form action="mailto:ankit@gmail.com" >
                            <div class="row">
                                <div class="form-item col-6 padd-15">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Enter name">
                                    </div>
                                </div>
                                <div class="form-item col-6 padd-15">
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Enter email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-item col-12 padd-15">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Subject">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-item col-12 padd-15">
                                    <div class="form-group">
                                        <textarea name="" class="form-control" id="" cols="30" rows="10" placeholder="Message"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-item col-12 padd-15">
                                    <div class="form-group">
                                        <input type="submit" class="btn" value="Send Message">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    {{-- </div> --}}
@endsection
