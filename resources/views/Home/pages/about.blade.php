@extends('Home.layout.master')

@section('content')
    {{-- <div class="container"> --}}
    <div class="main-content">
        <section class="about section " id="about">
            <div class="container">
                <div class="row">
                    <div class="section-title">
                        <h2>About Me</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="about-content padd-15">
                        <div class="row">
                            <div class="about-text">
                                <h3>I'm Ankit Rathore <span>Web Developer</span></h3>
                                <p>A passionate web developer dedicated to building fast, responsive, and
                                    user-friendly
                                    websites. With a strong background in frontend and backend development, I
                                    specialize
                                    in crafting seamless digital experiences that bring ideas to life. Whether it’s
                                    developing interactive user interfaces, optimizing website performance, or
                                    integrating complex backend systems, I thrive on turning challenges into
                                    innovative solutions.</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="personal-info padd-15">
                                <div class="row">
                                    <div class="info-item padd-15">
                                        <p>Birthday : <span>* * *</span></p>
                                    </div>
                                    <div class="info-item padd-15">
                                        <p>Profession : <span>Web development</span></p>
                                    </div>
                                    <div class="info-item padd-15">
                                        <p>Website : <span><a href="https://akkirathore.com/">https://akkirathore.com/</a></span></p>
                                    </div>
                                    <div class="info-item padd-15">
                                        <p>Email : <span>ankitrathore3110@gmail.com</span></p>
                                    </div>
                                    <div class="info-item padd-15">
                                        <p>Phone : <span>+91 63997 87403</span></p>
                                    </div>
                                    <div class="info-item padd-15">
                                        <p>Degere : <span>BCA</span></p>
                                    </div>
                                    <div class="info-item padd-15">
                                        <p>City : <span>Bareilly</span></p>
                                    </div>
                                    <div class="info-item padd-15">
                                        <p>Freelnace : <span>Available</span></p>
                                    </div>
                                    <div class="info-item padd-15">
                                        <p>Freelance:
                                            <a href="https://www.instagram.com/_.ankit.rathore/"
                                                target="_blank">
                                                <i class="fab fa-instagram"></i> Instagram
                                            </a> |
                                            <a href="https://www.linkedin.com"
                                                target="_blank">
                                                <i class="fab fa-linkedin"></i> LinkedIn
                                            </a>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="buttons">
                                        <a href="#" download="" target="_blank"
                                            class="btn hire-me">Download CV</a>
                                        <a href="{{ route('contact')}}" class="btn hire me">Hire Me</a>
                                    </div>
                                </div>
                            </div>

                            <div class="skills padd-15">
                                <div class="row">
                                     <div class="skill-item padd-15">
                                        <h5>Html</h5>
                                        <div class="progress">
                                            <div class="progress-in" style="width: 92%;"></div>
                                            <div class="skill-percent">92%</div>
                                        </div>
                                    </div>
                                    <div class="skill-item padd-15">
                                        <h5>CSS & Bootstrap</h5>
                                        <div class="progress">
                                            <div class="progress-in" style="width: 86%;"></div>
                                            <div class="skill-percent">86%</div>
                                        </div>
                                    </div>
                                    <div class="skill-item padd-15">
                                        <h5>JS & J-Query</h5>
                                        <div class="progress">
                                            <div class="progress-in" style="width: 76%;"></div>
                                            <div class="skill-percent">76%</div>
                                        </div>
                                    </div>
                                    <div class="skill-item padd-15">
                                        <h5>PHP</h5>
                                        <div class="progress">
                                            <div class="progress-in" style="width: 78%;"></div>
                                            <div class="skill-percent">78%</div>
                                        </div>
                                    </div>
                                    <div class="skill-item padd-15">
                                        <h5>Laravel Framework</h5>
                                        <div class="progress">
                                            <div class="progress-in" style="width: 88%;"></div>
                                            <div class="skill-percent">88%</div>
                                        </div>
                                    </div>
                                    <div class="skill-item padd-15">
                                        <h5>My Sql</h5>
                                        <div class="progress">
                                            <div class="progress-in" style="width: 56%;"></div>
                                            <div class="skill-percent">56%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    {{-- </div> --}}
@endsection
