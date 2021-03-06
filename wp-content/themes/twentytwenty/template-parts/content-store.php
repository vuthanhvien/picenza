<?php
/**
 * The default template for displaying content
 *
 * Used for both singular and index.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<?php
	get_template_part( 'template-parts/entry-header' );
	?>
    <div class="banner">
        <h3>DANH SÁCH NHÀ PHÂN PHỐI PICENZA</h3>
        <a class="button red-bg" href="https://www.google.com/maps/search/Picenza" target="_blank"> 
                Định vị nhà phân phối gần bạn
        </a>
    </div>
    <style>
      
    </style>


    <?php
        $query = new WP_Query( 
            array(
                'order'         => 'asc',
                'post_status'   => 'publish',
                'post_type'     => 'store',
                // 'orderby'       => 'default_date',
                'posts_per_page'   => -1,
            )
		);
        if ($query->have_posts()) {
            
            $addresses = [];
            while ($query->have_posts()) { 
                $query->the_post(); 
                $postId = get_the_ID();
                $code = Array();
                $code[0] = get_post_meta($postId, 'address_code_city', true);
                $code[1] = get_post_meta($postId, 'address_code_district', true);
                if(!$addresses[$code[0]]){
                    $addresses[$code[0]] = [];
                }
                $addresses[$code[0]] = array_merge($addresses[$code[0]], Array($code[1]));
                $addresses[$code[0]] = array_unique($addresses[$code[0]]);
        }
            echo '
                <div class="form-store">
                <div>
                    <select class="city">
                        <option value="">Chọn tỉnh / Thành phố</option> ';
                        foreach($addresses as $add => $addMore){
                            $key = preg_replace('/\s+/', '', $add);
                            echo ' <option value="'.$key.'">'.$add.'</option>';
                        }
                       
            echo    '</select>
                </div>
                <div>
                <select class="select-ditrict" id="selectaddress-" disabled>
                <option value="">Quận / Huyện</option>
                </select>
                ';
                foreach($addresses as $add => $addMore ){
                    $key = preg_replace('/\s+/', '', $add);
                    echo '  <select class="hide select-ditrict" id="selectaddress-'.$key.'">';
                    echo '<option value="">Quận / Huyện</option> ';
                    foreach($addMore as $more ){
                        $keyMore = preg_replace('/\s+/', '', $more);
                        echo ' <option value="'.$keyMore.'">'.$more.'</option>';
                    }
                    echo '  </select>';
                
                }
                echo '</div>
                <div>
                    <button class="button">Tìm nhà phân phối</button>
                </div>
            </div>
            

            <h2 class="title-section" id="total-store">Có '.$query->found_posts.' nhà phân phối </h2>
            <div class="store-list">';

               while ($query->have_posts()) { 
                $query->the_post(); 
                $postId = get_the_ID();
                $address = get_post_meta($postId, 'address', true);
                $phone = get_post_meta($postId, 'phone', true);
                // $location = get_post_meta($postId, 'location', true);
                $location = 'https://www.google.com/maps/search/'.$address;
                $city = get_post_meta($postId, 'address_code_city', true);
                $district = get_post_meta($postId, 'address_code_district', true);
                $code = $city . $district;
                $key = preg_replace('/\s+/', '', $code);
			   ?>

				<div data-key="<?php echo $key ?>" class="store-detail" id="news-<?php $postId; ?>">
				<a> 
					<?php the_post_thumbnail() ?>
					</a>
					<div class="store-content">
                        <div>
                            <?php the_title('<h3 class="entry-title">', '</h3>' ) ;?>
                            <p>SĐT: <strong><?php echo $phone; ?></strong></p>
                            <p>
                                <?php echo $address; ?>
                                <a target="_blank" href="<?php echo $location ?>">Xem bản đồ </a>
                            </p>
                        </div>
					    
                    <div>
				</div>
				</div>
					
				</div> 
                <?php
			}
            wp_reset_postdata();
			
			echo '</div><br><br><br>';
		
		}

		?>
		
		

	<div class="section-inner">
		<?php
		// wp_link_pages(
		// 	array(
		// 		'before'      => '<nav class="post-nav-links bg-light-background" aria-label="' . esc_attr__( 'Page', 'twentytwenty' ) . '"><span class="label">' . __( 'Pages:', 'twentytwenty' ) . '</span>',
		// 		'after'       => '</nav>',
		// 		'link_before' => '<span class="page-number">',
		// 		'link_after'  => '</span>',
		// 	)
		// );

		// edit_post_link();

	 
		?>

	</div><!-- .section-inner -->

	<?php
		get_template_part( 'template-parts/navigation-paging' );
	?>

</article><!-- .post -->
