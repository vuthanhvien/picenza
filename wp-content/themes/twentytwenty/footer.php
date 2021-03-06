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

		<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5e4ca2fda89cda5a1886bbee/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
 

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

	 
		<script>
			jQuery(document).ready(function() {

		
			// jQuery('.product-popup .image-slide').append('<div class="popup-next-right"><i class="fa fa-chevron-right" /></div>');
			// jQuery('.product-popup .image-slide').prepend('<div class="popup-next-left"><i class="fa fa-chevron-left" /></div>');
			jQuery('.download-btn').append('<i class="fa fa-file-alt"/>');

			jQuery('.image-slide .image-slider-item').click(function(){
				var src = jQuery(this).find('img').attr('src');
				var parent = jQuery(this).parent().parent().children();
				parent.attr('src', src);
				parent[0].srcset = '';
				parent[0].src = src;
			})
			// var positionTemp = 0;
			// jQuery('.image-slide .popup-next-right').on('click', function(){
			// 	var width = jQuery('.image-slider-item').width();
			// 	var parent = jQuery(this).parent().children(); 
			// 	positionTemp = positionTemp + width;
			// 	console.log(positionTemp, parent);
			// 	parent.scrollLeft(positionTemp);
				
			// })

			// jQuery('.image-slide .popup-next-left').on('click', function(){
			// 	var width = jQuery('.image-slider-item').width();
			// 	var parent = jQuery(this).parent().children(); 
			// 	positionTemp = positionTemp - width;
			// 	parent.scrollLeft(positionTemp);
				
			// })


			
			
			// jQuery('.popup-next-right').on('click', function(){
			// 	var width = jQuery('.image-slide-item').width;
			// 	var parent = jQuery(this).parent().children();
			// 	parent.scrollLeft(position + 270);
			// 	position = position + 270;
			// })
			
			
			jQuery('.custom-product-slider ').append('<div class="next-right"><i class="fa fa-chevron-right" /></div>');
			jQuery('.custom-product-slider ').prepend('<div class="next-left"><i class="fa fa-chevron-left" /></div>');
			var position = 0;
			jQuery('.next-right').on('click', function(){
				var width = jQuery('.listing-item').width()  +30;
				var parent = jQuery(this).parent().children(); 
				position = position + width ; 
				parent.scrollLeft(position);
				
			})

			jQuery('.next-left').on('click', function(){
				var width = jQuery('.listing-item').width() + 30 ;
				var parent = jQuery(this).parent().children();
				position = position - width;
				parent.scrollLeft(position);
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

				jQuery('#total-store').html('CÓ '+total+' NHÀ PHÂN PHỐI')
			})
			
				openForm('#form-1')
        });
		function openForm(id){
				jQuery(this).addClass('active')
				jQuery('#form-1').hide();
				jQuery('#form-2').hide();
				jQuery('#form-1-button').removeClass('active');
				jQuery('#form-2-button').removeClass('active');

				jQuery(id).show();
				jQuery(id+'-button').addClass('active');
			}
		</script>
	</body>
</html>
