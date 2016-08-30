<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<h1><?php the_title(); ?></h1>
	<div class="content">
		<article>
			<?php the_content(); ?>

			<div class="meta">
				Geplaatst in <?php the_category(', '); ?>
			</div>
		</article>

		<aside>

			<div class="widget widget-share">
				<div class="widget-content">
					<h3>Deel dit artikel op:</h3>

					<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&amp;p=<?php echo rawurlencode(get_the_title()); ?>" class="btn-share" target="_blank">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/facebook.svg" alt="">
					</a>
					<a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>&amp;title=<?php echo rawurlencode(get_the_title()); ?>&amp;summary=<?php echo rawurlencode(get_the_excerpt()); ?>&amp;source=<?php echo site_url(); ?>" class="btn-share" target="_blank">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/linkedin.svg" alt="">
					</a>
					<a href="http://twitter.com/share?text=<?php echo rawurlencode(get_the_title()); ?>&amp;url=<?php the_permalink(); ?>" class="btn-share" target="_blank">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/twitter.svg" alt="">
					</a>
				</div>
			</div>

			<div class="widget widget-author">
				<div class="image"><?php echo get_wp_user_avatar( get_the_author_meta( 'ID' ), 'medium' ); ?></div>

				<h2 class="author-heading"><?php printf( 'Door %s', get_the_author() ); ?></h2>
				<p><?php echo get_the_author_meta( 'intro' ) ; ?></p>

				<p class="contact-info">
					<span class="glyphicon glyphicon-mail"></span><a href="mailto:<?php echo esc_attr( get_the_author_meta( 'email', $user->ID ) ); ?>"><?php echo esc_attr( get_the_author_meta( 'email', $user->ID ) ); ?></a><br>
				</p>
				<a class="btn" href="<?php echo site_url(); ?>/advocaten#<?php echo get_the_author_meta( 'nicename' ); ?>">
					<?php printf( 'Lees meer over %s', get_the_author() ); ?>
				</a>
			</div>

			<?php

				$more_posts = new WP_Query(array(
					'orderby'       =>  'post_date',
					'order'         =>  'DESC',
					'posts_per_page' => 5,
					'post__not_in' => array($post_ID)
				));
			?>

			<?php if ($more_posts->have_posts()) : ?>

				<div class="widget widget-posts">
					<div class="widget-content">
						<h3>Meer publicaties:</h3>

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


		</aside>
	</div>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
