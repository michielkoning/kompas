	</div>
	<footer>
		<div class="footer-col">
			<h2>Expertises</h2>
			<?php $expertises = get_pages(array(
					'sort_order' => 'asc',
					'sort_column' => 'menu_order',
					'child_of' => EXPERTISE_ID
				)); ?>
			<?php if ($expertises) : ?>

				<ul>

					<?php foreach ( $expertises as $expertise ) : ?>
						<li><a href="<?php echo get_page_link( $expertise->ID ); ?>" title="<?php echo $expertise->post_title;?>"><?php echo $expertise->post_title;?></a></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</div>
		<div class="footer-col">
			<h2>Over Kompas</h2>
			<?php wp_nav_menu( array(
				'theme_location'  => 'footer'
			));?>
		</div>
		<div class="clearfix-footer-cols"></div>
		<div class="footer-col">
			<h2>Adresgegevens</h2>
			<p>
				Kompas advocatuur<br>
				Tivolistraat 6<br>
				5017 HP Tilburg<br>
				KVK nr. 63677776
			</p>
			<p class="contact-info">
				<span class="glyphicon glyphicon-mail"></span><a href="mailto:hoeven@kompas-advocatuur.nl">hoeven@kompas-advocatuur.nl</a><br>
				<span class="glyphicon glyphicon-phone"></span><a href="tel:085 0407406">085 - 04 07 406</a><br>
				<span class="glyphicon glyphicon-mobile"></span><a href="tel:06 83611360">06 - 836 113 60</a><br>
				<span class="glyphicon glyphicon-fax"></span>085 303 7426
			</p>
			<a href="https://maps.google.com?daddr=Uppelse+Vliet+8+Tilburg" title="Routebeschrijving" class="btn" target="_blank">Routebeschrijving</a>
			<!-- div class="follow-us">
				<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/linkedin.svg" alt=""></a>
				<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/facebook.svg" alt=""></a>
			</div-->

		</div>
		<div class="footer-col">
			<h2>Aangesloten bij:</h2>
			<div class="partners">
				<a href="https://www.advocatenorde.nl/" class="partner-advocatenorde" target="_blank" title="Nederlandse orde van advocaten"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-orde-van-advocaten.png" alt="Nederlandse orde van advocaten"></a>
				<a href="http://www.rvr.org/" class="partner-rvr" target="_blank" title="Raad van Rechtsbijstand"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-rvr.png" alt="Raad van Rechtsbijstand"></a>
				<a href="https://www.juridischloket.nl/" class="partner-juridisch-loket" target="_blank" title="Het juridisch loket"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-juridisch-loket.png" alt="Het juridisch loket"></a>
			</div>
		</div>


	</footer>
</div>

<script>
	var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
</script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-83872982-1', 'auto');
  ga('send', 'pageview');
 </script>

<?php wp_footer(); ?>

</body>
</html>