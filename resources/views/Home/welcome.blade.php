@extends('Home.layout.master')

@section('content')
    {{-- <div class="container"> --}}
        <div class="main-content">
            <!-- Home section start  -->
            <section class="home active section " id="home">
                <div class="container">
                    <div class="row">
                        <div class="home-info padd-15">
                            <h3 class="hello">Hello, my name is <span class="name">Ankit Rathore</span></h3>
                            <h3 class="my-profession">I'm a <span class="typing">Web Developer</span></h3>
                            <p>I'm a Web Developer with extensive experience for over 2 years. My expertise is
                                Frontend & Backend, Graphic Design and many more....
                            </p>
                            <a href="{{ route('contact')}}" class="btn hire-me">Hire Me</a>
                            <a href="#" download="#" target="_blank"
                                class="btn hire-me">Download CV</a>
                        </div>
                        <div class="home-img padd-15">
                            <img src="{{ asset('images/image.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
            </section>
        </div>
    {{-- </div> --}}
@endsection
