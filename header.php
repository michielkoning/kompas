<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<link rel="icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicons/favicon.ico" />
	<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicons/favicon-32x32.png" sizes="32x32" />
	<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicons/favicon-16x16.png" sizes="16x16" />


	<?php wp_head(); ?>
</head>
<body <?php body_class( $class ); ?>>

<div class="container">

	<header>

		<a href="<?php echo home_url(); ?>" class="logo"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg" alt=""></a>

		<a href="" class="btn-toggle-menu">Menu
			<div>
				<div></div>
				<div></div>
				<div></div>
			</div>
		</a>

		<div class="nav-clearfix"></div>

		<nav>
			<?php wp_nav_menu( array(
				'theme_location'  => 'header'
			));?>
		</nav>

	</header>

	<?php if (is_home()) : ?>
		<?php $page_for_posts_id = get_option('page_for_posts'); ?>
		<?php $thumbnail = get_mood_image( $page_for_posts_id ); ?>
		<?php $subtitle = get_field('subtitle', $page_for_posts_id); ?>

	<?php elseif (is_404()) : ?>

			<?php $thumbnail = get_mood_image( ); ?>

	<?php else : ?>

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<?php $subtitle = get_field('subtitle'); ?>
			<?php $thumbnail = get_mood_image( $post->ID ); ?>

		<?php endwhile; endif; ?>

	<?php endif; ?>

	<div class="mood" style="background-image: url('<?php echo $thumbnail; ?>');">

		<?php if ($subtitle) : ?>

			<div class="mood-title"><?php echo $subtitle; ?></div>

		<?php endif; ?>
		<?php if (is_front_page() || get_post_ancestors( $post->ID )[0] == EXPERTISE_ID || get_the_ID() == EXPERTISE_ID) : ?>
			<?php
				$expertises = get_pages(array(
				'sort_order' => 'asc',
				'sort_column' => 'menu_order',
				'child_of' => EXPERTISE_ID
				));
			?>

			<?php if ($expertises) : ?>
				<ul class="tabs">
					<?php foreach ( $expertises as $expertise ) : ?>

						<li><a href="<?php echo get_page_link( $expertise->ID ); ?>" title="<?php echo $expertise->post_title;?>"<?php echo (get_the_ID() == $expertise->ID) ? ' class="active"' : ''; ?>><?php echo $expertise->post_title;?></a></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		<?php endif; ?>
	</div>
	<?php rewind_posts(); ?>

	<div class="wrapper">


