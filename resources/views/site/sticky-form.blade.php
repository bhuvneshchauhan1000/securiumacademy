<div class="expert-sticky-wrapper desktop-expert-form">

  <form action="#" method="post" class="expert-sticky-form">
    @csrf
    <input type="hidden" name="lead_form_context" value="sticky_footer">
    <input type="hidden" name="source" value="sticky_form">

    <div class="esf-grid">

      <div class="esf-field esf-field--name">
        <input type="text" name="name" class="esf-input" placeholder="Full Name *" required>
      </div>

      <div class="esf-field esf-field--email">
        <input type="email" name="email" class="esf-input" placeholder="Email *" required>
      </div>

      <div class="esf-field esf-field--city">
        <input type="text" name="city" class="esf-input" placeholder="City *">
      </div>

      <div class="esf-field esf-field--occupation">
        <select name="occupation" class="esf-input">
          <option value="">Occupation *</option>
          <option value="Student">Student</option>
          <option value="Fresher">Fresher</option>
          <option value="Working Professional">Working Professional</option>
        </select>
      </div>

      <div class="esf-field esf-field--phone">
        <input type="tel" name="phone" id="stickyDesktopPhone" class="esf-input" placeholder="Phone *" required>
      </div>

      <div class="esf-field esf-field--course">
        <select name="query" class="esf-input">
          <option value="">-- Select Course --</option>
          @foreach (\App\Models\Course::where('status','published')->orderBy('name')->get() as $course)
          <option value="{{ $course->name }}">{{ $course->name }}</option>
          @endforeach
          <option value="Other">Other</option>
        </select>
      </div>

      <div class="esf-field esf-field--submit">
        <button type="submit" class="expert-btn" style="margin-bottom: 5px;">Submit</button>
      </div>

    </div>

  </form>
</div>

<!-- ================= MOBILE ================= -->
<div class="expert-mobile-footer">
  <button id="lmOpenBtn">Apply Now</button>
  <button id="zxqfOpenBtnm" style="background:#000; color:#fff;">
    Call Now
  </button>

  <script>
    document.getElementById("zxqfOpenBtnm").addEventListener("click", function () {
      window.location.href = "tel:{{ $site['contact']['phone_link'] }}";
    });
  </script>
</div>

<!-- APPLY POPUP -->
<div class="expert-mobile-popup" id="expertMobilePopup">
  <div class="expert-popup-box">

    <span class="expert-close" id="expertCloseDemo">&times;</span>

    <h3>Book Demo</h3>
    <form action="#" method="post" class="exf-form">
      @csrf
      <input type="hidden" name="lead_form_context" value="mobile_popup">
      <input type="hidden" name="source" value="mobile_popup">

      <input type="text" name="name" class="esf-input" placeholder="Full Name *" required>
      <input type="email" name="email" class="esf-input" placeholder="Email *" required>
      <input type="text" name="city" class="esf-input" placeholder="City *">

      <select name="occupation" class="esf-input">
        <option value="">Current Occupation *</option>
        <option value="Student">Student</option>
        <option value="Fresher">Fresher</option>
        <option value="Working Professional">Working Professional</option>
      </select>

      <input type="tel" name="phone" class="esf-input" placeholder="Phone *" required>

      <select name="query" class="esf-input">
        <option value="">-- Select Course --</option>
        @foreach (\App\Models\Course::where('status', 'published')->orderBy('name')->get() as $course)
        <option value="{{ $course->name }}">{{ $course->name }}</option>
        @endforeach
        <option value="Other">Other</option>
      </select>

      <button type="submit" class="expert-btn" style="width:100%; margin-top:12px;">Submit</button>
    </form>

  </div>
</div>

<script>
(function () {
    var openBtn = document.getElementById("lmOpenBtn");
    var popup = document.getElementById("expertMobilePopup");
    var closeBtn = document.getElementById("expertCloseDemo");
    if (openBtn) openBtn.addEventListener("click", function () { if (popup) popup.style.display = "flex"; });
    if (closeBtn) closeBtn.addEventListener("click", function () { if (popup) popup.style.display = "none"; });
})();
</script>