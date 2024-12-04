<style>
    .skills__icon img {
        width: 80px; /* Consistent icon size */
        height: 80px;
        object-fit: contain;
        margin: 0 auto;
        display: block;
        transition: transform 0.3s ease-in-out; /* Adds a subtle hover effect */
    }

    .skills__icon img:hover {
        transform: scale(1.1); /* Slight zoom on hover */
    }

    .skills__item {
        text-align: center;
        margin-bottom: 40px; /* Increased space between skill items for a cleaner layout */
        padding: 20px; /* Padding for inner spacing */
        border-radius: 10px; /* Rounded corners for a modern look */
        transition: background-color 0.3s ease, box-shadow 0.3s ease; /* Smooth hover effects */
    }

    .skills__item:hover {
        background-color: #f7f7f7; /* Light gray background on hover */
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1); /* Soft shadow effect */
    }

    .skills__content h4 {
        margin-top: 15px;
        font-size: 22px; /* Larger font size for better readability */
        font-weight: 600;
        color: #333; /* Darker text for contrast */
        transition: color 0.3s ease;
    }

    .skills__content h4:hover {
        color: #007bff; /* Change color on hover */
    }

    .skills__content p {
        font-size: 16px; /* Slightly larger text for better readability */
        color: #666; /* Subtle color for descriptions */
        margin-top: 10px;
        line-height: 1.5;
    }

    .section__title .sub-title {
        font-size: 18px;
        font-weight: 400;
        color: #007bff; /* Blue color for sub-title */
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .section__title h2 {
        font-size: 36px;
        font-weight: 700;
        color: #333;
        margin-top: 10px;
    }

    /* Responsive design improvements */
    @media (max-width: 768px) {
        .skills__item {
            margin-bottom: 30px; /* Reduced margin on smaller screens */
        }

        .skills__content h4 {
            font-size: 20px; /* Slightly smaller font size on mobile */
        }

        .skills__content p {
            font-size: 14px; /* Adjust text size for mobile */
        }
    }
</style>

<section class="skills">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8">
                <div class="section__title text-center">
                    <span class="sub-title">Skills</span>
                    <h2 class="title">Technical Expertise</h2>
                </div>
            </div>
        </div>
        <div class="row skills__wrap">
            @php
                // Fetch all skills from the database
                $skills = App\Models\Skill::all(); 
            @endphp

            <!-- Loop through each skill -->
            @foreach ($skills as $skill)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="skills__item">
                        <div class="skills__icon">
                            <!-- Dynamically load the skill icon -->
                            <img src="{{ asset('storage/' . $skill->logo_path) }}" alt="{{ $skill->title }}">

                        </div>
                        <div class="skills__content">
                            <h4 class="title">{{ $skill->title }}</h4>
                            <p>{{ $skill->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>


