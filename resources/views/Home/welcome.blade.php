@extends('Home.layout.master')
@section('content')
    <style>
        .image-container {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin-left: 50px;
            overflow: hidden;
            display: none;
            /* Hidden by default */
        }

        .image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        @media (max-width: 767.65px) {

            .image-container {
                display: block !important;
            }
        }
    </style>
    {{-- <div class="container"> --}}
    <div class="main-content">
        <!-- Home section start  -->
        <section class="home active section " id="home">
            <div class="container">
                <div class="row">
                    <div class="image-container padd-15">
                        <img src="{{ asset('images/image.jpg') }}" alt="">
                    </div>
                </div>
                <div class="row">
                    <div class="home-info padd-15">
                        <h3 class="hello">Hello, my name is <span class="name">Ankit Rathore</span></h3>
                        <h3 class="my-profession">I'm a <span class="typing">Web Developer</span></h3>
                        <p>I'm a Web Developer with extensive experience for over 2 years. My expertise is
                            Frontend & Backend, Graphic Design and many more....
                        </p>
                        <p>- Want to build your own website or custom software? Let’s bring your idea to life — get in
                            touch!
                        </p>
                        <a href="{{ route('contact') }}" class="btn hire-me">Contact Me</a>
                    </div>
                    <div class="home-img padd-15">
                        <img src="{{ asset('images/image.jpg') }}" alt="">
                    </div>
                </div>
            </div>
        </section>
        <div class="about section " id="about">
            <div class="container">
                <div class="row">
                    <div class="about-content padd-15">
                        <div class="row">
                            <div class="about-text">
                                <div class="about-text">
                                    <h3><span  style="color: rgb(107, 153, 153);">Website & Software Developer</span></h3>
                                    <p>A results-driven developer focused on delivering high-quality websites and software
                                        solutions tailored to client needs. I specialize in creating scalable web platforms,
                                        custom software, and seamless digital tools that enhance business operations. From
                                        sleek user interfaces to robust backend systems, I help bring your vision to life
                                        with clean code, reliable functionality, and modern technologies.</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="personal-info padd-15">
                                <div class="row">
                                    <div class="info-item padd-15">
                                        <p>Freelnace : <span>Available</span></p>
                                    </div>
                                    <div class="info-item padd-15">
                                        <p>Website : <span><a
                                                    href="https://akkirathore.com/">https://akkirathore.com/</a></span></p>
                                    </div>
                                    <div class="info-item padd-15">
                                        <p>City : <span>Bareilly</span></p>
                                    </div>
                                    <div class="info-item padd-15">
                                        <p>Email : <span><a href="mailto:akkirathore3110@gmail.com" target="_blank"
                                                    rel="noopener noreferrer">akkirathore3110@gmail.com</a></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- </div> --}}
@endsection
