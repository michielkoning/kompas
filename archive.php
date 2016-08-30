<?php get_header(); ?>

<?php if (is_category()) : ?>
	<h1>Onze publicaties over <?php echo strtolower(single_cat_title('', false)); ?></h1>
<?php elseif (is_author()) : ?>
	<h1>De publicaties van <?php the_author(); ?></h1>
<?php endif; ?>

<div class="content">

	<div class="articles">

		<?php get_template_part( 'partials/list' ); ?>

	</div>
	<aside>

		<?php if (is_category()) : ?>

			<?php get_template_part( 'partials/widget-categories' ); ?>

		<?php else : ?>

			<div class="widget widget-author">
				<div class="image"><?php echo get_wp_user_avatar( get_the_author_meta( 'ID' ), 'medium' ); ?></div>

				<h2 class="author-heading"><?php printf( 'Over %s', get_the_author() ); ?></h2>

				<p><?php echo get_the_author_meta( 'intro' ) ; ?></p>
				<p class="contact-info">
					<span class="glyphicon glyphicon-mail"></span><a href="mailto:<?php echo esc_attr( get_the_author_meta( 'email', $user->ID ) ); ?>"><?php echo esc_attr( get_the_author_meta( 'email', $user->ID ) ); ?></a><br>
				</p>
				<a class="btn" href="<?php echo site_url(); ?>/advocaten#<?php echo get_the_author_meta( 'nicename' ); ?>">
					<?php printf( 'Lees meer over %s', get_the_author() ); ?>
				</a>
			</div>

		<?php endif; ?>

	</aside>
</div>
<?php get_footer(); ?>