@extends('Home.layout.master')

@section('content')
    {{-- <div class="container"> --}}
    <div class="main-content">
        <section class="certificate section" id="certificate">
            <div class="container">
                <div class="row">
                    <div class="section-title padd-15">
                        <h2>Certificates</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="certificate-heading padd-15">
                        <h2>My Latest Certificates :</h2>
                    </div>
                </div>
                <div class="row certificate-gallery">
                    <!-- Certificate items -->
                    <div class="certificate-item">
                        <div class="certificate-item-inner shadow-dark">
                            <div class="certificate-img">
                                <img src="../images/cert1.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="certificate-item">
                        <div class="certificate-item-inner shadow-dark">
                            <div class="certificate-img">
                                <img src="../images/cert3.jpeg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="certificate-item">
                        <div class="certificate-item-inner shadow-dark">
                            <div class="certificate-img">
                                <img src="../images/cert2.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    {{-- </div> --}}
@endsection
