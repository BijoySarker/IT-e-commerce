@extends('frontend.main_master')
@section('main')

<main>
    <!-- Breadcrumb Area -->
    <section class="breadcrumb__wrap">
        <div class="container custom-container">
            <div class="row justify-content-center">
                <div class="breadcrumb__wrap__content text-center">
                    <h2 class="title">My Skills</h2>
                    <p class="sub-title">Discover the expertise I bring to the table</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Skills Section -->
    <section class="skills-area py-5">
        <div class="container">
            <div class="row g-4">
                @foreach($skills as $skill)
                    <div class="col-lg-4 col-md-6">
                        <div class="skills__item shadow-lg rounded">
                            <div class="skills__icon mb-4">
                                <img src="{{ asset('storage/' . $skill->logo_path) }}" alt="{{ $skill->title }}" class="img-fluid">
                            </div>
                            <div class="skills__content text-center">
                                <h4>{{ $skill->title }}</h4>
                                <p>{{ $skill->description }}</p>
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
    .skills-area {
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

    /* Skills Item Styling */
    .skills__item {
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

    .skills__item:hover {
        transform: translateY(-10px);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
    }

    .skills__icon img {
        width: 100px;
        height: 100px;
        object-fit: contain;
        margin: 0 auto;
        transition: transform 0.3s ease;
    }

    .skills__icon img:hover {
        transform: scale(1.1);
    }

    .skills__content h4 {
        margin-top: 20px;
        font-size: 24px;
        font-weight: 600;
        color: #333;
    }

    .skills__content p {
        font-size: 16px;
        color: #666;
        margin-top: 12px;
        line-height: 1.6;
        font-weight: 400;
    }

    /* Hover Effect for Icon */
    .skills__icon:hover img {
        transform: scale(1.1);
    }

    /* Responsive Design */
    @media (max-width: 992px) {
        .skills__item {
            padding: 30px 20px;
        }

        .skills__icon img {
            width: 90px;
            height: 90px;
        }

        .skills__content h4 {
            font-size: 22px;
        }

        .skills__content p {
            font-size: 15px;
        }
    }

    @media (max-width: 768px) {
        .skills-area {
            padding: 60px 0;
        }

        .skills__item {
            padding: 25px 15px;
        }

        .skills__content h4 {
            font-size: 20px;
        }

        .skills__content p {
            font-size: 14px;
        }
    }
</style>

@endsection
