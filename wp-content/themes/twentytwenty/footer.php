<?php
/**
 * The template for displaying the footer
 *
 * Contains the opening of the #site-footer div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

?>
			<footer id="site-footer" role="contentinfo" class="header-footer-group">
				<div class="section-inner">
					<div class="footer-credits">
						<p class="footer-copyright">
							&copy; Picenza Vietnam. All Right Reserved 2020.
						</p><!-- .footer-copyright -->
					</div><!-- .footer-credits -->
				</div><!-- .section-inner -->
			</footer><!-- #site-footer -->
		<?php wp_footer(); ?>

		<style>
			.custom-product-slider {
				position: relative;
				margin-left: 0!important;
			}

			.custom-product-slider  .display-posts-listing{
				margin: 0!important;
			}
			.custom-product-slider .next-right{
				right: 0px;

			}
			.custom-product-slider .next-left{
				left: 0px;

			}
			.custom-product-slider .next-right,
			.custom-product-slider .next-left{
				position: absolute;
				height: 50px;
				width: 30px;
				background: #0003;
				top: calc(50% - 25px);
				color: white;
				padding: 10px 5px;
				cursor: pointer;
			}
			.custom-product-slider .next-right:hover,
			.custom-product-slider .next-left:hover{
				background: #0004;
			}
			</style>
	 
		<script>
			jQuery('.custom-product-slider ').append('<div class="next-right"><i class="fa fa-arrow-right" /></div>');
			jQuery('.custom-product-slider ').prepend('<div class="next-left"><i class="fa fa-arrow-left" /></div>');
			var position = 0;
			jQuery('.next-right').on('click', function(){
				var width = jQuery('.listing-item').width;
				var parent = jQuery(this).parent().children();
				parent.scrollLeft(position + 200);
				position = position + 200;
			})

			jQuery('.next-left').on('click', function(){
				var width = jQuery('.listing-item').width;
				var parent = jQuery(this).parent().children();
				parent.scrollLeft(position - 200);
				position = position - 200;
			})
			jQuery('.form-store .city').change(function(){
				var id = jQuery(this).val();
				jQuery('.select-ditrict').hide();
				jQuery('#selectaddress-'+id).show();
			})
			jQuery('.form-store button').click(function(){
				var city = jQuery('.form-store .city').val();
				var ditrict = jQuery('#selectaddress-'+city).val();

				var total = 0;

				jQuery('.store-detail').map(function(){
					var store = jQuery(this);
					var key = store.data('key');
					if(key.indexOf(city) > -1 && key.indexOf(ditrict) > -1 ){
						store.show();
						total = total+ 1;
					}else{
						store.hide();
					}
				})

				jQuery('#total-store').html('CÓ '+total+' CỬA HÀNG')
			})
		</script>
	</body>
</html>
