@extends('layouts.site')
@section('content')

<style>
/* Banner Section */
.banner {
    position: relative;
    background: url('{{ asset("images/about.jpg") }}') no-repeat center center / cover;
    background-size: cover;
    height: 80vh;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    text-align: center;
}

/* Overlay Effect */
.banner::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
}

.banner-content {
    position: relative;
    z-index: 2;
    max-width: 700px;
}

.banner h1 {
    font-size: 3rem;
    font-weight: bold;
}

.banner p {
    font-size: 1.2rem;
    margin: 10px 0 20px;
}

.btn-banner {
    padding: 12px 30px;
    font-size: 1.1rem;
    border-radius: 30px;
    background-color: #007bff;
    border: none;
    color: white;
    transition: 0.3s ease;
}

.btn-banner:hover {
    background-color: #0056b3;
}

/* Responsive Adjustments */
@media (max-width: 768px) {

    .banner {
        height: 60vh;
    }

    .banner h1 {
        font-size: 2rem;
    }

    .banner p {
        font-size: 1rem;
    }

    .btn-banner {
        padding: 10px 20px;
        font-size: 1rem;
    }
}
</style>



<!-- Banner Section -->
<section class="banner">
    <div class="banner-content">
        <h1>About Us</h1>
        <p>Join our top-rated courses and master cyber security skills with real-world projects.</p>
        <a href="#" class="btn btn-banner" data-bs-toggle="modal" data-bs-target="#exampleModal">Get Started</a>
    </div>
</section>

<div class="how-it-work">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <!-- How It Work Content Start -->
                <div class="how-it-work-content">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">Why Join Us
                        </h3>
                        <h2 class="wow fadeInUp" data-wow-delay="0.2s" data-cursor="-opaque"
                            style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;"> <span>Why
                                Join Us
                            </span></h2>
                    </div>
                    <!-- Section Title End -->

                    <!-- How Work List Start -->
                    <div class="work-step-list">
                        <!-- How Work Item Start -->
                        <div class="work-step-item wow fadeInUp" data-wow-delay="0.4s"
                            style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                            <div class="work-step-no">
                                <h3>01</h3>
                            </div>
                            <div class="work-step-content">
                                <h3>Interview &amp; Preparation</h3>
                                <p>Securium Academy prepares you for job interviews through specialized training in
                                    cybersecurity, ethical hacking, and technical skills. Boost your career with us</p>
                            </div>
                        </div>
                        <!-- How Work Item End -->

                        <!-- How Work Item Start -->
                        <div class="work-step-item wow fadeInUp" data-wow-delay="0.6s"
                            style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">
                            <div class="work-step-no">
                                <h3>02</h3>
                            </div>
                            <div class="work-step-content">
                                <h3>Live classes every month</h3>
                                <p>Securium Academy offers live online cybersecurity courses taught by industry experts
                                    covering topics such as ethical hacking, digital forensics, and incident response.
                                    Join now for hands-on training.</p>
                            </div>
                        </div>
                        <!-- How Work Item End -->

                        <!-- How Work Item Start -->
                        <div class="work-step-item wow fadeInUp" data-wow-delay="0.8s"
                            style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInUp;">
                            <div class="work-step-no">
                                <h3>03</h3>
                            </div>
                            <div class="work-step-content">
                                <h3>Expert &amp; Teachers</h3>
                                <p>Securium Academy's expert teachers are highly skilled and experienced in the fields
                                    of cybersecurity and ethical hacking, offering practical and relevant knowledge to
                                    students.</p>
                            </div>
                        </div>
                        <div class="work-step-item wow fadeInUp" data-wow-delay="0.8s"
                            style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInUp;">
                            <div class="work-step-no">
                                <h3>04</h3>
                            </div>
                            <div class="work-step-content">
                                <h3>
                                    24*7 Hours &amp; Learning Facility</h3>
                                <p>Securium Academy offers round-the-clock learning opportunities for cybersecurity
                                    professionals with a wide range of courses, accessible online at any time, from
                                    anywhere in the world.</p>
                            </div>
                        </div>
                        <!-- How Work Item End -->
                    </div>
                    <!-- How Work List End -->
                </div>
                <!-- How It Work Content End -->
            </div>

            <div class="col-lg-6">
                <!-- How It Work Image Start -->
                <iframe width="560" height="315" src="https://www.youtube.com/embed/Cf5TkiI1Tq0?si=bMmrFB2pAjB4-06y"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                <!-- How It Work Image End -->
            </div>
        </div>
    </div>
</div>


<div class="why-choose-us">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <!-- Why Choose Image Start -->
                <div class="why-choose-image">
                    <figure class="image-anime reveal"
                        style="transform: translate(0px, 0px); opacity: 1; visibility: inherit;">
                        <img src="{{ asset('images/why-choose-image.jpg') }}" alt="" style="transform: translate(0px, 0px);">
                    </figure>
                </div>
                <!-- Why Choose Image End -->
            </div>

            <div class="col-lg-6">
                <!-- Why Choose Content Start -->
                <div class="why-choose-content">
                    <!-- Section Title Start -->
                    <div class="section-title dark-section">
                        <h3 class="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">why choose us
                        </h3>
                        <h2 class="wow fadeInUp" data-wow-delay="0.2s" data-cursor="-opaque"
                            style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">Reliable
                            solutions for cybersecurity excellence</h2>
                    </div>
                    <!-- Section Title End -->

                    <!-- Why Choose List Start -->
                    <div class="why-choose-list">
                        <!-- Why Choose Item Start -->
                        <div class="why-choose-item wow fadeInUp" data-wow-delay="0.4s"
                            style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                            <div class="icon-box">
                                <img src="images/icon-why-choose-1.svg" alt="">
                            </div>
                            <div class="why-choose-item-content">
                                <h3>expertise and experience</h3>
                                <p>A team of seasoned cybersecurity professionals with extensive industry knowledge.</p>
                            </div>
                        </div>
                        <!-- Why Choose Item End -->

                        <!-- Why Choose Item Start -->
                        <div class="why-choose-item wow fadeInUp" data-wow-delay="0.6s"
                            style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">
                            <div class="icon-box">
                                <img src="images/icon-why-choose-2.svg" alt="">
                            </div>
                            <div class="why-choose-item-content">
                                <h3>proactive security approach</h3>
                                <p>Focused on preventing threats before they impact your system, not just reacting after
                                    the fact.</p>
                            </div>
                        </div>
                        <!-- Why Choose Item End -->

                        <!-- Why Choose Item Start -->
                        <div class="why-choose-item wow fadeInUp" data-wow-delay="0.8s"
                            style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInUp;">
                            <div class="icon-box">
                                <img src="images/icon-why-choose-3.svg" alt="">
                            </div>
                            <div class="why-choose-item-content">
                                <h3>tailored training programs</h3>
                                <p>Educating your team on security best practices to reduce human error and enhance
                                    vigilance.</p>
                            </div>
                        </div>
                        <!-- Why Choose Item End -->
                    </div>
                    <!-- Why Choose List End -->
                </div>
                <!-- Why Choose Content End -->
            </div>

            <div class="col-lg-12">
                <!-- Why Choose Counter List Start -->
                <div class="why-choose-counter-list">
                    <!-- Why Choose Counter Item Start -->
                    <div class="why-choose-counter-item">
                        <div class="icon-box">
                            <img src="./assets/images/presentation.png" alt="">
                        </div>
                        <div class="why-choose-counter-content">
                            <h3><span class="counter">50</span>+</h3>
                            <p>PROFESSIONALS TRAINED</p>
                        </div>
                    </div>
                    <!-- Why Choose Counter Item End -->

                    <!-- Why Choose Counter Item Start -->
                    <div class="why-choose-counter-item">
                        <div class="icon-box">
                            <img src="./assets/images/teacher.png" alt="">
                        </div>
                        <div class="why-choose-counter-content">
                            <h3><span class="counter">10</span>+</h3>
                            <p>QUALIFIED TRAINERS</p>
                        </div>
                    </div>
                    <!-- Why Choose Counter Item End -->

                    <!-- Why Choose Counter Item Start -->
                    <div class="why-choose-counter-item">
                        <div class="icon-box">
                            <img src="./assets/images/online-course.png" alt="">
                        </div>
                        <div class="why-choose-counter-content">
                            <h3><span class="counter">50</span>+</h3>
                            <p>COURSES</p>
                        </div>
                    </div>
                    <!-- Why Choose Counter Item End -->

                    <!-- Why Choose Counter Item Start -->
                    <div class="why-choose-counter-item">
                        <div class="icon-box">
                            <img src="./assets/images/diploma.png" alt="">
                        </div>
                        <div class="why-choose-counter-content">
                            <h3><span class="counter">20</span>+</h3>
                            <p>GLOBAL ACCREDITATIONS</p>
                        </div>
                    </div>
                    <!-- Why Choose Counter Item End -->
                </div>
                <!-- Why Choose Counter List End -->
            </div>
        </div>
    </div>
</div>

<section class="award-section">
    <h2>Awards & Recognitions</h2>

    <div class="swiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="{{ asset('images/award01.png') }}" alt="Award 1">

            </div>
            <div class="swiper-slide">
                <img src="{{ asset('images/iso-20000.png') }}" alt="Award 2">

            </div>
            <div class="swiper-slide">
                <img src="{{ asset('images/iso_27001.png') }}" alt="Award 3">

            </div>
            <div class="swiper-slide">
                <img src="{{ asset('images/up.png') }}" alt="Award 4">

            </div>
            <div class="swiper-slide">
                <img src="{{ asset('images/iso9001.png') }}" alt="Award 5">

            </div>

        </div>
        <!-- Pagination (dots) -->
        <div class="swiper-pagination"></div>
    </div>
</section>

<script>
var swiper = new Swiper(".swiper", {
    slidesPerView: 4, // ✅ Show 4 awards at a time
    spaceBetween: 30, // ✅ Adjust spacing between awards
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    loop: true,
    speed: 700, // Smooth transition speed
});
</script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css">
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLabel">Get Started</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="contactForm" action="mail.php" method="post" onsubmit="return validateForm(event)">
                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your full name"
                        required />
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email"
                        required />
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter your phone number"
                        required />
                </div>

                <div class="mb-3">
                    <label for="message" class="form-label">Your Message</label>
                    <textarea class="form-control" id="message" name="message" rows="5"
                        placeholder="Write your message here" required></textarea>
                </div>

                <!-- Loader Message -->
                <div id="loader" class="text-center text-primary mb-3" style="display: none;">
                    ⏳ Please wait, submitting...
                </div>

                <button type="submit" class="btn btn-primary w-100">Submit</button>
            </form>

            <script>
            function validateForm(event) {
                const name = document.getElementById("name").value.trim();
                const email = document.getElementById("email").value.trim();
                const phone = document.getElementById("phone").value.trim();
                const message = document.getElementById("message").value.trim();
                const loader = document.getElementById("loader");

                // Basic email regex
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                // Phone number regex (10 digits)
                const phoneRegex = /^[0-9]{10}$/;

                if (name === "" || email === "" || message === "") {
                    alert("Please fill in all required fields.");
                    return false;
                }

                if (!emailRegex.test(email)) {
                    alert("Please enter a valid email address.");
                    return false;
                }

                if (!phoneRegex.test(phone)) {
                    alert("Please enter a valid 10-digit phone number.");
                    return false;
                }

                // Show loader message
                loader.style.display = "block";

                // Allow the form to submit
                return true;
            }
            </script>


        </div>
    </div>
</div>

@endsection
