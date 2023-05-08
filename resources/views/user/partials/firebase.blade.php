<script type="module">
    import { initializeApp } from "https://www.gstatic.com/firebasejs/9.21.0/firebase-app.js";
    import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.21.0/firebase-analytics.js";

    const firebaseConfig = {
        apiKey: "AIzaSyC82UKCr5DrQBKSN5kuX-lxYKJd5X3ZUBM",
        authDomain: "projectfreshshop-384401.firebaseapp.com",
        projectId: "projectfreshshop-384401",
        storageBucket: "projectfreshshop-384401.appspot.com",
        messagingSenderId: "409741585629",
        appId: "1:409741585629:web:219d650679e2174e1eff34",
        measurementId: "G-K9NVB0RHLE"
    };
  firebase.initializeApp(firebaseConfig);
    const app = initializeApp(firebaseConfig);
    const analytics = getAnalytics(app);
</script>
<script  type="text/javascript">
const render =()=>{
    window.recaptchaVerifier=new firebase.auth.RecaptchaVerifier('recaptcha-container');
    recaptchaVerifier.render();
};
window.onload=function () { render();};
</script>