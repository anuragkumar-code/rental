</div>

<a href="#" id="back-to-top"></a>

<footer class="text-light">
    <div class="container">
        <div class="row g-custom-x">
            <div class="col-lg-3">
                <div class="widget">
                    <h5>About Whip</h5>
                    <p>Where quality meets affordability. We understand the importance of a smooth and enjoyable journey without the burden of excessive costs. That's why we have meticulously crafted our offerings to provide you with top-notch vehicles at minimum expense.</p>
                </div>
            </div>
                    
            <div class="col-lg-3">
                <div class="widget">
                    <h5>Contact Info</h5>
                    <address class="s1">
                        <span><i class="id-color fa fa-map-marker fa-lg"></i>08 W 36th St, New York, NY 10001</span>
                        <span><i class="id-color fa fa-phone fa-lg"></i>+1 333 9296</span>
                        <span><i class="id-color fa fa-envelope-o fa-lg"></i><a href="#" id="support-email"></a></span>
                        <span><i class="id-color fa fa-file-pdf-o fa-lg"></i><a href="#">Download Brochure</a></span>
                    </address>
                </div>
            </div>

            <div class="col-lg-3">
                <h5>Quick Links</h5>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="widget">
                            <ul>
                                <li><a href="#" id="about-link">About</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Careers</a></li>
                                <li><a href="#" >News</a></li>
                                <li><a href="#"  id="faq-link">Faq</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="widget">
                    <h5>Social Network</h5>
                    <div class="social-icons">
                        <a href="#"><i class="fa fa-facebook fa-lg"></i></a>
                        <a href="#"><i class="fa fa-twitter fa-lg"></i></a>
                        <a href="#"><i class="fa fa-linkedin fa-lg"></i></a>
                        <a href="#"><i class="fa fa-pinterest fa-lg"></i></a>
                        <a href="#"><i class="fa fa-rss fa-lg"></i></a>
                    </div>
                </div>    
            </div>
        </div>
    </div>
    <div class="subfooter">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="de-flex">
                        <div class="de-flex-col">
                            <a href="index.php">
                                Copyright 2024 - Whip
                            </a>
                        </div>
                        <ul class="menu-simple">
                            <li><a href="#" id="terms-link">Terms &amp; Conditions</a></li>
                            <li><a href="#" id="privacy-link">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>

<script src="assets/js/plugins.js"></script>
<script src="assets/js/designesia.js"></script>
<script>
    toastr.options = {
    "closeButton": true,
    "progressBar": true,
    "positionClass": "toast-top-right",  // You can change this to 'toast-bottom-right', etc.
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
};
</script>



<script>

$(document).ready(function() {
    fetchAndShowData();
});
                function fetchAndShowData() {
    const aboutUs = localStorage.getItem("about_us");
    const privacyPolicy = localStorage.getItem("privacy_policy");
    const termsCondition = localStorage.getItem("terms_condition");
    const faq = localStorage.getItem("faq");
    const supportEmail = localStorage.getItem("support_email");

    
    const privacyLink = document.getElementById("privacy-link");  
    const aboutLink = document.getElementById("about-link");  
    const termsLink = document.getElementById("terms-link");  
    const faqLink = document.getElementById("faq-link");  
    const supportEmailLink = document.getElementById("support-email");  
  
    
    privacyLink.href = privacyPolicy;
    aboutLink.href = aboutUs;
    termsLink.href = termsCondition;
    faqLink.href = faq;
    supportEmailLink.textContent = supportEmail;
    supportEmailLink.href = `mailto:${supportEmail}`;

}


            </script>
</body>

</html>