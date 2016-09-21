	<!-- Footer
    ================================================== -->

    <footer class="section-footer bg-inverse" role="contentinfo">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-5">
            <div class="media">
              <small class="media-body media-bottom">
                &copy; <?php echo date('Y'); ?> Copyright <?php bloginfo('name'); ?>
              </small>
            </div>
          </div>
          <div class="col-md-6 col-lg-7">
            <ul class="nav nav-inline">
            	<?php chilly_nav( array( 'theme_location' => 'footer-menu' ) );?>
            </ul>
          </div>
        </div>
      </div>
    </footer>
    <?php wp_footer(); ?>
		<!-- analytics -->
		<script>
		(function(f,i,r,e,s,h,l){i['GoogleAnalyticsObject']=s;f[s]=f[s]||function(){
		(f[s].q=f[s].q||[]).push(arguments)},f[s].l=1*new Date();h=i.createElement(r),
		l=i.getElementsByTagName(r)[0];h.async=1;h.src=e;l.parentNode.insertBefore(h,l)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-XXXXXXXX-XX', 'yourdomain.com');
		ga('send', 'pageview');
		</script>
    	
  </body>
</html>
