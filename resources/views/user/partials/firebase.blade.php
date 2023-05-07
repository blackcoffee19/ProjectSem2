<script>
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
    window.onload=function () { render();};
    const render =()=>{
        window.recaptchaVerifier=new firebase.auth.RecaptchaVerifier('recaptcha-container');
        recaptchaVerifier.render();
    }
    $("#send_sms").click(()=> {
        let number = $("input[name=register_phone]").val();
        firebase.auth().signInWithPhoneNumber(number,window.recaptchaVerifier).then(function (confirmationResult) {
            window.confirmationResult=confirmationResult;
            coderesult=confirmationResult;
            console.log(coderesult);
            if($("#register_phone").hasClass('text-danger')){
                $("#register_phone").removeClass('text-danger');
            }
            $("#register_phone").addClass('text-success');
            $("#register_phone").text("Message Sent Successfully.");
        }).catch(function (error) {
            if($("#register_phone").hasClass('text-success')){
                $("#register_phone").removeClass('text-success');
            }
            $("#register_phone").addClass('text-danger');
            $("#error").text(error.message);
            $("#error").show();
        });
    })
    const codeverify=()=>{
        let code = $("#verificationCode").val();
        coderesult.confirm(code).then(function (result) {
            let user=result.user;
            console.log(user);
            $("#successRegsiter").text("you are register Successfully.");
            $("#successRegsiter").show();
        }).catch(function (error) {
            $("#error").text(error.message);
            $("#error").show();
        });
    }
</script>