<?php get_header(); ?>

<h1>Probleem tijdens het laden van de pagina</h1>
<div class="content">
	<article>
		<p>De pagina die u zoekt kon niet worden gevonden.</p>
		<p>Suggesties voor een mogelijk vervolg van uw tocht:</p>
		<ul>
			<li><a href="<?php echo home_url(); ?>">Keer terug naar de homepage</a></li>
			<li><a href="javascript:history.back(1)">Keer terug naar de vorige pagina</a></li>
		</ul>

	</article>
</div>

<?php get_footer(); ?>
