<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
	<div>
			<input class="search-job" type="text" value="" name="s" id="s" placeholder="<?php echo pll__( 'Wpisz zawód, słowa kluczowe...' ); ?>" />
			<input class="search-post" type="text" value="" name="s" id="s" placeholder="<?php echo pll__( 'Szukaj' ); ?>" />
			<input type="hidden" name="post_type" value="any" />
		 <button type="submit" id="searchsubmit" class="banner-text-btn"><img src="<?php bloginfo('template_url'); ?>/images/search-arrow.png" alt="search-arrow"></button>
	</div>
</form>
