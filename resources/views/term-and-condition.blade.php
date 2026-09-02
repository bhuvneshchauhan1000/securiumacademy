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

        /* ===== Page content ===== */
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

    <!-- ✅ Important Notice Popup -->
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

    <section class="container-fluid" style="width: 1100px;">
        <div class="row">
            <div class="col-md-12">
                <h1 class="hero-title">Securium Academy Term & Conditions</h1>
                <p>Welcome to Securium Academy! By accessing our website and using our services, you agree to comply with
                    and be bound by the following terms and conditions. Please read these carefully.</p>

                <h4>General Permission To Use And Access And Use Limitations</h4>
                <ul>
                    <li><b>Shipping Options:</b> We offer complimentary ground shipping within 1 to 7 business days.
                        In-store collection is also available within the same timeframe. For quicker delivery, next-day and
                        express options are available.</li>
                    <li><b>Packaging:</b> Purchases are delivered in an orange box tied with a Bolduc ribbon, except for
                        specific items.</li>
                    <li><b>Delivery FAQ:</b> For detailed information regarding shipping methods, costs, and delivery times,
                        please refer to our delivery FAQ.</li>
                </ul>

                <h4>Confidential Information</h4>
                <p>Securium Academy accepts the following payment methods:</p>
                <ul>
                    <li><b>Credit Cards:</b> Visa, MasterCard, Discover, American Express, JCB, and Visa Electron. The total
                        amount will be charged to your card upon shipment of your order.</li>
                    <li><b>PayPal:</b> You can shop easily online without entering your credit card details on our website.
                        Your account will be charged once the order is completed. To register for a PayPal account, visit
                        paypal.com.</li>
                </ul>

                <h4>Returns and Refunds</h4>
                <p>Items returned within 14 days of their original shipment date in new condition are eligible for a full
                    refund or store credit. Refunds will be processed back to the original form of payment used for the
                    purchase. Customers are responsible for shipping charges when making returns; shipping and handling fees
                    from the original purchase are non-refundable.</p>

                <h4>Intellectual Property</h4>
                <p>All content provided by Securium Academy—including text, graphics, logos, and software—is the property of
                    Securium Academy or its licensors and is protected by copyright laws. Users are granted a limited
                    license to access and use this content for personal educational purposes only.</p>

                <h4>Security and Storage</h4>
                <p>We prioritize the security of your personal information. All payment transactions are processed through
                    secure servers using industry-standard encryption technology to ensure your data is protected.</p>

                <h4>Limitation of Liability</h4>
                <p>Securium Academy shall not be liable for any direct, indirect, incidental, or consequential damages
                    arising from your use of our services or inability to access them.</p>

                <h4>Governing Law</h4>
                <p>These terms shall be governed by the laws of [Insert Jurisdiction]. Any disputes arising from these terms
                    will be subject to the exclusive jurisdiction of the courts located in [Insert Jurisdiction].</p>

                <h4>Changes to Terms</h4>
                <p>Securium Academy reserves the right to modify these terms at any time. Changes will take effect
                    immediately upon posting on this page. Your continued use of our services after any changes signifies
                    your acceptance of the new terms.</p>

                <h4>Contact Information</h4>
                <p>For any questions regarding these Terms and Conditions, please contact us at [Insert Contact
                    Information]. Feel free to customize any sections as necessary to better fit Securium Academy's policies
                    or specific legal requirements.</p>
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