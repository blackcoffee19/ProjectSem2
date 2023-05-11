<script type="module">
    import { initializeApp } from "https://www.gstatic.com/firebasejs/9.21.0/firebase-app.js";
    import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.21.0/firebase-analytics.js";
    import { getAuth, RecaptchaVerifier, signInWithPhoneNumber } from "https://www.gstatic.com/firebasejs/9.21.0/firebase-auth.js";

    const firebaseConfig = {
        apiKey: "AIzaSyC82UKCr5DrQBKSN5kuX-lxYKJd5X3ZUBM",
        authDomain: "projectfreshshop-384401.firebaseapp.com",
        projectId: "projectfreshshop-384401",
        storageBucket: "projectfreshshop-384401.appspot.com",
        messagingSenderId: "409741585629",
        appId: "1:409741585629:web:219d650679e2174e1eff34",
        measurementId: "G-K9NVB0RHLE"
    };
    const app = initializeApp(firebaseConfig);
    const analytics = getAnalytics(app);
    const auth = getAuth();
    window.recaptchaVerifier = new RecaptchaVerifier('recaptcha-container', {
      'size': 'normal',
      'callback': (response) => {
        // reCAPTCHA solved, allow signInWithPhoneNumber.
        // ...
      },
      'expired-callback': () => {
        // Response expired. Ask user to solve reCAPTCHA again.
        // ...
      }

    }, auth);
    recaptchaVerifier.render().then((widgetId) => {
      window.recaptchaWidgetId = widgetId;
    });
    $("#send_sms").click(function(){
        let number =  $("input[name=register_phone]").val();
        let appVerifier = window.recaptchaVerifier;
        signInWithPhoneNumber(auth, number, appVerifier)
        .then((confirmationResult) => {
            // SMS sent. Prompt user to type the code from the message, then sign the
            // user in with confirmationResult.confirm(code).
            window.confirmationResult = confirmationResult;
            console.log(confirmationResult);
            $("#otp_verify").removeClass('d-none');
            if($("#register_phone").hasClass('text-danger')){
                $("#register_phone").removeClass('text-danger');
            }
            $("#register_phone").addClass('text-success');
            $("#register_phone").text("Message Sent Successfully.");
            // ...
        }).catch((error) => {
            // Error; SMS not sent
            // ...
            console.log("Error: ");
            console.log(error);
            if($("#register_phone").hasClass('text-success')){
                $("#register_phone").removeClass('text-success');
            }
            $("#register_phone").addClass('text-danger');
            $("#error").text(error.message);
            $("#error").show();
        });
        // grecaptcha.reset(window.recaptchaWidgetId);
        
        // Or, if you haven't stored the widget ID:
        // window.recaptchaVerifier.render().then(function(widgetId) {
        //     grecaptcha.reset(widgetId);
        // });
    })
    $('#codeverify').click(function(){
        const code = $("input[name=phone_otp]").val();
        confirmationResult.confirm(code).then((result) => {
            // User signed in successfully.
            const user = result.user;
            console.log(result);

            $("#successRegsiter").text("you are register Successfully.");
            $("#successRegsiter").show();
            // ...
        }).catch((error) => {
            // User couldn't sign in (bad verification code?)
            // ...
            console.log("Error: ");
            console.log(error);
            $("#error").text(error.message);
            $("#error").show();
        });
    })
</script>
