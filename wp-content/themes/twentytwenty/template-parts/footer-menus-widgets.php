<?php
/**
 * Displays the menus and widgets at the end of the main element.
 * Visually, this output is presented as part of the footer element.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

$has_footer_menu = has_nav_menu( 'footer' );
$has_social_menu = has_nav_menu( 'social' );

$has_sidebar_1 = is_active_sidebar( 'sidebar-1' );
$has_sidebar_2 = is_active_sidebar( 'sidebar-2' );
$has_sidebar_3 = is_active_sidebar( 'sidebar-3' );
$has_sidebar_4 = is_active_sidebar( 'sidebar-4' );
$has_sidebar_top = is_active_sidebar( 'sidebar-top' );

$slug = get_permalink();

$urlArray = parse_url($slug);
$path = $urlArray['path'];

$page= 'home';
if(strpos($path,"/gioi-thieu") > -1 || strpos($path,"/tin-tuc") > -1){
	$page= 'intro';
}
if(strpos($path,"/san-pham") > -1 ){
	$page = 'product';
}
// Only output the container if there are elements to display.
if ( $has_footer_menu || $has_social_menu || $has_sidebar_1 || $has_sidebar_2 ||  $has_sidebar_3 || $has_sidebar_4 ) {
	?>

	<div class="footer-nav-widgets-wrapper header-footer-group" id="custom-footer">
		<?php if ( $has_sidebar_top ) { ?>
			<div class="form-action-switch-out" id="lien-he">
				<div class="form-action-switch">
				<button onclick="openForm('#form-1')" id="form-1-button"  >
				<img class="active" src="/wp-content/uploads/2020/01/comment-2.png" />
				<img src="/wp-content/uploads/2020/01/comment-1.png" />
				 Thắc mắc cá nhân</button>
				<button onclick="openForm('#form-2')"  id="form-2-button" >
				<img class="active" src="/wp-content/uploads/2020/01/shop.png" />
				<img src="/wp-content/uploads/2020/01/shop-1.png" />
				Đăng ký đại lý</button>
				</div>
			</div>
			<div id="contact-form">
				<div class="section-inner">
					<div class="footer-widgets-wrapper">
						<div class="footer-widgets column-one grid-item">
							<div id="form-1">
							<?php echo do_shortcode( '[contact-form-7 id="52" title="Để lại thông tin"]' ); ?>
							</div>
							<div id="form-2">
							<?php echo do_shortcode( '[contact-form-7 id="282" title="Đăng ký đại lý"]' ); ?>
							</div>
						</div>
						<div class="footer-widgets column-two grid-item">
							<?php if($page == 'home'){
								echo '<img class="info-home" src="/wp-content/uploads/2020/01/info-home-scaled.jpg" />';
							}else if($page == 'product'){
								echo '<img class="info-product" src="/wp-content/uploads/2020/01/info-product.jpg" />';
							}else{
								echo '<img class="info-intro" src="/wp-content/uploads/2020/01/info-intro.jpg" />';
							}
							?>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<div class="footer-inner section-inner">
			<?php
			$footer_top_classes = '';
			$footer_top_classes .= $has_footer_menu ? ' has-footer-menu' : '';
			$footer_top_classes .= $has_social_menu ? ' has-social-menu' : '';

			if ( $has_footer_menu || $has_social_menu ) {
				?>
				<div class="footer-top<?php echo $footer_top_classes; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static output ?>">
					<?php if ( $has_footer_menu ) { ?>

						<nav aria-label="<?php esc_attr_e( 'Footer', 'twentytwenty' ); ?>" role="navigation" class="footer-menu-wrapper">

							<ul class="footer-menu reset-list-style">
								<?php
								wp_nav_menu(
									array(
										'container'      => '',
										'depth'          => 1,
										'items_wrap'     => '%3$s',
										'theme_location' => 'footer',
									)
								);
								?>
							</ul>

						</nav><!-- .site-nav -->

					<?php } ?>
					<?php if ( $has_social_menu ) { ?>

						<nav aria-label="<?php esc_attr_e( 'Social links', 'twentytwenty' ); ?>" class="footer-social-wrapper">

							<ul class="social-menu footer-social reset-list-style social-icons fill-children-current-color">

								<?php
								wp_nav_menu(
									array(
										'theme_location'  => 'social',
										'container'       => '',
										'container_class' => '',
										'items_wrap'      => '%3$s',
										'menu_id'         => '',
										'menu_class'      => '',
										'depth'           => 1,
										'link_before'     => '<span class="screen-reader-text">',
										'link_after'      => '</span>',
										'fallback_cb'     => '',
									)
								);
								?>

							</ul><!-- .footer-social -->

						</nav><!-- .footer-social-wrapper -->

					<?php } ?>
				</div><!-- .footer-top -->

			<?php } ?>

			<?php if ( $has_sidebar_1 || $has_sidebar_2 ||  $has_sidebar_3 || $has_sidebar_4 ) { ?>

				<aside class="footer-widgets-outer-wrapper" role="complementary">

					
						<div class="footer-widgets-wrapper">

						<?php if ( $has_sidebar_1 ) { ?>

							<div class="footer-widgets column-one grid-item">
								<?php dynamic_sidebar( 'sidebar-1' ); ?>
							</div>

						<?php } ?>

						<?php if ( $has_sidebar_2 ) { ?>

							<div class="footer-widgets column-two grid-item">
								<?php dynamic_sidebar( 'sidebar-2' ); ?>
							</div>

						<?php } ?>
						<?php if ( $has_sidebar_3 ) { ?>

							<div class="footer-widgets column-three grid-item">
								<?php dynamic_sidebar( 'sidebar-3' ); ?>
							</div>

						<?php } ?>

						<?php if ( $has_sidebar_4 ) { ?>

							<div class="footer-widgets column-four grid-item">
								<?php dynamic_sidebar( 'sidebar-4' ); ?>
							</div>

						<?php } ?>

					</div><!-- .footer-widgets-wrapper -->

				</aside><!-- .footer-widgets-outer-wrapper -->

			<?php } ?>

		</div><!-- .footer-inner -->

	</div><!-- .footer-nav-widgets-wrapper -->

<?php } ?>
