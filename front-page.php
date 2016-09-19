<?php get_header(); ?>

<div class="front-page">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<div class="lead">
			<div class="slogan"><?php the_content(); ?></div>
			<a href="<?php echo home_url(); ?>/contact/" class="btn btn-lg btn-lead-top">Nu gratis adviesgesprek aanvragen</a>
		</div>

	<?php endwhile; endif; ?>


	<?php $expertises = get_pages(array(
			'sort_order' => 'asc',
			'sort_column' => 'menu_order',
			'child_of' => EXPERTISE_ID
		)); ?>


	<?php if ($expertises) : ?>

		<div class="blocks expertises-count-<?php echo count($expertises); ?>">

			 <?php if ($expertises) : foreach ( $expertises as $expertise ) : ?>
			 	<?php setup_postdata( $expertise ); ?>

				<div class="block">

					<?php $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($expertise->ID), 'medium' ); ?>
					<div class="bg-image" style="background-image: url('<?php echo $thumbnail[0]; ?>');"><h2><?php echo $expertise->post_title; ?></h2></div>
					<div class="text">

						<?php if (get_field('intro', $expertise->ID)) : ?>
							<?php the_field('intro', $expertise->ID); ?>
						<?php else : ?>
							<?php the_excerpt(); ?>
						<?php endif; ?>
					</div>
					<div class="block-footer">
						<a href="<?php echo get_page_link( $expertise->ID ); ?>" title="Meer over <?php echo strtolower($expertise->post_title);?>" class="btn">Meer over <?php echo strtolower($expertise->post_title);?></a>
					</div>

				</div>
			<?php endforeach; endif; ?>
			<?php wp_reset_postdata(); ?>
		</div>
	<?php endif; ?>

	<div class="lead-bottom">
		<a href="<?php echo home_url(); ?>/contact/" class="btn-lead-bottom btn btn-lg">Nu gratis adviesgesprek aanvragen</a>
	</div>

</div>

<?php get_footer(); ?>
