<footer class="footer">
    <!-- Discount Section -->
    <div class="discount-section">
        <h2>Get In Touch <span class="underline"></span></h2>
        <p>Protect your data from cyber threats with advanced security solutions. <strong>Stay safe online and </strong>
            secure your digital world.</p>
        <form class="email-form" action="{{ url('enquiry') }}" method="POST">
            @csrf
            <input type="hidden" name="source" value="footer_newsletter">
            <input type="email" name="email" placeholder="Enter your email" required>
            <button type="submit">Get started</button>
        </form>

    </div>

    <!-- Footer Linkss -->
    <div class="footer-grid">
        <div class="footer-column">
            <h4>Stay Updated</h4>
            <p>We are a leading provider of cybersecurity training and certification.</p>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d112108.48399506616!2d77.313151!3d28.588071!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cef6581d51523%3A0x32335c62dd847564!2sSecurium%20Academy!5e0!3m2!1sen!2sus!4v1748251438102!5m2!1sen!2sus"
                width="300" height="200" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="footer-column">
            <h4>Quick Links</h4>
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('about') }}">About Us</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
                <li><a href="{{ url('blog') }}">Blog</a></li>
                <li><a href="{{ url('career') }}">Career</a></li>
                <li><a href="{{ url('vapt-intern') }}">vapt internship</a></li>
                <li><a href="{{ url('terms-conditions') }}">Terms & Conditions</a></li>
                <li><a href="{{ url('privacy-policy') }}">Privacy Policy</a></li>
            </ul>
        </div>
        <div class="footer-column">
            <h4>We Offer</h4>
            <ul>
                <li><a href="{{ url('course/oscp-certifications-training') }}">OSCP</a></li>
                <li><a href="{{ url('course/ceh-v13-ai-certification-training') }}">CEH V13</a></li>
                <li><a href="{{ url('course/winter-cybersecurity-internship') }}">Winter Internship</a></li>
                <li><a href="{{ url('course/winter-cybersecurity-internship') }}">Cyber Security Training & Internship
                        Program</a></li>
                <li><a href="{{ url('course/certified-web3-0-security-professional') }}">Certified Web 3.0 Security
                        Professional</a></li>
            </ul>
        </div>
        <div class="footer-column">
            <h4>Office Address</h4>
            <ul class="address-info">
                <li>
                    <i class="fas fa-map-marker-alt"></i>
                    India Office Address:- {{ $site['address']['india'] }}
                </li>
                <li>
                    <i class="fas fa-map-marker-alt"></i>
                    Dubai: {{ $site['address']['dubai'] }}
                </li>

                <li>
                    <i class="fas fa-map-marker-alt"></i>
                    US: {{ $site['address']['us'] }}
                </li>
            </ul>
            <div class="footer-content">
                <p>
                    <a href="tel:{{ $site['contact']['phone_link'] }}" class="phone-number">
                        Contact : {{ $site['contact']['phone'] }}
                    </a>
                </p>
            </div>

        </div>

    </div>
    <style>
        .phone-number {
            color: #fff;
            text-decoration: none;
            font-size: 16px;
            font-weight: 500;
            margin-left: 26px;
        }
    </style>
    <!-- Bottom Bar -->
    <div class="footer-bottom">
        <p>© {{ date('Y') }} Securium Academy All Rights Reserved. | Designed by Securium Solutions</p>
        <div class="socials">
            <a href="{{ $site['social']['facebook'] }}"><i class="fab fa-facebook-f"></i></a>
            <a href="{{ $site['social']['twitter'] }}"><i class="fab fa-twitter"></i></a>
            <a href="{{ $site['social']['instagram'] }}"><i class="fab fa-instagram"></i></a>
            <a href="{{ $site['social']['youtube'] }}">
                <i class="fab fa-youtube"></i>
            </a>

            <a href="{{ $site['social']['linkedin'] }}"><i class="fab fa-linkedin-in"></i></a>
        </div>
    </div>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <div class="floating_btn">
        <a target="_blank" href="{{ $site['contact']['whatsapp'] }}">
            <div class="contact_icon">
                <i class="fa fa-whatsapp my-float"></i>
            </div>
        </a>
        <p class="text_icon">Talk to us?</p>
    </div>


</footer>

<style>
    .footer {
        background: #0f172a;
        color: #fff;
        padding: 50px 20px;
    }

    .discount-section {
        background: #08697c;
        padding: 18px 30px;
        border-radius: 20px;
        text-align: center;
        color: #fff;
        margin: 0 auto 50px;
        max-width: 800px;
        width: 100%;
    }

    .discount-section h2 {
        font-size: 28px;
        font-weight: 600;
        margin-bottom: 15px;
        position: relative;
    }

    .discount-section .underline {
        display: block;
        width: 60px;
        height: 3px;
        background: #fff;
        margin: 10px auto 0;
        border-radius: 2px;
    }

    .discount-section p {
        font-size: 15px;
        max-width: 650px;
        margin: 0 auto 25px;
    }

    .email-form {
        display: flex;
        justify-content: center;
        gap: 12px;
        flex-wrap: wrap;
    }

    .email-form input {
        padding: 12px 18px;
        border-radius: 25px;
        border: none;
        width: 404px;
        max-width: 100%;
    }

    .email-form button {
        background: #000;
        color: #fff;
        padding: 12px 24px;
        border: none;
        border-radius: 25px;
        cursor: pointer;
        transition: background 0.3s;
        width: 100%;
        max-width: 154px;
    }

    .email-form button:hover {
        background: #222;
    }

    .footer-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 40px;
        margin-bottom: 30px;
    }

    .footer-column h4 {
        margin-bottom: 12px;
        font-weight: 600;
        font-size: 18px;
    }

    .footer-column ul {
        list-style: none;
        padding: 0;
    }

    .footer-column ul li {
        margin-bottom: 10px;
        font-size: 15px;
    }

    .footer-column ul li a {
        color: #ccc;
        text-decoration: none;
        transition: color 0.3s;
    }

    .footer-column ul li a:hover {
        color: #fff;
    }

    .footer-bottom {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
        font-size: 14px;
        border-top: 1px solid #333;
        padding-top: 20px;
    }

    .socials {
        display: flex;
        gap: 15px;
    }

    .socials a {
        color: #fff;
        font-size: 20px;
        transition: transform 0.3s, color 0.3s;
    }

    .socials a:hover {
        transform: scale(1.1);
        color: #8f71ff;
    }

    @media (max-width: 600px) {
        .footer-bottom {
            flex-direction: column;
            text-align: center;
            gap: 10px;
        }

        .email-form {
            flex-direction: column;
            align-items: center;
        }

        .email-form input,
        .email-form button {
            width: 100%;
            max-width: 320px;
        }
    }

    .address-info li {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        font-size: 15px;
        color: #ccc;
    }

    .address-info li i {
        color: #8f71ff;
        margin-top: 3px;
        font-size: 18px;
    }

    a {
        text-decoration: none;
    }

    .floating_btn {
        position: fixed;
        bottom: 46px;
        width: 100px;
        height: 100px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        z-index: 1000;
    }

    @keyframes pulsing {
        to {
            box-shadow: 0 0 0 30px rgba(232, 76, 61, 0);
        }
    }

    .contact_icon {
        background-color: #42db87;
        color: #fff;
        width: 60px;
        height: 60px;
        font-size: 30px;
        border-radius: 50px;
        text-align: center;
        box-shadow: 2px 2px 3px #999;
        display: flex;
        align-items: center;
        justify-content: center;
        transform: translatey(0px);
        animation: pulse 1.5s infinite;
        box-shadow: 0 0 0 0 #42db87;
        -webkit-animation: pulsing 1.25s infinite cubic-bezier(0.66, 0, 0, 1);
        -moz-animation: pulsing 1.25s infinite cubic-bezier(0.66, 0, 0, 1);
        -ms-animation: pulsing 1.25s infinite cubic-bezier(0.66, 0, 0, 1);
        animation: pulsing 1.25s infinite cubic-bezier(0.66, 0, 0, 1);
        font-weight: normal;
        font-family: sans-serif;
        text-decoration: none !important;
        transition: all 300ms ease-in-out;
    }


    .text_icon {
        margin-top: 8px;
        color: #707070;
        font-size: 13px;
    }
</style>
