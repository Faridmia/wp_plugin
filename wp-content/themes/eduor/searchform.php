<div class="sc-searchbar-area sc-mb-30 p-z-idex d-flex align-items-center justify-content-end">
	<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<div class="input-field">
			<input type="search" id="<?php echo esc_attr( uniqid( 'search-form-' ) ); ?>"  placeholder="<?php esc_attr_e( 'Search', 'eduor' ); ?>" value="<?php echo get_search_query(); ?>" name="s" required="">
		</div>
		<div class="sc-submit sc-primary-btn">
			<i class="icon-search"></i>
			<input type="submit" id="submitOne" value="Subscribe Now">
		</div>
	</form>
</div>