

<div class="footer-top">
    <div class="container-fluid">
        <h3 class="col_sponser">Volg ons!</h3>
        <ul class="list-inline social-icons text-center">
            <li><a target="_blank" href="https://www.facebook.com/Crossinsider-973475589406108/?fref=ts"><i class="fa fa-facebook"></i>Facebook</a></li>
        </ul>
    </div>
</div><!--/.footer-top-->

<footer id="footer">
    <div class="bottom-widgets">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 text-center">
                    <img class="img_footer" src="<?php echo base_url('assets/images/logo1.png'); ?>" alt="">
                    <p class="contact_footer"><i class="fa fa-phone social-icons" aria-hidden="true"></i> Telefoon : 0478 99 57 90 <br>
                        <i class="fa fa-envelope-o social-icons" aria-hidden="true"></i><a href="mailto:info@crossinsider.be" class="footer_mail"> E-mail : info@crossinsider.be</a></p>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container-fluid text-center">
            <p>Copyright &copy; 2016 Designed by <a href="http://www.coodi.be/" target="_blank">COODI</a></p>
        </div>
    </div>
</footer>
</div><!--/#main-wrapper-->


<!--/#scripts-->
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.magnific-popup.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/owl.carousel.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/main.js'); ?>"></script>
<script defer src="<?php echo base_url('assets/js/jquery.flexslider.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/modernizr.js'); ?>"></script>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-73239902-1', 'auto');
    ga('send', 'pageview');

</script>
<script>
    $(document).ready(function() {
        $(window).scroll(function () {
            if ($(this).scrollTop() > 50) {
                $('#back-to-top').fadeIn();
            } else {
                $('#back-to-top').fadeOut();
            }
        });
        // scroll body to 0px on click
        $('#back-to-top').click(function () {
            $('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
        

    });
</script>
<?php echo $extra_js; ?>
</body>
</html>