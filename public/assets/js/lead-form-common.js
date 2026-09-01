(function () {
  'use strict';

  var OCCUPATIONS = ['Student', 'Fresher', 'Working Professional'];

  function isLeadForm(form) {
    if (form.classList.contains('email-form') || form.dataset.leadSkip === '1') {
      return false;
    }

    var action = (form.getAttribute('action') || '').toLowerCase().split('?')[0].split('#')[0];
    var file = action.split('/').pop() || action;

    return file === 'mail.php' || file === 'maill.php';
  }

  function cleanupStickyRecaptcha(form) {
    if (!skipsRecaptcha(form)) {
      return;
    }

    form.querySelectorAll('.lead-recaptcha-widget, .esf-field--captcha').forEach(function (el) {
      el.remove();
    });
  }

  function cleanupNonLeadFormEnhancements(form) {
    if (isLeadForm(form)) {
      cleanupStickyRecaptcha(form);
      return;
    }

    form.querySelectorAll('.lead-recaptcha-widget').forEach(function (el) {
      el.remove();
    });

    if (form.classList.contains('email-form')) {
      form.querySelectorAll('[name="city"], [name="occupation"]').forEach(function (el) {
        el.remove();
      });
      form.querySelectorAll('input[name="country_code"], input[name="country_name"]').forEach(function (el) {
        el.remove();
      });
    }

    form.classList.remove('lead-standard-form');
    delete form.dataset.leadEnhanced;
    delete form.dataset.leadSubmitBound;
  }

  function ensureHidden(form, name) {
    var field = form.querySelector('input[name="' + name + '"]');
    if (!field) {
      field = document.createElement('input');
      field.type = 'hidden';
      field.name = name;
      form.appendChild(field);
    }
    return field;
  }

  function removeMathCaptcha(form) {
    form.querySelectorAll('.lead-captcha-box, .captcha-box, .exf-captcha').forEach(function (el) {
      if (el.querySelector('.captcha-input, .exf-captcha-input, .lead-captcha-input')) {
        el.remove();
      }
    });
  }

  function hasMathCaptcha(form) {
    return Boolean(form.querySelector('.captcha-question, [data-captcha-question], input[name="captcha_answer"], input[name="captcha_result"]'));
  }

  function generateMathCaptcha(form) {
    var questionEl = form.querySelector('.captcha-question, [data-captcha-question]');
    var answerInput = form.querySelector('input[name="captcha_answer"]');
    var resultInput = form.querySelector('input[name="captcha_result"]');

    if (!questionEl || !answerInput || !resultInput) {
      return;
    }

    var n1 = Math.floor(Math.random() * 9) + 1;
    var n2 = Math.floor(Math.random() * 9) + 1;
    questionEl.innerText = 'Solve: ' + n1 + ' + ' + n2 + ' = ?';
    resultInput.value = String(n1 + n2);
    answerInput.value = '';
  }

  function injectMathCaptcha(form) {
    if (!skipsRecaptcha(form) || hasMathCaptcha(form)) {
      return;
    }

    var wrapper = document.createElement('div');
    wrapper.className = 'lead-captcha-box';
    wrapper.style.margin = '8px 0 12px';
    wrapper.style.padding = '10px 12px';
    wrapper.style.border = '1px solid #dce7f0';
    wrapper.style.borderRadius = '8px';
    wrapper.style.background = '#f8fbff';

    wrapper.innerHTML = '<label style="display:block; margin-bottom:6px; font-weight:600; color:#31415a;">Security check</label>' +
      '<div class="captcha-question" style="margin-bottom:6px; color:#132a7c; font-weight:700;">Solve: 3 + 4 = ?</div>' +
      '<input type="number" name="captcha_answer" class="captcha-input" inputmode="numeric" autocomplete="off" placeholder="Enter answer" required style="width:100%; padding:10px 12px; border:1px solid #c7d4e1; border-radius:6px; background:#fff;">' +
      '<input type="hidden" name="captcha_result" value="">' +
      '<small style="display:block; margin-top:6px; color:#667085;">Enter the result of the math question above.</small>';

    var submitBtn = form.querySelector('[type="submit"]');
    form.insertBefore(wrapper, submitBtn || null);
    generateMathCaptcha(form);
  }

  function validateMathCaptcha(form) {
    if (!skipsRecaptcha(form)) {
      return true;
    }

    var answerInput = form.querySelector('input[name="captcha_answer"]');
    var resultInput = form.querySelector('input[name="captcha_result"]');
    if (!answerInput || !resultInput) {
      return true;
    }

    var entered = (answerInput.value || '').trim();
    if (entered === '') {
      alert('Please solve the captcha before submitting.');
      generateMathCaptcha(form);
      answerInput.focus();
      return false;
    }

    if (entered !== String(resultInput.value)) {
      alert('The captcha answer is incorrect. Please try again.');
      generateMathCaptcha(form);
      answerInput.focus();
      return false;
    }

    return true;
  }

  function getIntlTelInstance(input) {
    if (!input) {
      return null;
    }

    if (input._iti && typeof input._iti.getSelectedCountryData === 'function') {
      return input._iti;
    }

    try {
      if (window.intlTelInput && typeof window.intlTelInput.getInstance === 'function') {
        return window.intlTelInput.getInstance(input);
      }
    } catch (e) {
      // ignore
    }

    try {
      if (window.intlTelInputGlobals && typeof window.intlTelInputGlobals.getInstance === 'function') {
        return window.intlTelInputGlobals.getInstance(input);
      }
    } catch (e) {
      // ignore
    }

    return null;
  }

  function getAllCountryData() {
    try {
      if (window.intlTelInput && typeof window.intlTelInput.getCountryData === 'function') {
        return window.intlTelInput.getCountryData();
      }
    } catch (e) {
      // ignore
    }

    try {
      if (window.intlTelInputGlobals && typeof window.intlTelInputGlobals.getCountryData === 'function') {
        return window.intlTelInputGlobals.getCountryData();
      }
    } catch (e) {
      // ignore
    }

    return [];
  }

  function patchIntlTelInput() {
    if (typeof window.intlTelInput !== 'function') {
      return;
    }

    var factory = window.intlTelInput;

    if (factory.__leadPatched) {
      return;
    }

    factory.__leadPatched = true;

    window.intlTelInput = function (input, options) {
      if (input && input.nodeType === 1) {
        var existing = getIntlTelInstance(input);

        if (existing) {
          return existing;
        }
      }

      return factory(input, options);
    };

    Object.keys(factory).forEach(function (key) {
      if (typeof window.intlTelInput[key] === 'undefined') {
        window.intlTelInput[key] = factory[key];
      }
    });
  }

  patchIntlTelInput();

  function skipsRecaptcha(form) {
    return form.dataset.noRecaptcha === '1' || form.classList.contains('expert-sticky-form');
  }

  function injectRecaptchaWidget(form) {
    if (!window.RECAPTCHA_ENABLED || !window.RECAPTCHA_SITE_KEY || skipsRecaptcha(form)) {
      return;
    }

    if (form.querySelector('.lead-recaptcha-widget')) {
      return;
    }

    var wrap = document.createElement('div');
    wrap.className = 'lead-recaptcha-widget';
    if (form.classList.contains('expert-sticky-form') || form.closest('.desktop-expert-form')) {
      wrap.setAttribute('data-size', 'compact');
    }

    var submitBtn = form.querySelector('[type="submit"]');
    form.insertBefore(wrap, submitBtn || null);
  }

  function renderRecaptchaWidgets() {
    if (!window.RECAPTCHA_ENABLED || typeof window.grecaptcha === 'undefined') {
      return;
    }

    if (typeof window.grecaptcha.render !== 'function') {
      return;
    }

    document.querySelectorAll('.lead-recaptcha-widget:not([data-rendered])').forEach(function (el) {
      if (!el.id) {
        el.id = 'lead-recaptcha-' + Math.random().toString(36).slice(2, 10);
      }

      var options = {
        sitekey: window.RECAPTCHA_SITE_KEY,
        theme: 'light'
      };

      if (el.getAttribute('data-size') === 'compact') {
        options.size = 'compact';
      }

      try {
        var widgetId = window.grecaptcha.render(el.id, options);
        el.setAttribute('data-rendered', '1');
        el.setAttribute('data-widget-id', String(widgetId));
      } catch (err) {
        console.error('reCAPTCHA v2 render failed. Ensure keys are v2 checkbox keys from Google admin.', err);
      }
    });
  }

  window.leadRecaptchaOnload = function () {
    renderRecaptchaWidgets();
  };

  function resetSubmitButton(btn) {
    if (!btn) {
      return;
    }

    btn.disabled = false;

    if (btn.dataset.originalText) {
      btn.innerHTML = btn.dataset.originalText;
    }
  }

  function submitToFormSubmit(formsubmitUrl, fields) {
    return fetch(formsubmitUrl, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json'
      },
      body: JSON.stringify(fields)
    }).then(function (res) {
      return res.json().then(function (data) {
        return { ok: res.ok, data: data };
      });
    });
  }

  function formSubmitSucceeded(data) {
    if (!data) {
      return false;
    }

    var flag = data.success;
    return flag === true || flag === 'true' || flag === 1 || flag === '1';
  }

  function submitLeadViaAjax(form, e) {
    if (e) {
      e.preventDefault();
    }

    var btn = form.querySelector('[type="submit"]');

    if (btn && !btn.disabled) {
      btn.disabled = true;
      btn.dataset.originalText = btn.innerHTML;
      btn.innerHTML = 'Submitting...';
    }

    var action = form.getAttribute('action') || 'mail.php';

    fetch(action, {
      method: 'POST',
      body: new FormData(form),
      credentials: 'same-origin',
      headers: {
        'X-Requested-With': 'XMLHttpRequest',
        'Accept': 'application/json'
      }
    })
      .then(function (res) {
        return res.json().then(function (data) {
          return { ok: res.ok, status: res.status, data: data };
        });
      })
      .then(function (result) {
        if (!result.ok || !result.data) {
          var failMsg = 'Could not submit form. Please try again.';
          if (result.data && result.data.errors && result.data.errors.length) {
            failMsg = result.data.errors.join('\n');
          }
          alert(failMsg);
          resetSubmitButton(btn);
          return;
        }

        if (result.data.formsubmitUrl && result.data.formsubmitFields) {
          return submitToFormSubmit(result.data.formsubmitUrl, result.data.formsubmitFields)
            .then(function (fsResult) {
              if (formSubmitSucceeded(fsResult.data)) {
                window.location.href = result.data.redirect;
                return;
              }

              var fsMsg = (fsResult.data && fsResult.data.message)
                ? fsResult.data.message
                : 'Could not send your enquiry. Please try again or contact us directly.';

              if (fsMsg.indexOf('Activation') !== -1) {
                fsMsg = 'Admin email not activated yet. Check the inbox for ' +
                  (window.LEAD_ADMIN_EMAIL || 'INQUIRY_TO_EMAIL') +
                  ' and click the FormSubmit activation link, then try again.';
              }

              alert(fsMsg);
              resetSubmitButton(btn);
            });
        }

        if (result.data.redirect) {
          window.location.href = result.data.redirect;
          return;
        }

        alert('Could not submit form. Please try again.');
        resetSubmitButton(btn);
      })
      .catch(function () {
        alert('Network error. Please check your connection and try again.');
        resetSubmitButton(btn);
      });
  }

  function validateRecaptcha(form) {
    if (skipsRecaptcha(form)) {
      return true;
    }

    if (!window.RECAPTCHA_ENABLED) {
      alert('Form security (reCAPTCHA) is not configured. Please contact the site administrator.');
      return false;
    }

    var widgetEl = form.querySelector('.lead-recaptcha-widget[data-widget-id]');
    if (!widgetEl || typeof window.grecaptcha === 'undefined') {
      alert('reCAPTCHA is still loading. Please wait a moment and try again.');
      renderRecaptchaWidgets();
      return false;
    }

    var widgetId = parseInt(widgetEl.getAttribute('data-widget-id'), 10);
    var response = window.grecaptcha.getResponse(widgetId);

    if (!response) {
      alert('Please complete the reCAPTCHA verification.');
      return false;
    }

    return true;
  }

  function injectStandardFields(form) {
    if (form.dataset.leadEnhanced === '1' || form.classList.contains('lead-form-ready')) {
      form.dataset.leadEnhanced = '1';
      ensureHidden(form, 'country_code');
      ensureHidden(form, 'country_name');
      if (skipsRecaptcha(form)) {
        injectMathCaptcha(form);
      } else {
        injectRecaptchaWidget(form);
      }
      return;
    }

    if (!isLeadForm(form)) {
      return;
    }

    form.dataset.leadEnhanced = '1';
    form.classList.add('lead-standard-form');

    removeMathCaptcha(form);

    if (!form.querySelector('[name="city"]')) {
      var city = document.createElement('input');
      city.type = 'text';
      city.name = 'city';
      city.placeholder = 'City *';
      city.required = true;
      city.className = form.classList.contains('expert-sticky-form')
        ? 'esf-input'
        : (form.classList.contains('exf-form') ? 'esf-input' : 'form-control');
      var submitBtn = form.querySelector('[type="submit"]');
      form.insertBefore(city, submitBtn || null);
    }

    if (!form.querySelector('[name="occupation"]')) {
      var occupation = document.createElement('select');
      occupation.name = 'occupation';
      occupation.required = true;
      occupation.className = form.classList.contains('expert-sticky-form')
        ? 'esf-input'
        : (form.classList.contains('exf-form') ? 'esf-input' : 'form-control');
      occupation.innerHTML = '<option value="">Current Occupation *</option>';
      OCCUPATIONS.forEach(function (item) {
        var opt = document.createElement('option');
        opt.value = item;
        opt.textContent = item;
        occupation.appendChild(opt);
      });
      var submitBtn2 = form.querySelector('[type="submit"]');
      form.insertBefore(occupation, submitBtn2 || null);
    }

    ensureHidden(form, 'country_code');
    ensureHidden(form, 'country_name');
    injectMathCaptcha(form);
  }

  function inferCountryNameByDialCode(code) {
    if (!code) {
      return '';
    }

    code = code.toString().trim().replace(/^\+/, '');
    if (!code) {
      return '';
    }

    var allData = getAllCountryData();
    for (var i = 0; i < allData.length; i += 1) {
      if (String(allData[i].dialCode) === code) {
        return allData[i].name || '';
      }
    }

    return '';
  }

  function parseIntlTelInputSelectedFlag(phone) {
    if (!phone) {
      return null;
    }

    var itiWrapper = phone.closest('.iti');
    if (!itiWrapper) {
      return null;
    }

    var selectedFlag = itiWrapper.querySelector('.iti__selected-flag');
    if (!selectedFlag) {
      return null;
    }

    var title = selectedFlag.getAttribute('title') || selectedFlag.title || '';
    var match = title.match(/^\s*([^:]+?):\s*\+(\d+)/);
    if (!match) {
      return null;
    }

    return {
      name: match[1].trim(),
      dialCode: '+' + match[2].trim()
    };
  }

  function syncCountryFields(form) {
    var phone = form.querySelector('input[name="phone"]');
    if (!phone) {
      return;
    }

    var countryCodeField = ensureHidden(form, 'country_code');
    var countryNameField = ensureHidden(form, 'country_name');
    var valueChanged = false;

    var iti = getIntlTelInstance(phone);
    if (iti && typeof iti.getSelectedCountryData === 'function') {
      var data = iti.getSelectedCountryData();
      if (data && data.dialCode) {
        countryCodeField.value = '+' + data.dialCode;
        valueChanged = true;
      }
      if (data && data.name) {
        countryNameField.value = data.name;
        valueChanged = true;
      }
    }

    var selectedFlagData = parseIntlTelInputSelectedFlag(phone);
    if (selectedFlagData) {
      if (selectedFlagData.dialCode) {
        countryCodeField.value = selectedFlagData.dialCode;
        valueChanged = true;
      }
      if (selectedFlagData.name) {
        countryNameField.value = selectedFlagData.name;
        valueChanged = true;
      }
    }

    var phoneValue = phone.value.trim();
    var match = phoneValue.match(/^\+(\d{1,3})/);
    if (match) {
      countryCodeField.value = '+' + match[1];
      valueChanged = true;
    }

    var selected = form.querySelector('.selected-country, .exf-country-selected');
    if (selected) {
      var selectedCodeMatch = selected.textContent.match(/\+\d+/);
      if (selectedCodeMatch) {
        countryCodeField.value = selectedCodeMatch[0];
        valueChanged = true;
      }
      var selectedName = selected.textContent.replace(/\+\d+/g, '').trim();
      if (selectedName) {
        countryNameField.value = selectedName;
        valueChanged = true;
      }
    }

    if (!countryNameField.value && countryCodeField.value) {
      countryNameField.value = inferCountryNameByDialCode(countryCodeField.value);
    }

    if (!countryCodeField.value && phoneValue) {
      var directMatch = phoneValue.match(/^\+(\d{1,3})/);
      if (directMatch) {
        countryCodeField.value = '+' + directMatch[1];
      }
    }

    if (!countryNameField.value && countryCodeField.value) {
      countryNameField.value = inferCountryNameByDialCode(countryCodeField.value);
    }

    if (!valueChanged && phoneValue && !countryCodeField.value) {
      var fallbackMatch = phoneValue.match(/^\+(\d{1,3})/);
      if (fallbackMatch) {
        countryCodeField.value = '+' + fallbackMatch[1];
        countryNameField.value = inferCountryNameByDialCode(countryCodeField.value);
      }
    }
  }

  function bindCountryPickers(form) {
    form.querySelectorAll('.country-list div, .exf-country-list div').forEach(function (item) {
      item.addEventListener('click', function () {
        var code = item.getAttribute('data-code') || '';
        ensureHidden(form, 'country_code').value = code;
        ensureHidden(form, 'country_name').value = item.textContent.trim();
      });
    });

    var selected = form.querySelector('.selected-country, .exf-country-selected');
    if (selected) {
      var match = selected.textContent.match(/\+\d+/);
      if (match) {
        ensureHidden(form, 'country_code').value = match[0];
      }
    }
  }

  function initIntlTel(form) {
    var phone = form.querySelector('input[name="phone"]');
    if (!phone || phone.dataset.itiReady === '1' || typeof window.intlTelInput !== 'function') {
      return;
    }

    if (phone.closest('.phone-group') || phone.closest('.lm-phone')) {
      return;
    }

    phone.dataset.itiReady = '1';
    var iti = window.intlTelInput(phone, {
      initialCountry: 'in',
      separateDialCode: true,
      preferredCountries: ['in', 'us', 'gb', 'ae']
    });

    phone._iti = iti;

    function syncCountry() {
      syncCountryFields(form);
    }

    syncCountry();
    phone.addEventListener('countrychange', syncCountry);
    form.addEventListener('submit', syncCountry);
  }

  function initForms() {
    document.querySelectorAll('form').forEach(function (form) {
      cleanupNonLeadFormEnhancements(form);

      if (form.classList.contains('lead-form-ready')) {
        form.dataset.leadEnhanced = '1';
      }

      injectStandardFields(form);
      bindCountryPickers(form);
      initIntlTel(form);
      if (isLeadForm(form) || form.classList.contains('lead-form-ready')) {
        form.addEventListener('submit', function () {
          syncCountryFields(form);
        });
      }

      if (!isLeadForm(form) || form.dataset.leadSubmitBound === '1') {
        return;
      }

      form.dataset.leadSubmitBound = '1';
      form.removeAttribute('onsubmit');

      form.addEventListener('submit', function (e) {
        e.preventDefault();

        if (skipsRecaptcha(form) && !validateMathCaptcha(form)) {
          return;
        }

        if (!skipsRecaptcha(form) && !validateRecaptcha(form)) {
          return;
        }

        submitLeadViaAjax(form, e);
      });
    });

    renderRecaptchaWidgets();
  }

  window.LeadFormCommon = {
    init: initForms,
    renderRecaptchaWidgets: renderRecaptchaWidgets,
    validateRecaptcha: validateRecaptcha
  };

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initForms);
  } else {
    initForms();
  }

  document.addEventListener('click', function () {
    setTimeout(renderRecaptchaWidgets, 300);
  });
})();
