<?php get_header(); ?>

<div class="team">

	<?php $users = get_users(); ?>
	<?php foreach ($users as $user) : ?>

		<?php if ($user->display_name != 'admin') : ?>

			<div class="profile">
				<a name="<?php echo $user->user_nicename; ?>"></a>
				<div class="image"><?php echo get_wp_user_avatar( $user->user_email, 'large' ); ?></div>
				<div class="text">
					<h2><?php echo $user->display_name; ?></h2>

					<?php
						$user_description = apply_filters("the_content",$user->user_description);
						echo $user_description;
					?>

					<p class="contact-info">
						<span class="glyphicon glyphicon-mail"></span><a href="mailto:<?php echo esc_attr( get_the_author_meta( 'email', $user->ID ) ); ?>"><?php echo esc_attr( get_the_author_meta( 'email', $user->ID ) ); ?></a><br>
						<?php if ( get_the_author_meta( 'phone', $user->ID )) : ?>
							<span class="glyphicon glyphicon-phone"></span><a href="tel:<?php echo esc_attr( get_the_author_meta( 'phone', $user->ID ) ); ?>"><?php echo esc_attr( get_the_author_meta( 'phone', $user->ID ) ); ?></a><br>
						<?php endif; ?>
						<?php if ( get_the_author_meta( 'linkedin', $user->ID )) : ?>
							<span class="glyphicon glyphicon-linkedin"></span><a href="<?php echo esc_attr( get_the_author_meta( 'linkedin', $user->ID ) ); ?>" target="_blank"><?php echo esc_attr( get_the_author_meta( 'linkedin', $user->ID ) ); ?></a><br>
						<?php endif; ?>
					</p>
					<a href="<?php echo get_author_posts_url( $user->ID ); ?>" class="btn">Bekijk alle publicates van <?php echo $user->display_name; ?></a>
				</div>
			</div>
		<?php endif; ?>
	<?php endforeach; ?>

</div>


<?php get_footer(); ?>