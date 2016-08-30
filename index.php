<?php get_header(); ?>

<h1>Onze publicaties</h1>

<div class="content">
	<div class="articles">

		<?php get_template_part( 'partials/list' ); ?>

	</div>
	<aside>

		<?php get_template_part( 'partials/widget-categories' ); ?>

	</aside>
</div>
<?php get_footer(); ?>