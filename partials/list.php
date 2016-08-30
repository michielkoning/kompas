		<?php if ( have_posts() ) : ?>

			<div class="blocks">

				 <?php while ( have_posts() ) : the_post(); ?>

					<div class="block">
						<?php if (has_post_thumbnail()) : ?>

							<?php $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' ); ?>
							<div class="bg-image" style="background-image: url('<?php echo $thumbnail[0]; ?>');"></div>

						<?php endif; ?>
						<div class="text">
							<h2><?php the_title(); ?></h2>
							<?php the_excerpt(); ?>
						</div>
						<div class="block-footer">
							<a href="<?php the_permalink(); ?>" class="btn">Lees meer&hellip;</a>
						</div>
					</div>
			<?php endwhile; ?>
			</div>


			<div class="navigation">
				<div class="page-previous"><?php previous_posts_link( 'Vorige pagina' ); ?></div>
				<div class="page-next"><?php next_posts_link( 'Volgende pagina' ); ?></div>
			</div>

		<?php else : ?>

			<p>Er zijn geen publicaties gevonden op deze pagina.</p>
			<a href="<?php echo home_url(); ?>/publicaties" class="btn" title="Alle publicaties">Terug naar alle publicaties</a>

		<?php endif; ?>