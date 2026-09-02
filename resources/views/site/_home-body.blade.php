@php
  $blogs = \App\Models\Blog::with(['blogCategory', 'user'])->where('status', 'published')->orderBy('created_at', 'desc')->take(10)->get();
  $popularCourses = \App\Models\Course::with(['courseCategory', 'academy', 'university'])
    ->where('status', 'published')
    ->orderByRaw('is_featured DESC, created_at DESC')
    ->get();
 @endphp

<section class="venom-hero">
  <!-- Background Video -->
  <video class="hero-video" autoplay muted loop playsinline>
    <source src="{{ asset('videos/ban.webm') }}" type="video/mp4">
    Your browser does not support the video tag.
  </video>

  <div class="container hero-inner">
    <div class="hero-left">
      <h1 class="hero-title">
        Become the Cyber Warrior You Were Born to Be
      </h1>
      <p class="hero-subtitle">
        Empowering IT & Cybersecurity professionals to master real-world
        <br class="mobile-break">
        attacks, build
        <br class="mobile-break">
        offensive skills, and secure
        <br class="mobile-break">
        tomorrow’s digital world.
      </p>

      <!-- Buttons -->
      <div class="hero-buttons">
        <button class="btn enroll-btn" data-bs-toggle="modal" data-bs-target="#exampleModal"
          style="background:#40aab6; color:#fff;">Enroll Now</button>
        <a class="btn download-btn" href="{{ asset('assets/pdf/CEHv13-Brochure.pdf') }}" target="_blank"
          rel="noopener noreferrer" style="border-color:#fff; color:#fff;">Download Brochure</a>
      </div>
    </div>


  </div>
</section>


<style>
  .hero-subtitle br.mobile-break {
    display: none;
  }

  /* Mobile view */
  @media (max-width:768px) {
    .hero-subtitle br.mobile-break {
      display: block;
    }
  }

  /* ================= Hero Section ================= */
  .venom-hero {
    width: 100%;
    min-height: calc(100vh - 80px);
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    overflow: hidden;
    text-align: center;
    padding: 0 20px;
  }

  /* Background Video */
  .hero-video {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    z-index: 0;
  }

  /* Dark overlay */
  .venom-hero::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.7);
    z-index: 1;
  }

  /* Container above overlay */
  .hero-inner {
    position: relative;
    z-index: 2;
    max-width: 1200px;
    width: 100%;
  }

  /* Title & Subtitle */
  .hero-title {
    font-size: 3rem;
    font-weight: 900;
    line-height: 1.2;
    text-transform: uppercase;
    margin-bottom: 20px;
    color: #fff;
  }

  .hero-subtitle {
    font-size: 1.2rem;
    margin-bottom: 40px;
    color: #ccc;
  }

  /* Buttons */
  .hero-buttons {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
  }

  .btn {
    padding: 15px 40px;
    border-radius: 10px;
    font-size: 1rem;
    font-weight: bold;
    text-decoration: none;
    cursor: pointer;
    min-width: 180px;
    transition: all 0.3s ease;
    border: none;
  }

  /* Enroll Now */
  .enroll-btn {
    background: linear-gradient(90deg, #00fff0, #00c6ff);
    color: #001a1a;
  }

  .enroll-btn:hover {
    background: linear-gradient(90deg, #00c6ff, #00fff0);
    box-shadow: 0 0 20px #00fff0;
  }

  /* Download Brochure */
  .download-btn {
    background: rgba(255, 255, 255, 0.1);
    color: #fff;
    border: 2px solid #00c6ff;
  }

  .download-btn:hover {
    background: #00c6ff;
    color: #001a1a;
    box-shadow: 0 0 20px #00c6ff;
  }

  /* Header fix */
  header {
    position: relative;
    top: 0;
    width: 100%;
    z-index: 999;
  }

  /* Responsive */
  @media (max-width: 992px) {
    .hero-title {
      font-size: 2.2rem;
    }

    .hero-subtitle {
      font-size: 1rem;
    }

    .hero-buttons {
      flex-direction: column;
      gap: 15px;
    }

    .btn {
      min-width: 100%;
    }
  }

  .card-body.d-flex.flex-column {
    background: #000;
  }

  h5.card-title.mb-2.fw-semibold {
    color: #fff;
  }
</style>


<section class="about-futuristic">
  <div class="about-overlay"></div>

  <div class="container">
    <div class="about-inner">
      <div class="about-left">
        <h2>Empowering the <span>Future of Cyber Security</span></h2>
        <p class="intro">
          We are a team of cybersecurity professionals dedicated to securing the digital world.
          Our mission is to help individuals and organizations stay ahead of evolving cyber threats
          through advanced learning, real-time defense, and practical expertise.
        </p>

        <div class="about-stats">
          <div class="stat">
            <h3 class="count" data-target="10000">0</h3>
            <p>Students Trained</p>
          </div>
          <div class="stat">
            <h3 class="count" data-target="30">0</h3>
            <p>Expert Instructors</p>
          </div>
          <div class="stat">
            <h3 class="count" data-target="50">0</h3>
            <p>Countries Reached</p>
          </div>
        </div>


        <a href="#" class="cta-btn">Learn More About Us</a>
      </div>

      <div class="about-right">
        <div class="globe">
          <div class="globe-video">
            <video autoplay muted loop playsinline>
              <source src="{{ asset('videos/gen.webm') }}" type="video/mp4">
              Your browser does not support the video tag.
            </video>
          </div>
          <div class="lines"></div>
        </div>
      </div>
    </div>

    <div class="mission-section">
      <div class="mission">
        <h3>Our <span>Mission</span></h3>
        <p>To provide cutting-edge cybersecurity education that empowers individuals and enterprises to protect, detect,
          and defend digital infrastructures worldwide.</p>
      </div>
      <div class="vision">
        <h3>Our <span>Vision</span></h3>
        <p>Building a safer cyberspace by shaping the next generation of skilled professionals through hands-on learning
          and real-world experience.</p>
      </div>
    </div>
  </div>
</section>
<script>

  // Function to animate numbers
  const counters = document.querySelectorAll('.count');
  const speed = 200; // Adjust speed here (lower = faster)

  const startCounting = (entry) => {
    if (entry[0].isIntersecting) {
      counters.forEach(counter => {
        const updateCount = () => {
          const target = +counter.getAttribute('data-target');
          const count = +counter.innerText;

          const increment = target / speed;

          if (count < target) {
            counter.innerText = Math.ceil(count + increment);
            setTimeout(updateCount, 10);
          } else {
            // Format last number with + or K+
            if (target >= 1000) {
              counter.innerText = (target / 1000) + "K+";
            } else {
              counter.innerText = target + "+";
            }
          }
        };
        updateCount();
      });
    }
  };

  // Observe when section enters viewport
  const observer = new IntersectionObserver(startCounting, {
    threshold: 0.5
  });

  observer.observe(document.querySelector('.about-stats'));


</script>

<style>
  /* ===== FUTURISTIC ABOUT SECTION (VIDEO VERSION) ===== */
  /* ===== FUTURISTIC ABOUT SECTION (VIDEO VERSION) ===== */
  .about-futuristic {
    position: relative;
    background: linear-gradient(180deg, #060606, #0a0a0a);
    color: #fff;
    padding: 100px 0 80px;
    font-family: 'Poppins', sans-serif;
    overflow: hidden;
  }

  /* background animated lines */
  .about-overlay::before,
  .about-overlay::after {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 120%;
    height: 120%;
    background: repeating-linear-gradient(90deg,
        rgba(255, 255, 255, 0.02) 0,
        rgba(255, 255, 255, 0.02) 1px,
        transparent 2px,
        transparent 100px);
    animation: moveLines 40s linear infinite;
    transform: rotate(2deg);
    z-index: 1;
  }

  @keyframes moveLines {
    0% {
      background-position: 0 0;
    }

    100% {
      background-position: 1000px 0;
    }
  }

  .container {
    width: 90%;
    max-width: 1300px;
    margin: auto;
    position: relative;
    z-index: 2;
  }

  .about-inner {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 50px;
  }

  .about-left {
    flex: 1;
    min-width: 300px;
  }

  .about-left h2 {
    font-size: clamp(2rem, 4vw, 3rem);
    font-weight: 700;
    line-height: 1.3;
    margin-bottom: 25px;
  }

  .about-left h2 span {
    background: linear-gradient(90deg, #57c5c7, #3bb0b2);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
  }

  .about-left .intro {
    color: #bbb;
    font-size: clamp(1rem, 2vw, 1.1rem);
    line-height: 1.7;
    margin-bottom: 35px;
    max-width: 650px;
  }

  /* Stats */
  .about-stats {
    display: flex;
    flex-wrap: wrap;
    gap: 35px;
  }

  .stat h3 {
    font-size: clamp(1.6rem, 3vw, 2.2rem);
    color: #57c5c7;
    margin-bottom: 8px;
  }

  .stat p {
    color: #aaa;
    font-size: 0.95rem;
  }

  .cta-btn {
    display: inline-block;
    padding: 14px 32px;
    border-radius: 50px;
    background: linear-gradient(90deg, #57c5c7, #3bb0b2);
    color: #fff;
    font-weight: 600;
    text-decoration: none;
    transition: 0.3s;
  }

  .cta-btn:hover {
    transform: scale(1.05);
    opacity: 0.9;
  }

  /* Right Globe Area */
  .about-right {
    flex: 1;
    min-width: 280px;
    text-align: center;
  }

  .globe {
    position: relative;
    width: clamp(250px, 50vw, 400px);
    height: clamp(250px, 50vw, 400px);
    margin: auto;
  }

  .globe-video {
    width: 100%;
    height: 100%;
    border-radius: 50%;
    overflow: hidden;
    position: relative;
    box-shadow: 0 0 40px rgba(87, 197, 199, 0.25);
  }

  .globe-video video {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 50%;
  }

  .lines {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border-radius: 50%;
    box-shadow: 0 0 60px rgba(87, 197, 199, 0.3), inset 0 0 30px rgba(255, 255, 255, 0.1);
    animation: rotateGlow 12s linear infinite;
    pointer-events: none;
  }

  @keyframes rotateGlow {
    from {
      transform: rotate(0deg);
    }

    to {
      transform: rotate(360deg);
    }
  }

  /* Mission/Vision */
  .mission-section {
    display: flex;
    justify-content: space-between;
    gap: 35px;
    margin-top: 90px;
    flex-wrap: wrap;
  }

  .mission,
  .vision {
    flex: 1;
    min-width: 280px;
    background: rgba(255, 255, 255, 0.05);
    padding: 40px;
    border-radius: 20px;
    border: 1px solid rgba(255, 255, 255, 0.08);
    backdrop-filter: blur(6px);
    transition: 0.3s;
    text-align: center;
  }

  .mission:hover,
  .vision:hover {
    border-color: #57c5c7;
    box-shadow: 0 0 25px rgba(87, 197, 199, 0.25);
  }

  .mission h3,
  .vision h3 {
    font-size: clamp(1.3rem, 3vw, 1.8rem);
    margin-bottom: 10px;
  }

  .mission span,
  .vision span {
    color: #57c5c7;
  }

  .mission p,
  .vision p {
    color: #aaa;
    font-size: clamp(0.95rem, 2vw, 1rem);
    line-height: 1.6;
  }

  /* Mobile Responsive */
  @media (max-width: 900px) {
    .about-inner {
      flex-direction: column;
      text-align: center;
    }

    .about-stats {
      justify-content: center;
    }

    .mission-section {
      flex-direction: column;
      align-items: center;
    }
  }
</style>

<!-- ✅ POPULAR COURSES SECTION -->
<section class="academy-courses">
  <div class="academy-container">
    <h2 class="academy-title">Popular <span>Courses</span></h2>
    <p class="academy-subtitle">Enhance your cybersecurity career with industry-ready programs.</p>

    <div class="academy-slider">
      <button class="academy-nav academy-prev" type="button" aria-label="Previous courses">&lsaquo;</button>

      <div class="academy-scroll" id="popularCoursesScroller">

        @forelse ($popularCourses as $course)
          <div class="academy-card">
            <div class="academy-image">
              @if ($course->featured_image)
                <img src="{{ Storage::url($course->featured_image) }}" alt="{{ $course->name }}" loading="lazy">
              @else
                <img
                  src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='400' height='300'%3E%3Crect width='100%25' height='100%25' fill='%230f141a'/%3E%3Ctext x='50%25' y='50%25' fill='%2357c5c7' font-size='16' text-anchor='middle' dominant-baseline='middle'%3E{{ $course->name }}%3C/text%3E%3C/svg%3E"
                  alt="{{ $course->name }}" loading="lazy">
              @endif
            </div>
            <h3>{{ $course->name }}</h3>
            <!-- show category name and  academy or university name  -->
            <p class="course-meta">
              @if ($course->courseCategory)
                <span class="category">{{ $course->courseCategory->name }}</span>
              @endif
              @if ($course->academy)
                <span class="academy"> | {{ $course->academy->name }}</span>
              @elseif ($course->university)
                <span class="university"> | {{ $course->university->name }}</span>
              @endif
            </p>
            <p>{{ Str::limit($course->short_description, 110) }}</p>
            <a href="{{ url($course->slug) }}" class="academy-btn">Enroll Now</a>
          </div>
        @empty
          <p>No popular courses available yet.</p>
        @endforelse

      </div>

      <button class="academy-nav academy-next" type="button" aria-label="Next courses">&rsaquo;</button>
    </div>
  </div>
</section>

<!-- ✅ CSS STYLE -->
<style>
  /* MAIN SECTION */
  .academy-courses {
    background: radial-gradient(circle at top, #060a0e, #010203);
    color: #fff;
    padding: 80px 0;
    text-align: center;
    position: relative;
    overflow-x: hidden;
  }

  .academy-title {
    font-size: clamp(1.8rem, 4vw, 2.8rem);
    font-weight: 800;
    margin-bottom: 10px;
    letter-spacing: 1px;
  }

  .academy-title span {
    color: #57c5c7;
  }

  .academy-subtitle {
    color: #a9b5bb;
    font-size: clamp(1rem, 2vw, 1.2rem);
    margin-bottom: 50px;
  }

  /* Horizontal Scroll */
  .academy-slider {
    display: flex;
    align-items: center;
    gap: 10px;
    position: relative;
  }

  .academy-scroll {
    display: flex;
    gap: 25px;
    overflow-x: auto;
    scroll-behavior: smooth;
    padding-bottom: 20px;
    scrollbar-width: thin;
    scroll-snap-type: x mandatory;
    -webkit-overflow-scrolling: touch;
    flex: 1;
  }

  .academy-scroll::-webkit-scrollbar {
    height: 8px;
  }

  .academy-scroll::-webkit-scrollbar-thumb {
    background: #57c5c7;
    border-radius: 10px;
  }

  .academy-scroll::-webkit-scrollbar-track {
    background: #0d0d0d;
  }

  .academy-card {
    scroll-snap-align: start;
  }

  /* Nav Buttons */
  .academy-nav {
    width: 46px;
    height: 46px;
    flex: 0 0 46px;
    border-radius: 50%;
    border: 2px solid rgba(87, 197, 199, 0.6);
    background: rgba(87, 197, 199, 0.12);
    color: #57c5c7;
    font-size: 1.8rem;
    line-height: 1;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    z-index: 2;
  }

  .academy-nav:hover {
    background: #57c5c7;
    color: #000;
    box-shadow: 0 0 20px rgba(87, 197, 199, 0.5);
  }

  @media (max-width: 768px) {
    .academy-nav {
      width: 38px;
      height: 38px;
      flex: 0 0 38px;
      font-size: 1.4rem;
    }
  }

  /* CARD */
  .academy-card {
    flex: 0 0 clamp(230px, 60vw, 300px);
    background: rgba(255, 255, 255, 0.05);
    border-radius: 18px;
    border: 1px solid rgba(87, 197, 199, 0.25);
    box-shadow: 0 0 25px rgba(87, 197, 199, 0.15);
    transition: all 0.4s ease;
    overflow: hidden;
    text-align: left;
  }

  .academy-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 0 40px rgba(87, 197, 199, 0.3);
    border-color: #57c5c7;
  }

  /* IMAGE FIX - RESPONSIVE */
  .academy-image {
    height: clamp(150px, 30vw, 180px);
    overflow: hidden;
  }

  .academy-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: 0.4s;
  }

  .academy-card:hover .academy-image img {
    transform: scale(1.1);
  }

  /* TEXT */
  .academy-card h3 {
    font-size: clamp(1.1rem, 2vw, 1.3rem);
    margin: 18px 20px 8px;
    color: #57c5c7;
    font-weight: 700;
  }

  .academy-card p {
    color: #e0e0e0;
    font-size: clamp(0.9rem, 2vw, 1rem);
    margin: 0 20px 18px;
    line-height: 1.6;
  }

  .course-meta {
    color: #a9b5bb !important;
    font-size: 0.85rem !important;
    margin-bottom: 8px !important;
  }

  .course-meta .category {
    color: #57c5c7;
  }

  /* BUTTON */
  .academy-btn {
    display: block;
    background: linear-gradient(90deg, #57c5c7, #3bb0b2);
    color: #000;
    border: none;
    font-weight: 600;
    font-size: 0.95rem;
    padding: 10px 25px;
    border-radius: 8px;
    margin: 0 20px 22px;
    cursor: pointer;
    transition: all 0.3s ease;
    text-align: center;
    box-shadow: 0 0 15px rgba(87, 197, 199, 0.2);
  }

  .academy-btn:hover {
    background: #fff;
    color: #000;
    box-shadow: 0 0 25px rgba(87, 197, 199, 0.4);
  }

  /* RESPONSIVE BREAKPOINTS */
  @media (max-width: 768px) {
    .academy-scroll {
      gap: 20px;
      padding-left: 15px;
    }
  }

  @media (max-width: 480px) {
    .academy-card {
      flex: 0 0 240px;
    }

    .academy-image {
      height: 150px;
    }
  }

  /* FIX: MOBILE & TABLET SCROLL ISSUE */
  @media (max-width: 1024px) {
    .academy-scroll {
      justify-content: flex-start !important;
      /* scroll start se */
      padding-left: 15px;
      /* left space for first card */
    }
  }

  @media (max-width: 480px) {
    .academy-scroll {
      gap: 18px;
    }
  }
</style>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    var scroller = document.getElementById('popularCoursesScroller');
    if (!scroller) return;

    var scrolledByUser = false;
    var scrollTimer = null;

    function cardStep() {
      var first = scroller.querySelector('.academy-card');
      return first ? first.offsetWidth + 25 : 0;
    }

    function next() {
      if (scroller.scrollLeft + scroller.clientWidth >= scroller.scrollWidth - 10) {
        scroller.scrollTo({ left: 0, behavior: 'smooth' });
      } else {
        scroller.scrollBy({ left: cardStep(), behavior: 'smooth' });
      }
    }

    function prev() {
      if (scroller.scrollLeft <= 10) {
        scroller.scrollTo({ left: scroller.scrollWidth, behavior: 'smooth' });
      } else {
        scroller.scrollBy({ left: -cardStep(), behavior: 'smooth' });
      }
    }

    document.querySelector('.academy-next').addEventListener('click', next);
    document.querySelector('.academy-prev').addEventListener('click', prev);

    scroller.addEventListener('scroll', function () {
      scrolledByUser = true;
      clearTimeout(scrollTimer);
      scrollTimer = setTimeout(function () { scrolledByUser = false; }, 4000);
    });

    setInterval(function () {
      if (!scrolledByUser) next();
    }, 3000);
  });
</script>


<!-- 🌐 WHY SECURIUM ACADEMY - LEFT IMAGE, RIGHT TIMELINE -->
<section class="why-securium-split">
  <div class="container">
    <div class="row">
      <!-- LEFT SIDE (Image / Video Placeholder) -->
      <div class="left">
        <div class="image-box">
          <!-- apni image ya video yaha lagana -->
          <img src="{{ asset('images/oscp-securiumacademy.webp') }}" alt="Cybersecurity Training" />
        </div>
      </div>

      <!-- RIGHT SIDE (Timeline Content) -->
      <div class="right">
        <h2 class="title">Why <span>Securium Academy</span>?</h2>
        <p class="subtitle">Because we don’t just teach cybersecurity — we build cyber warriors.</p>

        <div class="timeline">
          <div class="line"></div>

          <div class="timeline-item">
            <div class="dot"></div>
            <div class="content">
              <h3>Real Cyber Labs</h3>
              <p>Experience live simulations and attack-defense environments built for real hackers.</p>
            </div>
          </div>

          <div class="timeline-item">
            <div class="dot"></div>
            <div class="content">
              <h3>Global Certifications</h3>
              <p>Earn OSCP, CEH v13, and other international certifications to power your cyber career.</p>
            </div>
          </div>

          <div class="timeline-item">
            <div class="dot"></div>
            <div class="content">
              <h3>Expert Mentorship</h3>
              <p>Learn from professionals active in red team, SOC, and penetration testing operations.</p>
            </div>
          </div>

          <div class="timeline-item">
            <div class="dot"></div>
            <div class="content">
              <h3>Career-Focused Path</h3>
              <p>From skill-building to placement guidance, Securium supports your entire cyber journey.</p>
            </div>
          </div>
        </div>

        <div class="action">
          <a href="#courses" data-bs-toggle="modal" data-bs-target="#exampleModal" class="cta-btn">Explore Courses</a>
        </div>
      </div>
    </div>
  </div>
</section>

<style>
  /* === WHY SECURIUM SPLIT DESIGN === */
  .why-securium-split {
    background: radial-gradient(circle at top left, #081013, #000);
    color: #fff;
    padding: 100px 0;
    overflow: hidden;
    position: relative;
    font-family: 'Poppins', sans-serif;
  }

  .why-securium-split .container {
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 40px;
  }

  .left,
  .right {
    flex: 1;
    min-width: 320px;
  }

  /* LEFT SIDE IMAGE BOX */
  .image-box {
    position: relative;
    overflow: hidden;
    border-radius: 20px;
    box-shadow: 0 0 30px rgba(87, 197, 199, 0.2);
  }

  .image-box img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 20px;
    transition: 0.4s ease;
  }

  .image-box img:hover {
    transform: scale(1.05);
    box-shadow: 0 0 50px rgba(87, 197, 199, 0.4);
  }

  /* RIGHT SIDE TIMELINE */
  .title {
    font-size: 2.8rem;
    font-weight: 800;
    color: #fff;
    margin-bottom: 10px;
  }

  .title span {
    color: #57c5c7;
    text-shadow: 0 0 15px rgba(87, 197, 199, 0.6);
  }

  .subtitle {
    color: #b6d9da;
    font-size: 1.1rem;
    margin-bottom: 50px;
  }

  /* Timeline */
  .timeline {
    position: relative;
    padding-left: 30px;
  }

  .line {
    position: absolute;
    top: 0;
    left: 10px;
    width: 3px;
    height: 100%;
    background: linear-gradient(180deg, #00ffff, #57c5c7, #00ffff);
    animation: pulseLine 3s infinite alternate;
    box-shadow: 0 0 20px rgba(87, 197, 199, 0.4);
  }

  @keyframes pulseLine {
    0% {
      opacity: 0.6;
    }

    100% {
      opacity: 1;
      box-shadow: 0 0 35px rgba(87, 197, 199, 0.8);
    }
  }

  .timeline-item {
    position: relative;
    margin-bottom: 35px;
  }

  .dot {
    position: absolute;
    left: -5px;
    top: 5px;
    width: 15px;
    height: 15px;
    background: linear-gradient(145deg, #00ffff, #57c5c7);
    border-radius: 50%;
    box-shadow: 0 0 20px rgba(87, 197, 199, 0.8);
    animation: blinkDot 2s infinite alternate;
  }

  @keyframes blinkDot {
    0% {
      transform: scale(1);
      opacity: 0.7;
    }

    100% {
      transform: scale(1.3);
      opacity: 1;
    }
  }

  .content {
    margin-left: 30px;
    padding: 15px 20px;
    background: rgba(255, 255, 255, 0.05);
    border-left: 2px solid rgba(87, 197, 199, 0.3);
    border-radius: 8px;
    transition: 0.3s ease;
  }

  .content:hover {
    background: rgba(255, 255, 255, 0.1);
    transform: translateX(6px);
  }

  .content h3 {
    color: #57c5c7;
    font-size: 1.3rem;
    margin-bottom: 8px;
  }

  .content p {
    color: #d4f2f3;
    font-size: 0.95rem;
  }

  /* Button */
  .action {
    margin-top: 50px;
  }

  .cta-btn {
    display: inline-block;
    padding: 14px 40px;
    border-radius: 50px;
    background: linear-gradient(90deg, #277777, #2a696a);
    color: #fff;
    font-weight: 700;
    text-decoration: none;
    box-shadow: 0 0 25px rgba(87, 197, 199, 0.5);
    transition: 0.3s;
  }



  .cta-btn:hover {
    transform: scale(1.05);
    box-shadow: 0 0 40px rgba(87, 197, 199, 0.9);
  }

  /* Responsive */
  @media (max-width: 992px) {
    .why-securium-split .container {
      flex-direction: column;
    }

    .right {
      padding-top: 40px;
    }

    .title {
      font-size: 2.2rem;
    }
  }
</style>


<!-- Partnering Section -->
<section class="partner-list py-5" style="background:#000;">
  <div class="container">
    <h2 class="text-center mb-4" style="color:#fff;">
      Partnering with the World's Leading Universities and Companies
    </h2>

    <div class="marquee">
      <div class="marquee__content">
        @for ($i = 0; $i < 2; $i++)
          @foreach (\App\Models\Partner::all() as $partner)
            <div class="marquee__item">
              @if ($partner->logo)
                <img src="{{ Storage::url($partner->logo) }}" alt="{{ $partner->name }}" loading="lazy">
              @endif
            </div>
          @endforeach
        @endfor
      </div>
    </div>
  </div>
</section>



<!-- we offer professional -->

<div class="our-feature" style="background: radial-gradient(circle at top right, #0c141f, #000);">
  <div class="container">
    <div class="row align-items-center gy-4">

      <!-- Left Side: Feature Content -->
      <div class="col-lg-6 col-md-12">
        <div class="our-feature-content text-white">
          <!-- Section Title -->
          <div class="section-title">
            <h3 class="wow fadeInUp" style="color: #fff;">Cyber Security</h3>
            <h2 class="wow fadeInUp" data-wow-delay="0.2s" data-cursor="-opaque" style="color: #fff;">
              We Offer <span>Professional Security Certification</span>
            </h2>
          </div>

          <!-- Feature List -->
          <div class="ferature-list">
            <!-- EC-Council -->
            <div class="ferature-list-item wow fadeInUp d-flex align-items-start gap-3 mb-4" data-wow-delay="0.4s">
              <div class="icon-box">
                <img src="{{ asset('icons/icon-ferature-1.svg') }}" alt="" width="40">
              </div>
              <div class="ferature-list-content">
                <h4 class="mb-1">EC-Council</h4>
                <p class="mb-0">We are leading EC-Council training provider...</p>
              </div>
            </div>

            <!-- CompTIA -->
            <div class="ferature-list-item wow fadeInUp d-flex align-items-start gap-3 mb-4" data-wow-delay="0.6s">
              <div class="icon-box">
                <img src="{{ asset('icons/icon-ferature-2.svg') }}" alt="" width="40">
              </div>
              <div class="ferature-list-content">
                <h4 class="mb-1">CompTIA</h4>
                <p class="mb-0">Securium Academy offers cyber security course...</p>
              </div>
            </div>

            <!-- Offensive -->
            <div class="ferature-list-item wow fadeInUp d-flex align-items-start gap-3 mb-4" data-wow-delay="0.8s">
              <div class="icon-box">
                <img src="{{ asset('icons/icon-ferature-3.svg') }}" alt="" width="40">
              </div>
              <div class="ferature-list-content">
                <h4 class="mb-1">Offensive</h4>
                <p class="mb-0">Securium Academy offers comprehensive cyber security certification...</p>
              </div>
            </div>

            <!-- ISACA -->
            <div class="ferature-list-item wow fadeInUp d-flex align-items-start gap-3 mb-4" data-wow-delay="1s">
              <div class="icon-box">
                <img src="{{ asset('icons/icon-ferature-3.svg') }}" alt="" width="40">
              </div>
              <div class="ferature-list-content">
                <h4 class="mb-1">ISACA</h4>
                <p class="mb-0">Become a cybersecurity expert with Securium Academy...</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Right Side: 3D Carousel -->
      <div class="col-lg-6 col-md-12 d-flex justify-content-center">
        <div class="cyber-carousel-wrapper">
          <div class="cyber-carousel" id="cyber-carousel">
            <img src="{{asset('images/compita-copy.webp')}}" alt="Cybersecurity 1">
            <img src="{{asset('images/offsec.webp')}}" alt="Cybersecurity 2">
            <img src="{{asset('images/eccouncilbox.webp')}}" alt="Cybersecurity 3">
            <img src="{{asset('images/issca.webp')}}" alt="Cybersecurity 4">
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<style>
  /* Carousel Container */
  .cyber-carousel-wrapper {
    width: 100%;
    max-width: 320px;
    height: 320px;
    perspective: 1000px;
    margin: auto;
  }

  .cyber-carousel {
    width: 100%;
    height: 100%;
    position: relative;
    transform-style: preserve-3d;
    animation: cyber-rotate 20s linear infinite;
  }

  .cyber-carousel img {
    position: absolute;
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 20px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.4);
  }

  .cyber-carousel img:nth-child(1) {
    transform: rotateY(0deg) translateZ(400px);
  }

  .cyber-carousel img:nth-child(2) {
    transform: rotateY(90deg) translateZ(400px);
  }

  .cyber-carousel img:nth-child(3) {
    transform: rotateY(180deg) translateZ(400px);
  }

  .cyber-carousel img:nth-child(4) {
    transform: rotateY(270deg) translateZ(400px);
  }

  @keyframes cyber-rotate {
    from {
      transform: rotateY(0deg);
    }

    to {
      transform: rotateY(360deg);
    }
  }

  /* Responsive Carousel Size */
  @media (max-width: 992px) {
    .cyber-carousel-wrapper {
      max-width: 260px;
      height: 260px;
    }

    .cyber-carousel img {
      border-radius: 16px;
    }
  }

  @media (max-width: 576px) {
    .cyber-carousel-wrapper {
      max-width: 200px;
      height: 200px;
    }
  }
</style>


<!-- 🌟 CERTIFICATION HIGHLIGHTS SECTION -->
<section class="certification-showcase">
  <div class="container">
    <div class="cert-left">
      <h2>Globally Recognized <span>Certifications</span></h2>
      <p>
        Every learner at <strong>Securium Academy</strong> gains skills verified by
        industry-recognized credentials — proving expertise in ethical hacking,
        penetration testing, and SOC operations.
      </p>
      <a href="#" class="btn-learn" data-bs-toggle="modal" data-bs-target="#exampleModal">Explore Programs</a>
    </div>

    <div class="cert-right">
      <div class="cert-card"><img
          src="https://cdn.sanity.io/images/t7y0tkf4/production/8afe8390f5a81ecde1e5e011af3315c1a60ac9b8-527x412.svg"
          alt="OSCP Certificate"></div>
      <div class="cert-card"><img
          src="https://www.webasha.com/uploads/bootcamp/images/62fb92af8b97e1660654255.ceh-training--certification-exam-2.jpg"
          alt="CEH v13 Certificate"></div>
      <div class="cert-card"><img
          src="https://media.licdn.com/dms/image/v2/D5622AQHtQcFprexT4w/feedshare-shrink_800/B56ZjH0KHzG4Ag-/0/1755698997327?e=2147483647&v=beta&t=yBFPC-KC4QwmVyPPcnTz2mJm5RTg1uiCS7XrB14pp0w"
          alt="SOC Analyst"></div>
      <div class="cert-card"><img src="https://miro.medium.com/v2/resize:fit:1400/1*gtZPUQ4OdxGaPn2M62AJaw.jpeg"
          alt="Cyber Expert"></div>
    </div>
  </div>
</section>

<style>
  /* 🔥 Section Base */
  .certification-showcase {
    background: linear-gradient(135deg, #000000 0%, #0c1428 100%);
    padding: 100px 7%;
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
  }

  /* 🧱 Container Layout */
  .certification-showcase .container {
    display: grid;
    grid-template-columns: 1fr 1.2fr;
    align-items: center;
    gap: 50px;
  }

  /* 🧭 Left Text Area */
  .cert-left h2 {
    font-size: 2.8rem;
    font-weight: 800;
    margin-bottom: 20px;
    line-height: 1.2;
  }

  .cert-left h2 span {
    color: #57c5c7;
    text-shadow: 0 0 10px rgba(87, 197, 199, 0.5);
  }

  .cert-left p {
    font-size: 1.1rem;
    color: #a9b5bb;
    line-height: 1.6;
    margin-bottom: 40px;
  }

  .btn-learn {
    background: #57c5c7;
    color: #000;
    padding: 12px 28px;
    border-radius: 8px;
    font-weight: 700;
    transition: all 0.3s ease;
    text-decoration: none;
  }

  .btn-learn:hover {
    background: #40a8aa;
    transform: scale(1.05);
  }



  /* 🖼️ Right Certificates Grid */
  .cert-right {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 25px;
    position: relative;
  }

  /* 🎴 Certificate Cards */
  .cert-card {
    background: rgba(255, 255, 255, 0.06);
    border: 1px solid rgba(87, 197, 199, 0.2);
    border-radius: 18px;
    overflow: hidden;
    position: relative;
    box-shadow: 0 0 20px rgba(87, 197, 199, 0.15);
    transition: all 0.5s ease;
  }

  .cert-card img {
    width: 100%;
    height: 190px;
    object-fit: contain;
    filter: brightness(0.9);
    transition: all 0.5s ease;
  }

  .cert-card::before {
    content: "";
    position: absolute;
    top: -100%;
    left: -100%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle at center, rgba(87, 197, 199, 0.25), transparent 60%);
    transform: rotate(45deg);
    opacity: 0;
    transition: opacity 0.4s ease;
  }

  .cert-card:hover::before {
    opacity: 1;
  }

  .cert-card:hover {
    transform: translateY(-10px) scale(1.03);
    box-shadow: 0 0 35px rgba(87, 197, 199, 0.35);
    border-color: #57c5c7;
  }

  .cert-card:hover img {
    filter: brightness(1);
  }

  /* 📱 Responsive */
  @media (max-width: 992px) {
    .certification-showcase .container {
      grid-template-columns: 1fr;
      text-align: center;
    }

    .cert-right {
      grid-template-columns: repeat(2, 1fr);
    }

    .cert-left h2 {
      font-size: 2.2rem;
    }
  }
</style>


<!-- ⚡ Modern Dark Promo Section -->
<section class="promo-dark-banner ">
  <div class="container">
    <div class="promo-dark-box d-flex flex-column flex-lg-row align-items-center justify-content-between">

      <!-- 🌐 Left Content -->
      <div class="promo-dark-content text-center text-lg-start">
        <h3 class="promo-dark-title">Learn Cyber Security For Free!</h3>
        <p class="promo-dark-desc">
          Build your career in cybersecurity with hands-on labs, live sessions, and mentorship from industry experts.
        </p>
        <a href="#" class="promo-dark-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">Explore Free
          Courses</a>
      </div>

      <!-- 🖥️ Right Image -->
      <div class="promo-dark-img">
        <img src="{{ asset('images/promo-section.webp') }}" alt="Cyber Security Students">
      </div>

    </div>
  </div>
</section>

<style>
  /* 🌑 Section Wrapper */
  .promo-dark-banner {
    background: radial-gradient(circle at top right, #0c141f, #000);
    padding: 100px 0;
    position: relative;
    overflow: hidden;
  }

  /* ✨ Floating light effects */
  .promo-dark-banner::before,
  .promo-dark-banner::after {
    content: "";
    position: absolute;
    border-radius: 50%;
    filter: blur(90px);
    opacity: 0.3;
  }

  .promo-dark-banner::before {
    width: 300px;
    height: 300px;
    top: -80px;
    left: -100px;
    background: #57c5c7;
  }

  .promo-dark-banner::after {
    width: 250px;
    height: 250px;
    bottom: -80px;
    right: -100px;
    background: #2b9fa1;
  }

  /* 💠 Box Container */
  .promo-dark-box {
    position: relative;
    background: rgba(10, 20, 30, 0.75);
    border: 1px solid rgba(87, 197, 199, 0.3);
    border-radius: 22px;
    padding: 60px;
    box-shadow: 0 0 50px rgba(87, 197, 199, 0.1);
    backdrop-filter: blur(12px);
    transition: all 0.3s ease;
  }

  .promo-dark-box:hover {
    box-shadow: 0 0 60px rgba(87, 197, 199, 0.25);
    transform: translateY(-5px);
  }

  /* 🔠 Text Content */
  .promo-dark-title {
    font-size: 2.4rem;
    font-weight: 800;
    color: #57c5c7;
    margin-bottom: 16px;
    text-transform: uppercase;
    letter-spacing: 1px;
    text-shadow: 0 0 20px rgba(87, 197, 199, 0.4);
  }

  .promo-dark-desc {
    color: #cdd8df;
    font-size: 1.1rem;
    line-height: 1.7;
    margin-bottom: 30px;
    max-width: 500px;
  }

  /* ⚡ Button */
  .promo-dark-btn {
    background: linear-gradient(90deg, #57c5c7, #3bb0b2);
    color: #000;
    font-weight: 700;
    text-transform: uppercase;
    padding: 12px 38px;
    border-radius: 50px;
    border: none;
    box-shadow: 0 0 25px rgba(87, 197, 199, 0.4);
    transition: all 0.3s ease-in-out;
    text-decoration: none;
  }

  .promo-dark-btn:hover {
    background: #fff;
    color: #000;
    transform: translateY(-3px);
    box-shadow: 0 0 35px rgba(87, 197, 199, 0.6);
  }

  /* 🖼️ Image Styling */
  .promo-dark-img img {
    width: 400px;
    height: auto;
    border-radius: 16px;
    filter: drop-shadow(0 0 25px rgba(87, 197, 199, 0.3));
    transition: all 0.4s ease;
  }

  .promo-dark-box:hover .promo-dark-img img {
    transform: scale(1.05);
  }

  /* 📱 Responsive */
  @media (max-width: 992px) {
    .promo-dark-box {
      flex-direction: column;
      text-align: center;
      padding: 40px 25px;
    }

    .promo-dark-img img {
      margin-top: 30px;
      width: 100%;
      max-width: 320px;
    }

    .promo-dark-title {
      font-size: 2rem;
    }
  }
</style>





<style>
  .latest-blog-section {
    background: #000;
    color: #fff;
    position: relative;
  }

  .text-gradient {
    background: linear-gradient(90deg, #00ffff, #ff007f);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
  }

  /* Blog Card */
  .blog-card {
    background: #0f141a;
    border-radius: 14px;
    overflow: hidden;
    transition: all 0.3s ease;
    display: flex;
    flex-direction: column;
    height: 100%;
    box-shadow: 0 0 10px rgba(0, 255, 255, 0.1);
  }

  .blog-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 0 25px rgba(0, 255, 255, 0.25);
  }

  /* Image Wrapper */
  .blog-img-wrapper {
    width: 100%;
    height: 230px;
    overflow: hidden;
  }

  .blog-img-wrapper img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
  }

  .blog-card:hover img {
    transform: scale(1.08);
  }

  /* Read More Button */
  .btn-glow {
    background: #5cc7cc !important;
    border: none;
    color: #fff;
    border-radius: 20px;
    padding: 8px 20px;
    font-weight: 500;
    transition: all 0.3s ease;
    text-decoration: none;
  }

  .btn-glow:hover {
    box-shadow: 0 0 15px #00ffff;
    transform: scale(1.07);
    color: #fff;
  }

  /* Card Footer */
  .card-footer {
    background-color: #0d1117;
    border-top: 1px solid #222;
    padding: 10px 0;
  }

  /* Carousel Dots */
  .carousel-indicators {
    bottom: -40px;
  }

  .carousel-indicators [data-bs-target] {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background-color: #444;
    border: none;
    margin: 0 6px;
    transition: all 0.3s ease;
  }

  .carousel-indicators .active {
    background: linear-gradient(90deg, #00ffff, #ff007f);
    box-shadow: 0 0 10px rgba(0, 255, 255, 0.5);
    transform: scale(1.2);
  }

  .carousel-indicators [data-bs-target]:hover {
    background-color: #888;
  }

  /* Blog Infinite Scroller */
  .blog-scroller {
    overflow: hidden;
    position: relative;
    width: 100%;
    padding: 10px 0;
  }

  .blog-scroller__track {
    display: flex;
    gap: 24px;
    width: max-content;
    animation: blogScroll 40s linear infinite;
  }

  .blog-scroller:hover .blog-scroller__track {
    animation-play-state: paused;
  }

  .blog-scroller__item {
    flex: 0 0 auto;
    width: 320px;
  }

  @keyframes blogScroll {
    from {
      transform: translateX(0);
    }

    to {
      transform: translateX(-50%);
    }
  }

  /* Responsive Fix */
  @media (max-width: 768px) {
    .blog-img-wrapper {
      height: 180px;
    }
  }
</style>


<!-- latest Blog Section -->
<section class="latest-blog-section py-5">
  <div class="container">
    <h2 class="text-center mb-4 text-gradient">Latest Blogs</h2>
    <p class="text-center mb-5" style="color:#aaa;">Stay updated with the latest trends and insights in cybersecurity.
    </p>

    <div class="blog-scroller">
      <div class="blog-scroller__track">
        @for ($i = 0; $i < 2; $i++)
          @foreach ($blogs as $blog)
            <div class="blog-scroller__item">
              <div class="blog-card">
                <div class="blog-img-wrapper">
                  @if ($blog->feature_image)
                    <img src="{{ Storage::url($blog->feature_image) }}" alt="{{ $blog->title }}">
                  @endif
                </div>
                <div class="card-body">
                  <h5 class="card-title">{{ Str::limit($blog->title, 50) }}</h5>
                  <p class="card-text">{{ Str::limit($blog->short_description, 75) }}</p>
                  <a href="{{ url('blog/' . $blog->slug) }}" class="btn btn-glow">Read More</a>
                </div>
              </div>
            </div>
          @endforeach
        @endfor
      </div>
    </div>
  </div>
</section>

<!-- Testimonials Section -->
@php
  $testimonials = \App\Models\Testimonial::published()->get();
@endphp
@if ($testimonials->isNotEmpty())
  <section class="testimonial-section py-5" style="background:#0f141a; color:#fff;">
    <div class="container">
      <h2 class="text-center mb-4 text-gradient">What Our Students Say</h2>
      <p class="text-center mb-5" style="color:#aaa;">Real feedback from professionals who trained with us.</p>

      <div class="blog-scroller testimonial-scroller">
        <div class="blog-scroller__track">
          @for ($i = 0; $i < 2; $i++)
            @foreach ($testimonials as $testimonial)
              <div class="blog-scroller__item testimonial-scroller__item">
                <div class="testimonial-card h-100">
                  <div class="stars">
                    @for ($s = 1; $s <= 5; $s++)
                      <i class="fas fa-star {{ $s <= $testimonial->rating ? 'text-warning' : 'text-muted' }}"></i>
                    @endfor
                  </div>
                  <p class="testimonial-text mt-3 mb-3">{{ $testimonial->content }}</p>
                  <div class="testimonial-author">
                    <strong>{{ $testimonial->name }}</strong>
                    @if ($testimonial->designation || $testimonial->company)
                      <small style="color:#8fa5b3; display:block;">
                        {{ $testimonial->designation }}@if ($testimonial->company) &middot; {{ $testimonial->company }}@endif
                      </small>
                    @endif
                  </div>
                </div>
              </div>
            @endforeach
          @endfor
        </div>
      </div>
    </div>

    <style>
      .testimonial-card {
        background: #0b0712;
        border: 1px solid rgba(0, 255, 255, 0.1);
        border-radius: 14px;
        padding: 24px;
      }

      .testimonial-text {
        color: #d5d5d5;
        font-size: 0.95rem;
        line-height: 1.7;
      }

      .testimonial-scroller__item {
        width: 380px;
      }
    </style>
  </section>
@endif


{{-- Multi-Item Carousel: shows 3 at a time, scrolls 1 at a time --}}
<style>
  .multi-item-carousel .carousel-inner {
    display: flex;
    overflow: hidden;
  }

  .multi-item-carousel .carousel-item {
    display: flex;
    flex: 0 0 33.3333%;
    transition: transform 0.6s ease-in-out;
  }

  .multi-item-carousel .carousel-item.active {
    display: flex;
  }

  .multi-item-carousel .carousel-item-next,
  .multi-item-carousel .carousel-item-prev {
    display: flex;
  }

  @media (max-width: 991px) {
    .multi-item-carousel .carousel-item {
      flex: 0 0 50%;
    }
  }

  @media (max-width: 575px) {
    .multi-item-carousel .carousel-item {
      flex: 0 0 100%;
    }
  }
</style>

{{-- Enroll Now Modal --}}
<div class="modal fade" id="exampleModal" tabindex="-1">

  <div class="modal-dialog modal-dialog-centered">

    <div class="modal-content">

      <div class="modal-header border-0">

        <h5 class="modal-title">
          Enquiry Form
        </h5>

        <button type="button" class="btn-close" data-bs-dismiss="modal">
        </button>

      </div>


      <div class="modal-body">

        <form action="mail.php" method="post" id="enquiryForm" class="lead-form-ready" data-no-recaptcha="1">
          <input type="hidden" name="lead_form_context" value="sticky_footer">

          <!-- NAME -->
          <div class="mb-3">

            <label class="form-label">
              Full Name
            </label>

            <input type="text" class="form-control" name="name" required>

          </div>


          <!-- EMAIL -->
          <div class="mb-3">

            <label class="form-label">
              Email
            </label>

            <input type="email" class="form-control" name="email" required>

          </div>


          <!-- CITY -->
          <div class="mb-3">

            <label class="form-label">
              City
            </label>

            <input type="text" class="form-control" name="city" required>

          </div>

          <!-- PHONE -->
          <div class="mb-3">

            <label class="form-label">
              Phone Number
            </label>

            <input type="tel" id="modal_phone_input" name="phone" class="form-control" required>


            <input type="hidden" name="country_code" id="modal_country_code">


            <input type="hidden" name="country_name" id="modal_country_name">

          </div>



          <!-- COURSE -->
          <div class="mb-3">

            <label class="form-label">
              Course
            </label>

            <select class="form-control" name="query" required>

              <option value="">-- Select Course --</option>

              <option value="CEH">CEH</option>
              <option value="CPENT">CPENT</option>
              <option value="CSA">CSA</option>
              <option value="CTIA">CTIA</option>
              <option value="CHFI">CHFI</option>
              <option value="CCISO">CCISO</option>
              <option value="COASP">COASP</option>
              <option value="OSCP">OSCP</option>
              <option value="OSEP">OSEP</option>
              <option value="OSAI">OSAI</option>
              <option value="OSWE">OSWE</option>
              <option value="CISA">CISA</option>
              <option value="CISM">CISM</option>
              <option value="AAIA">AAIA</option>
              <option value="AAISM">AAISM</option>
              <option value="CRISC">CRISC</option>
              <option value="CISSP">CISSP</option>
              <option value="Security+">Security+</option>
              <option value="PenTest+">PenTest+</option>
              <option value="CySA+">CySA+</option>
              <option value="Other">Other</option>

            </select>

          </div>

          <!-- OCCUPATION -->
          <div class="mb-3">

            <label class="form-label">
              Current Occupation
            </label>

            <select class="form-control" name="occupation" required>
              <option value="">Select Occupation</option>
              <option value="Student">Student</option>
              <option value="Fresher">Fresher</option>
              <option value="Working Professional">Working Professional</option>
            </select>

          </div>
          <div class="contact-captcha-box mb-3">
            <label class="form-label" for="enquiry-captcha-answer">Security check</label>
            <div class="captcha-question" id="enquiry-captcha-question">Solve: 3 + 4 = ?</div>
            <input type="number" class="form-control" name="captcha_answer" id="enquiry-captcha-answer"
              placeholder="Enter answer" required>
            <input type="hidden" name="captcha_result" id="enquiry-captcha-result" value="">
            <small class="text-muted">Enter the result of the math question above.</small>
          </div>

          <button type="submit" class="btn btn-primary w-100">

            Submit

          </button>

        </form>

      </div>

    </div>

  </div>

</div>