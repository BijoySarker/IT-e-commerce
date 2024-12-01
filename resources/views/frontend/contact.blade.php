@extends('frontend.main_master')
@section('main')
<main>
    <!-- Breadcrumb Area -->
    <section class="breadcrumb__wrap">
        <div class="container custom-container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8 col-md-10 text-center">
                    <div class="breadcrumb__wrap__content">
                        <h2 class="title">Contact Me</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Area End -->

    <!-- Contact Form Area -->
    <div class="contact-area py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <h3 class="text-center mb-4">Get in Touch</h3>
                    <form method="post" action="{{ route('store.message') }}" class="contact__form">
                        @csrf
                        <div class="row g-3">
                            <!-- Name Input -->
                            <div class="col-md-6">
                                <input name="name" type="text" class="form-control" placeholder="Enter Your Name*" aria-label="Name" required>
                            </div>
                            <!-- Email Input -->
                            <div class="col-md-6">
                                <input name="email" type="email" class="form-control" placeholder="Enter Your Email*" aria-label="Email" required>
                            </div>
                            <!-- Subject Input -->
                            <div class="col-md-6">
                                <input name="subject" type="text" class="form-control" placeholder="Enter Subject*" aria-label="Subject" required>
                            </div>
                            <!-- Phone Input -->
                            <div class="col-md-6">
                                <input name="phone" type="text" class="form-control" placeholder="Enter Your Phone*" aria-label="Phone" required>
                            </div>
                        </div>
                        <!-- Message Input -->
                        <div class="mt-3">
                            <textarea name="message" id="message" class="form-control" placeholder="Enter Your Message*" rows="5" aria-label="Message" required></textarea>
                        </div>
                        <!-- Submit Button -->
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary px-4 py-2">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Form Area End -->

    <!-- Contact Info Area -->
    <section class="contact-info-area py-5">
        <div class="container">
            <div class="row justify-content-center g-4">
                <!-- Address Info -->
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="contact__info">
                        <div class="contact__info__icon mb-3">
                            <img src="{{ asset('frontend/assets/img/icons/contact_icon01.png') }}" alt="Address Icon">
                        </div>
                        <div class="contact__info__content">
                            <h4 class="title">My Address</h4>
                            <p>Elephant Road<br>Dhaka 1205, Bangladesh</p>
                        </div>
                    </div>
                </div>
                <!-- Phone Info -->
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="contact__info">
                        <div class="contact__info__icon mb-3">
                            <img src="{{ asset('frontend/assets/img/icons/contact_icon02.png') }}" alt="Phone Icon">
                        </div>
                        <div class="contact__info__content">
                            <h4 class="title">Phone Number</h4>
                            <p>+8801314447426<br>+8801685741745</p>
                        </div>
                    </div>
                </div>
                <!-- Email Info -->
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="contact__info">
                        <div class="contact__info__icon mb-3">
                            <img src="{{ asset('frontend/assets/img/icons/contact_icon03.png') }}" alt="Email Icon">
                        </div>
                        <div class="contact__info__content">
                            <h4 class="title">Email Address</h4>
                            <p>bijoybp7538@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Info Area End -->
</main>
@endsection
