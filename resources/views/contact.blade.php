@extends('layouts.site')
@section('content')

<!-- banner section -->
<div class="page-header parallaxie">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-12">
        <!-- Page Header Box Start -->
        <div class="page-header-box">
          <h1 class="wow fadeInUp" data-cursor="-opaque" style="visibility: visible; animation-name: fadeInUp;">Contact
            us</h1>
          <nav class="wow fadeInUp" data-wow-delay="0.2s"
            style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">home</a></li>
              <li class="breadcrumb-item active" aria-current="page">contact us</li>
            </ol>
          </nav>
        </div>
        <!-- Page Header Box End -->
      </div>
    </div>
  </div>
</div>

<!-- contact us  -->
<style>
  /* ==============================
   ✅ RESPONSIVE MEDIA QUERIES
   ============================== */

  /* Tablet (max-width: 992px) */
  @media (max-width: 992px) {

    .contact-container {
      flex-direction: column;
      gap: 30px;
      padding: 0 20px;
    }

    .contact-form-box,
    .contact-info-box {
      padding: 30px;
    }

    .contact-heading-line span {
      font-size: 26px;
    }
  }


  /* Mobile (max-width: 576px) */
  @media (max-width: 576px) {

    .contact-wrapper {
      padding: 50px 0;
    }

    .contact-form-box h2 {
      font-size: 24px;
    }

    .contact-heading-line span {
      font-size: 22px;
      padding: 0 12px;
    }

    .info-item {
      flex-direction: column;
      align-items: flex-start;
      gap: 10px;
    }

    .info-icon {
      width: 40px;
      height: 40px;
      font-size: 18px;
    }

    .info-content h4 {
      font-size: 16px;
    }

    .info-content p {
      font-size: 13px;
    }

    .contact-form-box input,
    .contact-form-box textarea {
      font-size: 13px;
      padding: 12px;
    }

    .contact-form-box button {
      width: 100%;
      padding: 14px;
      font-size: 15px;
    }

  }

  .contact-wrapper {
    background: #fff;
    padding: 80px 0;
    font-family: Arial, sans-serif;
  }

  .contact-container {
    max-width: 1200px;
    margin: auto;
    display: flex;
    gap: 50px;
    align-items: stretch;
  }

  /* LEFT FORM */
  .contact-form-box {
    flex: 1;
    background: #ffffff;
    padding: 40px;
    border-radius: 12px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
  }

  .contact-form-box h2 {
    font-size: 28px;
    margin-bottom: 10px;
  }

  .contact-form-box p {
    font-size: 14px;
    margin-bottom: 25px;
    color: #555;
  }

  .contact-form-box input,
  .contact-form-box textarea {
    width: 100%;
    padding: 14px;
    margin-bottom: 15px;
    border-radius: 6px;
    border: 1px solid #ccc;
    font-size: 14px;
  }

  .contact-captcha-box {
    margin-bottom: 18px;
    padding: 12px 14px;
    border: 1px solid #dce7f0;
    border-radius: 8px;
    background: #f8fbff;
  }

  .contact-captcha-box label {
    display: block;
    font-size: 13px;
    margin-bottom: 8px;
    color: #31415a;
    font-weight: 600;
  }

  .contact-captcha-box .captcha-question {
    color: #132a7c;
    font-weight: 700;
  }

  .contact-captcha-box input[type="number"] {
    width: 100%;
    padding: 12px 14px;
    margin-bottom: 0;
    border: 1px solid #c7d4e1;
    border-radius: 6px;
    font-size: 14px;
  }

  .contact-captcha-box .captcha-hint {
    display: block;
    font-size: 12px;
    color: #667085;
    margin-top: 6px;
  }

  .contact-form-box button {
    background: #5cc7cc;
    color: #fff;
    padding: 12px 40px;
    border: none;
    border-radius: 6px;
    font-size: 14px;
    cursor: pointer;
  }

  /* RIGHT INFO */
  .contact-info-box {
    flex: 1;
    padding: 40px 30px;
  }

  .contact-info-box h2 {
    font-size: 30px;
    color: #132a7c;
    margin-bottom: 30px;
  }

  .info-item {
    display: flex;
    gap: 18px;
    margin-bottom: 30px;
    align-items: flex-start;
  }

  .info-icon {
    width: 45px;
    height: 45px;
    background: #5cc7cc;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    font-size: 20px;
    flex-shrink: 0;
  }

  .info-content h4 {
    font-size: 18px;
    margin-bottom: 6px;
    color: #222;
  }

  .info-content p {
    font-size: 14px;
    color: #444;
    margin-bottom: 5px;
    line-height: 1.6;
  }

  .contact-heading-line {
    display: flex;
    align-items: center;
    text-align: center;
    margin-bottom: 35px;
  }

  .contact-heading-line::before,
  .contact-heading-line::after {
    content: "";
    flex: 1;
    height: 1px;
    background: #222;
  }

  .contact-heading-line span {
    padding: 0 20px;
    font-size: 30px;
    font-weight: bold;
    color: #132a7c;
    white-space: nowrap;
  }
</style>
<section class="contact-wrapper">
  <div class="contact-container">

    <!-- LEFT FORM -->
    <div class="contact-form-box">
      <h2>For Enquiry</h2>
      <p>Do you have any questions or queries? Fill the form below & an expert from our team will reply back to you
        soon.</p>

      <form id="contactPageForm"
        action="<?= defined('BASE_URL') ? BASE_URL . 'contact-mail.php' : 'contact-mail.php' ?>" method="post"
        class="lead-form-ready" data-no-recaptcha="1">
        <input type="hidden" name="lead_form_context" value="contact_page">
        <input type="text" name="name" placeholder="Name" required>

        <input type="email" name="email" placeholder="Email" required>

        <input type="text" name="phone" placeholder="Contact Number" required>

        <input type="text" name="subject" placeholder="Subject" required>

        <textarea name="query" rows="5" placeholder="Message" required></textarea>

        <div class="contact-captcha-box">
          <label for="contact-captcha-answer">Security check</label>
          <div class="captcha-question" id="contact-captcha-question">Solve: 3 + 4 = ?</div>
          <input type="number" name="captcha_answer" id="contact-captcha-answer" placeholder="Enter answer" required>
          <input type="hidden" name="captcha_result" id="contact-captcha-result" value="">
          <small class="captcha-hint">Please enter the result of the math question.</small>
        </div>

        <button type="submit">SEND</button>
      </form>

      <script>
        document.addEventListener('DOMContentLoaded', function () {
          var form = document.getElementById('contactPageForm');
          if (!form) return;

          var questionEl = document.getElementById('contact-captcha-question');
          var answerInput = document.getElementById('contact-captcha-answer');
          var resultInput = document.getElementById('contact-captcha-result');

          if (!questionEl || !answerInput || !resultInput) return;

          function generateContactCaptcha() {
            var a = Math.floor(Math.random() * 9) + 1;
            var b = Math.floor(Math.random() * 9) + 1;

            questionEl.textContent = 'Solve: ' + a + ' + ' + b + ' = ?';
            resultInput.value = a + b;
            answerInput.value = '';
            answerInput.setAttribute('autocomplete', 'off');
          }

          form.addEventListener('submit', function (event) {
            var enteredValue = (answerInput.value || '').trim();

            if (enteredValue === '') {
              event.preventDefault();
              alert('Please solve the captcha before sending the form.');
              answerInput.focus();
              return;
            }

            if (String(enteredValue) !== String(resultInput.value)) {
              event.preventDefault();
              alert('The captcha answer is incorrect. Please try again.');
              generateContactCaptcha();
              answerInput.focus();
              return;
            }
          });

          generateContactCaptcha();
        });
      </script>

    </div>

    <!-- RIGHT CONTACT INFO -->
    <div class="contact-info-box">
      <div class="contact-heading-line">
        <span>Get in Touch</span>
      </div>


      <!-- Address -->
      <div class="info-item">
        <div class="info-icon"><i class="fa-solid fa-location-dot"></i></div>
        <div class="info-content">
          <h4>Contact Address</h4>
          <p><b>India:</b> B-28, 1st Floor, Sector-01, Noida, Uttar Pradesh – 201301</p>
          <p><b>Singapore:</b> 39, Kaki Bukit View, Techpark II</p>
          <p><b>USA:</b> 3601 Timberbridge dr, apt B, Valparaiso Indiana</p>
          <p><b>Dubai:</b> Downtown Office 202, Saaha Office, C- Soukm Al Bahar Bridge, Dubai, Po Box : 282615</p>

        </div>
      </div>

      <!-- Phone -->
      <div class="info-item">
        <div class="info-icon"><i class="fa-solid fa-phone"></i></div>
        <div class="info-content">
          <h4>Let's Talk</h4>
          <p><b>(US)</b>: +1 (301)-543-7051</p>
          <p><b>(INDIA)</b>: +91-798-260-1944</p>
          <p><b>(INDIA)</b>: +91-999-060-2449</p>
          <p><b>(INDIA)</b>: +91-704-283-4111</p>
          <p><b>(UAE)</b>: +97-158-515-4667</p>
        </div>
      </div>

      <!-- Email -->
      <div class="info-item">
        <div class="info-icon"><i class="fa-solid fa-envelope"></i></div>
        <div class="info-content">
          <h4>Email Us</h4>
          <p>info@securiumacademy.com</p>
          <p>support@securiumacademy.com</p>
        </div>
      </div>

      <!-- Time -->
      <div class="info-item">
        <div class="info-icon"><i class="fa-solid fa-clock"></i></div>
        <div class="info-content">
          <h4>Working Hours</h4>
          <p>10:15 AM – 07:15 PM (Monday to Saturday)</p>
        </div>
      </div>

    </div>
  </div>
</section>



<!-- google map -->

<div class="google-map">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <!-- Google Map IFrame Start -->
        <div class="google-map-iframe">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d448433.9359802646!2d77.313151!3d28.588071!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cef6581d51523%3A0x32335c62dd847564!2sSecurium%20Academy!5e0!3m2!1sen!2sus!4v1741761091222!5m2!1sen!2sus"
            width="100%" height="500px" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <!-- Google Map IFrame End -->
      </div>
    </div>
  </div>
</div>


@endsection