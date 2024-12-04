@extends('frontend.main_master')
@section('main')

<main>
    <!-- Breadcrumb Area -->
    <section class="breadcrumb__wrap">
        <div class="container custom-container">
            <div class="row justify-content-center">
                <div class="breadcrumb__wrap__content text-center">
                    <h2 class="title">My Projects</h2>
                    <p class="sub-title">Explore some of the exciting projects I have worked on</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Projects Section -->
    <section class="projects-area py-5">
        <div class="container">
            <div class="row g-4">
                @foreach($projects as $project)
                    <div class="col-lg-4 col-md-6">
                        <div class="project__item shadow-lg rounded">
                            <div class="project__image mb-4">
                                <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="img-fluid">
                            </div>
                            <div class="project__content text-center">
                                <h4>{{ $project->title }}</h4>
                                <p>{{ $project->description }}</p>
                                <a href="{{ $project->link }}" target="_blank" class="btn btn-primary">
                                    <i class="fas fa-external-link-alt"></i> View Project
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</main>

<style>
    /* General Section Styling */
    .projects-area {
        background-color: #f9f9f9;
        padding: 80px 0;
    }

    .section__title h2 {
        font-size: 42px;
        font-weight: 700;
        color: #2d2d2d;
        margin-bottom: 15px;
        text-transform: uppercase;
    }

    .section__title .sub-title {
        font-size: 18px;
        font-weight: 400;
        color: #5cb85c;
        letter-spacing: 1px;
        margin-top: 8px;
        text-transform: capitalize;
    }

    /* Projects Item Styling */
    .project__item {
        background: #fff;
        border-radius: 10px;
        padding: 35px 25px;
        text-align: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        min-height: 250px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .project__item:hover {
        transform: translateY(-10px);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
    }

    .project__image img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 8px;
        transition: transform 0.3s ease;
    }

    .project__image img:hover {
        transform: scale(1.1);
    }

    .project__content h4 {
        margin-top: 20px;
        font-size: 24px;
        font-weight: 600;
        color: #333;
    }

    .project__content p {
        font-size: 16px;
        color: #666;
        margin-top: 12px;
        line-height: 1.6;
        font-weight: 400;
    }

    .project__content .btn {
        margin-top: 20px;
        display: inline-flex;
        align-items: center;
        font-size: 16px;
        font-weight: 500;
        color: #fff;
        background-color: #007bff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }

    .project__content .btn:hover {
        background-color: #0056b3;
    }

    /* Hover Effect for Icon */
    .project__image:hover img {
        transform: scale(1.1);
    }

    /* Responsive Design */
    @media (max-width: 992px) {
        .project__item {
            padding: 30px 20px;
        }

        .project__image img {
            height: 180px;
        }

        .project__content h4 {
            font-size: 22px;
        }

        .project__content p {
            font-size: 15px;
        }
    }

    @media (max-width: 768px) {
        .projects-area {
            padding: 60px 0;
        }

        .project__item {
            padding: 25px 15px;
        }

        .project__content h4 {
            font-size: 20px;
        }

        .project__content p {
            font-size: 14px;
        }
    }
</style>

<!-- Include Font Awesome for the icon -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

@endsection
