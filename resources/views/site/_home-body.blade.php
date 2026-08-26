 @php
 $blogs = \App\Models\Blog::with(['blogCategory','user'])->where('status', 'published')->orderBy('created_at', 'desc')->take(10)->get();
 @endphp
 
 <section class="venom-hero">
    <!-- Background Video -->
    <video class="hero-video" autoplay muted loop playsinline>
      <source src="./assets/images/ban.webm" type="video/mp4">
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
          <button class="btn download-btn" data-bs-toggle="modal" data-bs-target="#exampleModal"
            style="border-color:#fff; color:#fff;">Download Brochure</button>
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
                <source src="./assets/images/gen (1).webm" type="video/mp4">
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

  <section class="holiday-card">
    <div class="holiday-card-inner">

      <!-- LEFT CONTENT -->
      <div class="holiday-text">
        <h2>New Year 2026 Special Offers</h2>
        <h3>Save Big on <span>Top Cybersecurity Certifications</span></h3>
        <ul class="offer-grid">

          <!-- INE / EC-COUNCIL -->
          <li><a href="https://www.securiumacademy.com/ceh-v13-ai-certification-training/">CEH v13 – <strong>25%
                OFF</strong></a></li>
          <li>CPENT – <strong>25% OFF</strong></li>
          <li>OSCP – <strong>20% OFF</strong></li>
          <li>INE (eJPT / eWPT / eWPTX) – <strong> UP TO 50%</strong></li>
          <li>ISACA – <strong> 20% OFF</strong></li>
        </ul>

        <!---->
        <a href="" class="holiday-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
          AVAIL NOW
        </a>

        <p class="terms">*New year 2026 Time Offer</p>
      </div>

    </div>
  </section>





  <style>
    .holiday-card {
      padding: 60px 20px;
      background: #000000;
    }

    .holiday-card-inner {
      max-width: 1400px;
      margin: auto;
      background: #fafafa;
      border-radius: 40px;
      padding: 18px 80px;

      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 40px;

      box-shadow: 0 30px 80px rgba(0, 0, 0, 0.08);
      position: relative;
      overflow: hidden;
    }

    /* CONFETTI EFFECT (OPTIONAL IMAGE) */
    .holiday-card-inner::after {
      content: "";
      position: absolute;
      inset: 0;
      background: url("./assets/images/newye (1).webp") center / cover no-repeat;
      opacity: 0.15;
      pointer-events: none;
    }

    /* TEXT */
    .holiday-text {
      max-width: 600px;
      position: relative;
      z-index: 2;
    }

    .holiday-text h1 {
      font-size: 48px;
      font-weight: 900;
      color: #111;
    }

    .holiday-text h3 {
      font-size: 26px;
      margin: 15px 0 25px;
      color: #333;
    }

    .holiday-text h3 span {
      color: #e60000;
    }

    /* LIST */
    .holiday-text ul {
      list-style: none;
      padding: 0;
      margin-bottom: 30px;
    }

    .holiday-text ul li {
      font-size: 18px;
      margin-bottom: 12px;
      padding-left: 26px;
      position: relative;
      color: #444;
    }

    .holiday-text ul li::before {
      content: "✔";
      position: absolute;
      left: 0;
      color: #e60000;
    }

    /* BUTTON */
    .holiday-btn {
      background: #e60000;
      color: #fff;
      padding: 14px 34px;
      border-radius: 8px;
      font-weight: 800;
      text-decoration: none;
      display: inline-block;
      transition: 0.3s;
    }

    .holiday-btn:hover {
      background: #b80000;
      transform: translateY(-2px);
    }

    .terms {
      font-size: 13px;
      color: #777;
      margin-top: 10px;
    }

    /* IMAGE */
    .holiday-image {
      position: relative;
      z-index: 2;
    }

    .holiday-image img {
      max-width: 420px;
      width: 100%;
    }

    /* MOBILE */
    @media (max-width: 768px) {
      .holiday-card-inner {
        flex-direction: column;
        text-align: center;
        padding: 40px 25px;
      }

      .holiday-text h1 {
        font-size: 32px;
      }

      .holiday-text h3 {
        font-size: 20px;
      }

      .holiday-image img {
        max-width: 280px;
        margin-top: 30px;
      }
    }
  </style>


  <!-- ✅ POPULAR COURSES SECTION -->
  <section class="academy-courses">
    <div class="academy-container">
      <h2 class="academy-title">Popular <span>Courses</span></h2>
      <p class="academy-subtitle">Enhance your cybersecurity career with industry-ready programs.</p>

      <div class="academy-scroll">

        <!-- OSCP Course -->
        <div class="academy-card">
          <div class="academy-image">
            <img src="https://www.webasha.com/uploads/course/images/64202aac2dccd1679829676.oscp.jpg" alt="OSCP Course">
          </div>
          <h3>OSCP Certification</h3>
          <p>Master advanced penetration testing skills with real-world attack simulations and expert mentorship.</p>
          <a href="http://securiumacademy.com/oscp-certifications-training/" class="academy-btn">Enroll Now</a>
        </div>

        <!-- CEH v13 Course -->
        <div class="academy-card">
          <div class="academy-image">
            <img src="https://iclass.eccouncil.org/wp-content/uploads/2024/09/CEHv13.png" alt="CEH v13 Course">
          </div>
          <h3>CEH v13</h3>
          <p>Learn ethical hacking, exploit techniques, and real-world cyber defense tactics from certified experts.</p>
          <a href="https://securiumacademy.com/ceh-v13-ai-certification-training/" class="academy-btn">Enroll Now</a>
        </div>

        <!-- Winter Internship -->
        <div class="academy-card">
          <div class="academy-image">
            <img src="./assets/images/winter.png" alt="Winter Internship">
          </div>
          <h3>Winter Internship</h3>
          <p>Get hands-on cybersecurity exposure through our winter internship program designed for real-world experience.
          </p>
          <a href="https://securiumacademy.com/winter-cybersecurity-internship/" class="academy-btn">Enroll Now</a>
        </div>

        <!-- SOC Analyst -->
        <div class="academy-card">
          <div class="academy-image">
            <img src="./assets/images/cpent.png" alt="SOC Analyst">
          </div>
          <h3>CPENT</h3>
          <p>C|PENT validates your skills to break into hardened networks, exploit vulnerabilities, escalate privileges &
            pivot .</p>
          <a href="https://securiumacademy.com/certified-penetration-testing-professional/" class="academy-btn">Enroll
            Now</a>
        </div>

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
    .academy-scroll {
      display: flex;
      gap: 25px;
      overflow-x: auto;
      scroll-behavior: smooth;
      padding-bottom: 20px;
      scrollbar-width: thin;
      justify-content: center;
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


  <!-- 🌐 WHY SECURIUM ACADEMY - LEFT IMAGE, RIGHT TIMELINE -->
  <section class="why-securium-split">
    <div class="container">
      <div class="row">
        <!-- LEFT SIDE (Image / Video Placeholder) -->
        <div class="left">
          <div class="image-box">
            <!-- apni image ya video yaha lagana -->
            <img src="./assets/images/oscp-securiumacademy.webp" alt="Cybersecurity Training" />
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
            @foreach (config('site.partners') as $partner)
            <div class="marquee__item">
              <img src="assets/images/{{ $partner }}" alt="Partner Logo" loading="lazy">
            </div>
            @endforeach
          @endfor
        </div>
      </div>
    </div>
  </section>



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
      <p class="text-center mb-5" style="color:#aaa;">Stay updated with the latest trends and insights in cybersecurity.</p>

      <div id="blogCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">

          @foreach ($blogs as $index => $blog)
          <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
            <div class="row justify-content-center">
              <div class="col-md-6 col-lg-4">
                <div class="blog-card">
                  <div class="blog-img-wrapper">
                    @if ($blog->featured_image_url)
                    <img src="{{ $blog->featured_image_url }}" alt="{{ $blog->title }}">
                    @endif
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">{{ $blog->title }}</h5>
                    <p class="card-text">{{ Str::limit($blog->short_description, 100) }}</p>
                    <a href="{{ url('blog/' . $blog->slug) }}" class="btn btn-glow">Read More</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach

        </div>

        <!-- Carousel Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#blogCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#blogCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>

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

      <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          @foreach ($testimonials->chunk(3) as $chunkIndex => $chunk)
          <div class="carousel-item {{ $chunkIndex === 0 ? 'active' : '' }}">
            <div class="row g-4 justify-content-center">
              @foreach ($chunk as $testimonial)
              <div class="col-md-4">
                <div class="testimonial-card h-100">
                  <div class="stars">
                    @for ($i = 1; $i <= 5; $i++)
                    <i class="fas fa-star {{ $i <= $testimonial->rating ? 'text-warning' : 'text-muted' }}"></i>
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
            </div>
          </div>
          @endforeach
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
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
    </style>
  </section>
  @endif




