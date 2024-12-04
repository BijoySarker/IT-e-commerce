@php
    $allfooter = App\Models\Footer::find(1);
@endphp
<style>
    .footer {
    background-color: #2c2c2c;
    color: #ffffff;
    padding: 50px 0;
}

.footer .fw-title h5 {
    font-size: 14px;
    color: #f0a500;
    text-transform: uppercase;
    margin-bottom: 10px;
}

.footer .fw-title h4 {
    font-size: 20px;
    color: #ffffff;
    margin-bottom: 20px;
}

.footer__widget__text p,
.footer__widget__address p,
.footer__widget__address .mail {
    font-size: 14px;
    line-height: 1.6;
    color: #bbbbbb;
}

.footer__widget__social ul {
    list-style: none;
    padding: 0;
    display: flex;
    gap: 15px;
    margin-top: 15px;
}

.footer__widget__social li a {
    color: #ffffff;
    font-size: 18px;
    transition: color 0.3s ease;
}

.footer__widget__social li a:hover {
    color: #f0a500;
}

.copyright__text p {
    font-size: 12px;
    color: #bbbbbb;
    margin-top: 20px;
}
</style>
<footer class="footer">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <!-- Contact Information -->
            <div class="col-lg-4 col-md-6">
                <div class="footer__widget">
                    <div class="fw-title">
                        <h5 class="sub-title text-uppercase">Contact Me</h5>
                        <h4 class="title">{{ $allfooter->number }}</h4>
                    </div>
                    <div class="footer__widget__text">
                        <p>{{ $allfooter->short_description }}</p>
                    </div>
                </div>
            </div>
            
            <!-- Address Section -->
            <div class="col-lg-3 col-md-6">
                <div class="footer__widget">
                    <div class="fw-title">
                        <h5 class="sub-title text-uppercase">My Address</h5>
                        <h4 class="title">Bangladesh</h4>
                    </div>
                    <div class="footer__widget__address">
                        <p>{{ $allfooter->adress }}</p>
                        <a href="mailto:{{ $allfooter->email }}" class="mail">{{ $allfooter->email }}</a>
                    </div>
                </div>
            </div>
            
            <!-- Social Media Links -->
            <div class="col-lg-3 col-md-6">
                <div class="footer__widget">
                    <div class="fw-title">
                        <h5 class="sub-title text-uppercase">Follow Me</h5>
                        <h4 class="title">Connect Socially</h4>
                    </div>
                    <div class="footer__widget__social">
                        <p>Stay connected through social platforms.</p>
                        <ul class="footer__social__list d-flex gap-2">
                            <li><a href="{{ $allfooter->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="{{ $allfooter->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-behance"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Copyright Section -->
        <div class="copyright__wrap mt-4">
            <div class="row">
                <div class="col-12">
                    <div class="copyright__text text-center">
                        <p>&copy; {{ now()->year }} {{ $allfooter->copyright }}. All Rights Reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
