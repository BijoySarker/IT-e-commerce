<style>
    .projects {
        padding: 60px 0;
        background-color: #f9f9f9;
    }

    .section__title .sub-title {
        font-size: 18px;
        color: #007bff;
        text-transform: uppercase;
        margin-bottom: 10px;
    }

    .section__title .title {
        font-size: 36px;
        font-weight: 700;
        margin-bottom: 20px;
    }

    .section__title .description {
        font-size: 18px;
        color: #555;
    }

    .projects__nav .nav-link {
        font-size: 16px;
        font-weight: 500;
        color: #333;
        border-radius: 5px;
    }

    .projects__nav .nav-link.active {
        color: #fff;
        background-color: #007bff;
        border-radius: 5px;
    }

    .projects__content .tab-pane {
        display: block;
    }

    .projects__content .tab-pane .row {
        margin-top: 30px;
    }

    .project__item {
        background: #fff;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 20px;
        text-align: center;
        margin-bottom: 30px;
        transition: transform 0.3s ease-in-out;
    }

    .project__item:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .project__item img {
        border-radius: 8px;
        margin-bottom: 15px;
        width: 100%; /* Make sure the image takes up the full width of its container */
        height: 250px; /* Fixed height to ensure uniformity */
        object-fit: contain; /* Ensures the full image is shown without cropping */
    }


    .project__item .title {
        font-size: 20px;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .project__item p {
        font-size: 16px;
        color: #555;
        margin-bottom: 20px;
    }

    .project__item a.btn {
        margin-top: 10px;
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

    .project__item a.btn:hover {
        background-color: #0056b3;
    }

    .project__item a.btn i {
        margin-right: 5px;
    }
</style>

<!-- Section Start -->
<section class="projects">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8">
                <div class="section__title text-center">
                    <span class="sub-title">Projects</span>
                    <h2 class="title">Showcasing My Work</h2>
                    <p class="description">Explore some of the projects I have worked on, spanning diverse technologies and platforms.</p>
                </div>
            </div>
        </div>
        <div class="row">
            @php
                // Fetch all projects directly in the view
                $projects = App\Models\Project::all();
            @endphp

            @foreach ($projects as $project)
                <div class="col-md-4">
                    <div class="project__item">
                        <!-- Display project image -->
                        <img src="{{ asset($project->image) }}" alt="{{ $project->title }}" class="img-fluid">
                        <h4 class="title">{{ $project->title }}</h4>
                        <p>{{ $project->description }}</p>
                        <a href="{{ $project->link }}" target="_blank" class="btn btn-primary">
                            <i class="fas fa-external-link-alt"></i> View Project
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Section End -->

<!-- Include Font Awesome for the icon -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">



