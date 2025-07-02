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
                                <h3>I'm Darshika Rathore <span>Web Developer</span></h3>
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
                                        <p>Birthday : <span>14 JUNE 2003</span></p>
                                    </div>
                                    <div class="info-item padd-15">
                                        <p>Profession : <span>Graphic Design</span></p>
                                    </div>
                                    <div class="info-item padd-15">
                                        <p>Website : <span>Portfolio.com</span></p>
                                    </div>
                                    <div class="info-item padd-15">
                                        <p>Email : <span>rathoredarshika740@gmail.com</span></p>
                                    </div>
                                    <div class="info-item padd-15">
                                        <p>Phone : <span>+91 92581 60499</span></p>
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
                                            <a href="https://www.instagram.com/darshika__rathore_810?igsh=eXYycjcxMHJ0enpo"
                                                target="_blank">
                                                <i class="fab fa-instagram"></i> Instagram
                                            </a> |
                                            <a href="https://www.linkedin.com/in/darshika-rathore-a5b86a292?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app"
                                                target="_blank">
                                                <i class="fab fa-linkedin"></i> LinkedIn
                                            </a>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="buttons">
                                        <a href="../images/cv.pdf" download="../images/cv.pdf" target="_blank"
                                            class="btn hire-me">Download CV</a>
                                        <a href="#contact" class="btn hire me">Hire Me</a>
                                    </div>
                                </div>
                            </div>

                            <div class="skills padd-15">
                                <div class="row">
                                    <div class="skill-item padd-15">
                                        <h5>CSS & Bootstrap</h5>
                                        <div class="progress">
                                            <div class="progress-in" style="width: 86%;"></div>
                                            <div class="skill-percent">86%</div>
                                        </div>
                                    </div>
                                    <div class="skill-item padd-15">
                                        <h5>JS</h5>
                                        <div class="progress">
                                            <div class="progress-in" style="width: 76%;"></div>
                                            <div class="skill-percent">76%</div>
                                        </div>
                                    </div>
                                    <div class="skill-item padd-15">
                                        <h5>PHP</h5>
                                        <div class="progress">
                                            <div class="progress-in" style="width: 88%;"></div>
                                            <div class="skill-percent">88%</div>
                                        </div>
                                    </div>
                                    <div class="skill-item padd-15">
                                        <h5>Node JS</h5>
                                        <div class="progress">
                                            <div class="progress-in" style="width: 56%;"></div>
                                            <div class="skill-percent">56%</div>
                                        </div>
                                    </div>
                                    <div class="skill-item padd-15">
                                        <h5>React</h5>
                                        <div class="progress">
                                            <div class="progress-in" style="width: 55%;"></div>
                                            <div class="skill-percent">55%</div>
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
