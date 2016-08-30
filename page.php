<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<h1><?php the_title(); ?></h1>
	<div class="content">
		<article>

			<?php the_content(); ?>

			<p><?php edit_post_link( "Deze pagina bewerken" ); ?> </p>

		</article>

		<aside>

			<?php if  (get_post_ancestors( $post->ID )[0] == EXPERTISE_ID || strtolower(get_the_title()) == "contact" ) : ?>

				<?php $title_addition = ""; ?>

				<div class="widget">

					<?php if  (get_post_ancestors( $post->ID )[0] == EXPERTISE_ID ) : ?>

						<?php $title_addition = " op het gebied van " . strtolower(get_the_title()); ?>

					<?php endif; ?>

					<?php //zonder javascript fallback ?>
					<?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['contact-name'])) : ?>

						<?php submit_ajax_form(); ?>

					<?php else : ?>

						<h3>Neem vrijblijvend contact met ons op<?php echo $title_addition; ?>.</h3>
						<form action="<?php the_permalink() ?>">

							<input type="hidden" name="action" value="submit_ajax_form">
							<input type="hidden" name="security" value="<?php echo wp_create_nonce("submit-form");?>">
							<input type="hidden" name="formkey" value="<?php echo strtolower(get_the_title()); ?>">

							<input type="text" name="contact-name" id="contact-name" placeholder="Uw naam&hellip;" maxlengt="100" required>
							<input type="email" name="contact-email" id="contact-email" placeholder="Uw e-mailadres&hellip;" maxlengt="100" required>
							<textarea name="contact-comments" id="contact-comments" placeholder="Waar kunnen we u mee helpen<?php echo $title_addition; ?>?" rows="4" required></textarea>

							<p class="form-message">Niet alle velden zijn ingevuld. Controleer alle velden en druk nogmaals op verzenden.</p>

							<input type="submit" value="Verzenden">
						</form>
					<?php endif; ?>
				</div>

			<?php else : ?>

				<?php

					$more_posts = new WP_Query(array(
						'orderby'       =>  'post_date',
						'order'         =>  'DESC',
						'posts_per_page' => 5
					));
				?>

				<?php if ($more_posts->have_posts()) : ?>

					<div class="widget widget-posts">
						<div class="widget-content">
							<h3>Onze publicaties:</h3>

							<ul>
								<?php while ($more_posts->have_posts()) : $more_posts->the_post(); ?>
									<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
								<?php endwhile; ?>
							</ul>
							<a href="<?php echo home_url(); ?>/publicaties" class="btn" title="Alle publicaties">Alle publicaties</a>
						</div>
					</div>
				<?php endif; ?>

				<?php wp_reset_postdata(); ?>

			<?php endif; ?>

		</aside>
	</div>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
