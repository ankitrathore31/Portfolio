@extends('Home.layout.master')
@section('content')
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card-img-container {
            width: 100%;
            padding-top: 100%;
            /* Makes the div square */
            position: relative;
            overflow: hidden;
        }

        .card-img-container img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .project-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .project-card {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.6s ease;
        }

        .project-card.animate {
            opacity: 1;
            transform: translateY(0);
        }

        .project-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            font-weight: 600;
        }
    </style>

    {{-- <div class="container"> --}}
    <div class="main-content">
        <!-- Home section start  -->
        <section class="home active section " id="home">
            <div class="container">
                <div class="row">
                    <div class="section-title padd-15">
                        <h2>Projects</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="project-heading padd-15">
                        <h4>My Latest Projects :</h4>
                    </div>
                </div>
                <div class="row mt-3 g-4">
                    @foreach ($project as $item)
                        <div class="col-sm-6 col-lg-4 rounded">
                            <a href="{{ route('show.project', $item->id) }}" class="text-decoration-none text-dark">
                                <div class="card project-card border-0 shadow-sm h-100">
                                    <div class="mb-4">
                                        @php
                                            // Use $item instead of $project
                                            $images = json_decode($item->images, true);
                                        @endphp
                                        @if ($images && count($images) > 0)
                                            <div id="projectCarousel{{ $item->id }}" class="carousel slide"
                                                data-bs-ride="carousel" data-bs-interval="2500"
                                                style="width:100%; height:350px; overflow:hidden;">
                                                <div class="carousel-inner">
                                                    @foreach ($images as $key => $image)
                                                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                                            <img src="{{ asset($image) }}" class="d-block w-100 rounded"
                                                                style="object-fit: contain; max-height:350px;"
                                                                alt="slide images">
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <button class="carousel-control-prev" type="button"
                                                    data-bs-target="#projectCarousel{{ $item->id }}"
                                                    data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon"></span>
                                                </button>
                                                <button class="carousel-control-next" type="button"
                                                    data-bs-target="#projectCarousel{{ $item->id }}"
                                                    data-bs-slide="next">
                                                    <span class="carousel-control-next-icon"></span>
                                                </button>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="card-body">
                                        <h5 class="card-title mb-2">Project Name: <b>{{ $item->name }}</b></h5>
                                        <p class="card-text mb-2">Highlight: {{ $item->keyword }}</p>
                                        <a href="{{ route('show.project', $item->id) }}" class="btn btn-info">More Info</a>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
    </div>
    {{-- </div> --}}
    <script>
        const cards = document.querySelectorAll(".project-card");

        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("animate");
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1
        });

        cards.forEach(card => observer.observe(card));
    </script>
    <!-- Bootstrap JS (before </body>) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection
