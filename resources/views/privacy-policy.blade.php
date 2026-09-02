@extends('layouts.site')
@section('content')

    <style>
        /* ===== Popup Overlay ===== */
        .popup-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            animation: fadeIn 0.4s ease-in-out;
        }

        /* ===== Popup Box ===== */
        .popup-box {
            background: #fff;
            color: #333;
            border-radius: 12px;
            width: 90%;
            max-width: 600px;
            box-shadow: 0 5px 30px rgba(0, 0, 0, 0.2);
            text-align: center;
            padding: 30px 25px;
            position: relative;
            animation: slideDown 0.5s ease;
        }

        /* ===== Popup Header ===== */
        .popup-box h2 {
            color: #c62828;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .popup-box h2 span {
            margin-right: 8px;
            font-size: 26px;
        }

        /* ===== Popup Content ===== */
        .popup-content {
            font-size: 15px;
            line-height: 1.6;
            color: #555;
            text-align: justify;
            margin-bottom: 20px;
        }

        /* ===== Close Button ===== */
        .close-popup {
            background-color: #c62828;
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            transition: 0.3s ease;
        }

        .close-popup:hover {
            background-color: #a11f1f;
        }

        /* ===== Animations ===== */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes slideDown {
            from {
                transform: translateY(-20px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        /* ===== Content Style ===== */
        section {
            max-width: 1100px;
            margin: 50px auto;
            padding: 0 15px;
        }

        h1.hero-title {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 20px;
            color: #222;
        }

        h4 {
            margin-top: 25px;
        }

        p,
        li {
            color: #444;
            font-size: 15px;
            line-height: 1.7;
        }

        ul {
            padding-left: 20px;
        }
    </style>

    <!-- ✅ Auto Popup Modal -->
    <div class="popup-overlay" id="importantNotice">
        <div class="popup-box">
            <h2><span>⚠️</span> Important Notice</h2>
            <div class="popup-content">
                <p><b>Securium Solutions & Securium Academy</b> conducts all official payments only through authorized
                    company accounts.</p>
                <p>If any individual or salesperson requests payment to their personal account, UPI ID, or wallet, please
                    <b>do not proceed</b> — Securium Solutions & Securium Academy will not be responsible for any such
                    unauthorized transactions.
                </p>
                <p>For secure payments, always use the official company payment links or bank details provided by
                    <b>Securium Solutions & Securium Academy.</b>
                </p>
            </div>
            <button class="close-popup" onclick="closePopup()">I Understand</button>
        </div>
    </div>

    <section class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1 class="hero-title">Securium Academy Privacy Policy</h1>

                <p>Here in this Privacy Policy, we have outlined how Securium Academy gathers, uses, and covers your
                    personal information when you visit our website at <b>https://www.securiumacademy.com</b> and utilize
                    our services, including online cybersecurity training.</p>
                <h4><b>⚠️ Important Notice</b></h4>
                <p><b>Securium Solutions & Securium Academy</b> conducts all official payments only through authorized
                    company accounts.</p>

                <p>If any individual or salesperson requests payment to their personal account, UPI ID, or wallet, please
                    <b>do not proceed</b> — Securium Solutions & Securium Academy will not be responsible for any such
                    unauthorized transactions.
                </p>

                <p>For secure payments, always use the official company payment links or bank details provided by
                    <b>Securium Solutions & Securium Academy.</b>
                </p>


                <h4>Information We Collect</h4>
                <p>Here at Securium Academy, we collect different types of information from users as and when they visit our
                    Site for different service needs. We have specified the same below. Take a look.</p>
                <ul>
                    <li><b>Personal Information:</b> This includes any information that specify all the details about you
                        including your name, email address, phone number, and mailing address. All the other details that
                        you provide when filling out forms or subscribing to our different services.</li>
                    <li><b>Usage Data:</b> This includes data about your interactions with our website and Services,
                        including the pages you visit, courses you enroll in, resources you download, and search queries you
                        perform.</li>
                    <li><b>Device Data:</b> We gather information about the device you use to access our Site and Services,
                        including your IP address, device type, operating system, browser type, and unique device
                        identifiers.</li>
                    <li><b>Cookies and Similar Technologies:</b> We utilize cookies and similar tracking technologies to
                        collect data about your browsing activities and preferences. Cookies are small data files stored on
                        your device that help us remember your preferences and track your activity on the Site.</li>
                </ul>

                <h4>How We Use Your Information</h4>
                <p>The information we collect is used for different needs and requirements as specified below. Take a look.
                </p>
                <ul>
                    <li>To provide and operate our Site and Services</li>
                    <li>To process your course enrollments and certifications</li>
                    <li>To send you important updates regarding the Site, Services, and your courses</li>
                    <li>To respond to your inquiries and requests</li>
                    <li>To enhance the Site and Services</li>
                    <li>To send marketing communications (with your consent)</li>
                    <li>To comply with legal and regulatory obligations</li>
                </ul>

                <h4>Sharing Your Information</h4>
                <p>We may share your information with third-party vendors who assist us in providing services such as
                    payment processing, email marketing, and data analytics. These vendors are authorized to use your
                    information solely for the purposes of performing their services for us.</p>

                <p>Additionally, we may disclose your information in the following circumstances:</p>
                <ul>
                    <li>To comply with legal obligations</li>
                    <li>To respond to legal requests such as court orders or subpoenas</li>
                    <li>To protect our rights or property</li>
                    <li>To prevent or investigate fraud or other illegal activities</li>
                </ul>

                <h4>Your Choices</h4>
                <p>You have control over how we use your information. You can:</p>
                <ul>
                    <li>Opt out of receiving marketing communications by following the unsubscribe instructions included in
                        those communications.</li>
                </ul>

                <h4>Data Retention</h4>
                <p>We will retain your personal information only for as long as necessary to fulfill the purposes outlined
                    in this Privacy Policy, comply with legal obligations, resolve disputes, and enforce our agreements.</p>

                <h4>Children's Privacy</h4>
                <p>Our Site and Services are not intended for children under the age of 13. We do not knowingly collect
                    personal information from children under 13. If you are a parent or guardian and believe that your child
                    has provided us with personal information, please contact us. We will take steps to delete such
                    information from our records.</p>

                <h4>Security</h4>
                <p>We implement reasonable security measures to protect your personal information from unauthorized access,
                    disclosure, alteration, or destruction. However, please be aware that no internet transmission or
                    electronic storage method is completely secure.</p>

                <h4>Changes to this Privacy Policy</h4>
                <p>We may update this Privacy Policy periodically. Any changes will be posted on this page. We encourage you
                    to review this Privacy Policy regularly for updates.</p>

                <h4>Contact Us</h4>
                <p>If you have any questions regarding this Privacy Policy or our practices concerning your personal
                    information, please contact us at <b>support@securiumacademy.com</b>. This content is designed to
                    reflect the same value as the original while ensuring uniqueness. You may want to consult a legal
                    professional to ensure compliance with applicable laws and regulations.</p>
            </div>
        </div>
    </section>

    <script>
        // Show popup automatically when page loads
        window.onload = function () {
            document.getElementById("importantNotice").style.display = "flex";
        };

        // Close popup when button clicked
        function closePopup() {
            document.getElementById("importantNotice").style.display = "none";
        }
    </script>

@endsection