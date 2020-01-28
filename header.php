<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Flash
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
/**
 * WordPress function to load custom scripts after body.
 *
 * Introduced in WordPress 5.2.0
 *
 * @since Flash 1.3.0
 */
if ( function_exists( 'wp_body_open' ) ) {
	wp_body_open();
}
?>

<?php
if ( get_theme_mod( 'flash_disable_preloader', '' ) != 1 ) : ?>
<div id="preloader-background">
	<div id="spinners">
		<div id="preloader">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div>
</div>
<?php endif; ?>

<?php
/**
 * flash_before hook
 */
do_action( 'flash_before' ); ?>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'flash' ); ?></a>

	<?php
	/**
	 * flash_before_header hook
	 */
	do_action( 'flash_before_header' ); ?>
	<div class="onlymobile allcity">
		<div class="head">
			<span>Выберите ваш город</span>
			<div class="close"></div>
		</div>
		<div class="main_allcity">
			<?php wp_nav_menu( [
							'theme_location'  => '',
							'menu'            => 'contacts', 
							'container_class' => '', 
							'container_id'    => '',
							'menu_id'         => '',
							'echo'            => true,
							'before'          => '',
							'after'           => '',
							'link_before'     => '',
							'link_after'      => '',
							'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							'depth'           => 0,
							'walker'          => '',
						] ); ?>
		</div>
		<div class="foot_allcity">
			<span>Вашего города нет в списке?</span>
			<p>Мы работаем по всей стране.<br>(Будет выбран головной офис)</p>
		</div>
	</div>
	<div class="onlymobile main_menu_mobile">
		<div class="bg"></div>
		<div class="close"></div>
		<div class="main_main_menu_mobile">
			<div class="search-box">
				<?php get_search_form(); ?>
			</div>		
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			<?php wp_nav_menu( [
							'theme_location'  => '',
							'menu'            => 'menu1', 
							'container_class' => '', 
							'container_id'    => '',
							'menu_id'         => '',
							'echo'            => true,
							'before'          => '',
							'after'           => '',
							'link_before'     => '',
							'link_after'      => '',
							'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							'depth'           => 0,
							'walker'          => '',
						] ); ?>
			<hr>
			<button class="btn btn-menu">Задать вопрос</button>
			<ul class="mobile_menu_lang">
				<li><a href="ru">RU</a></li>
				<li><a href="en">EN</a></li>
			</ul>
		</div>
		
	</div>
	<header id="masthead" class="site-header" role="banner">
		<?php
		if ( get_theme_mod( 'flash_top_header', '1') == '1' ) : ?>
		<div class="header-top">
			<div class="tg-container">
				<div class="tg-column-wrapper clearfix">
					<div class="left-content">
					</div>
					<div class="right-content">
						<?php wp_nav_menu( [
							'theme_location'  => '',
							'menu'            => 'menu1', 
							'container_class' => '', 
							'container_id'    => '',
							'menu_id'         => '',
							'echo'            => true,
							'before'          => '',
							'after'           => '',
							'link_before'     => '',
							'link_after'      => '',
							'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							'depth'           => 0,
							'walker'          => '',
						] ); ?>
					</div>
				</div>
			</div>
		</div>
		<?php endif; ?>

		<div class="header-bottom">
			<div class="tg-container">

				<div class="logo">
					<?php if( function_exists( 'the_custom_logo' ) && has_custom_logo() ) : ?>
					<figure class="logo-image">
						<?php flash_the_custom_logo(); ?>
						<?php if( get_theme_mod( 'flash_transparent_logo', '') != '') : ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<img class="transparent-logo" src="<?php echo esc_url( get_theme_mod( 'flash_transparent_logo', '' ) ); ?>" />
						</a>
						<?php endif; ?>
					</figure>
					<?php endif; ?>

					<div class="logo-text site-branding">
						<?php
						if ( ( is_front_page() && is_home() ) || ( is_front_page() && !is_home() ) ) : ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php else : ?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php
						endif;

						$description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
							<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
						<?php
						endif; ?>
					</div>
				</div>
				<nav class="site-navigation main-navigation citys onlymobile" role="navigation">
						
						<?php wp_nav_menu( [
							'theme_location'  => '',
							'menu'            => 'contacts', 
							'container_class' => '', 
							'container_id'    => '',
							'menu_id'         => '',
							'echo'            => true,
							'before'          => '',
							'after'           => '',
							'link_before'     => '',
							'link_after'      => '',
							'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							'depth'           => 0,
							'walker'          => '',
						] ); ?>
					</nav>
				<div class="site-navigation-wrapper">
					<!-- #site-navigation -->
					<nav id="site-navigation" class="site-navigation main-navigation" role="navigation">
						<div class="menu-toggle">
							<i class="fa fa-bars"></i>
						</div>
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
					</nav><!-- #site-navigation -->

					<?php $logo_position = get_theme_mod( 'flash_logo_position', 'left-logo-right-menu' ); ?>

					<?php if ( $logo_position == 'center-logo-below-menu' ): ?>
						<div class="header-action-container">
							<?php if( get_theme_mod( 'flash_header_search', '' ) !=  '1' ) : ?>
							<div class="search-wrap">
								<div class="search-icon">
									<i class="fa fa-search"></i>
								</div>
								<div class="search-box">
									<?php get_search_form(); ?>
								</div>
							</div>
							<?php endif; ?>
						</div>
					<?php endif ?>
				</div>

				<div class="header-action-container">
					<?php if( get_theme_mod( 'flash_header_search', '' ) !=  '1' ) : ?>
					<div class="search-wrap ">
						<div class="search-icon search-submit btn search-btn">
							<i class="fa fa-search"></i>
						</div>
						<div class="search-box">
							<?php get_search_form(); ?>
						</div>
					</div>
					<?php endif; ?>
				</div>
				<nav class="site-navigation main-navigation citys pc" role="navigation">
						
						<?php wp_nav_menu( [
							'theme_location'  => '',
							'menu'            => 'contacts', 
							'container_class' => '', 
							'container_id'    => '',
							'menu_id'         => '',
							'echo'            => true,
							'before'          => '',
							'after'           => '',
							'link_before'     => '',
							'link_after'      => '',
							'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							'depth'           => 0,
							'walker'          => '',
						] ); ?>
					</nav><!-- #site-navigation -->
				
			</div>
		</div>
	</header><!-- #masthead -->

	<?php
	/**
	 * flash_after_header hook
	 */
	do_action( 'flash_after_header' ); ?>

	<?php get_template_part( 'template-parts/header-media' ); ?>

	<?php if( !is_front_page() ) : ?>
	<nav id="flash-breadcrumbs" class="breadcrumb-trail breadcrumbs">
		<div class="tg-container">
			<?php flash_page_title(); ?>
			<?php flash_breadcrumbs(); ?>
		</div>
	</nav>
	<?php endif; ?>

	<?php
	/**
	 * flash_before_main hook
	 */
	do_action( 'flash_before_main' ); ?>

	<div id="content" class="site-content">
		<div class="tg-container">
