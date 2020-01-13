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

	<div class="post-inner <?php echo is_page_template( 'templates/template-full-width.php' ) ? '' : 'thin'; ?> ">

		<div class="entry-content">

			<?php
			if ( is_search() || ! is_singular() && 'summary' === get_theme_mod( 'blog_content', 'full' ) ) {
				the_excerpt();
			} else {
				the_content( __( 'Continue reading', 'twentytwenty' ) );
			}
			?>

		</div><!-- .entry-content -->

	</div><!-- .post-inner -->

    <?php
        $category = $post->post_name;
		$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
        $query = new WP_Query( 
            array(
                'paged'         => $paged, 
                'order'         => 'desc',
				'post_status'   => 'publish',
				'nopaging'		=> false,
                'posts_per_page'=> 12,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'section',
                        'field' => 'slug',
                        'terms' => $category,
                    ),
                ),
            )
		);
        if ($query->have_posts()) {
			echo '<div class="product-list">';

               while ($query->have_posts()) { 
			   $query->the_post(); 
			   $postId = get_the_ID();
			   $price = get_post_meta($postId, 'price', true);
			   $code = get_post_meta($postId, 'code', true);
			   $status = get_post_meta($postId, 'status', true);
			   $output = preg_match_all('#<img(.+?)src=(.+?)\/>#', get_the_content(), $matches);
			   $images = $matches[0];

			   ?>
				<div class="product-detail" id="news-<?php the_ID(); ?>">
					<?php the_post_thumbnail() ?>
					<a class="button" href="#" data-toggle="modal" data-target="#product-<?php echo the_ID() ?>"> Xem chi tiết <i class="fa fa-search"></i></a>
					<div class="product-content">
					<?php the_title('<h2 class="entry-title">', '</h2>' ); ?>
					<p class="price"><?php echo $price ?></p>
					</div>
					
				</div> 

				<div class="modal fade" id="product-<?php echo the_ID() ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
						 	<div class="product-popup">
							 <div class="image">
							 	<?php the_post_thumbnail() ?>
									<div class="image-slide">
							 	<?php the_post_thumbnail() ?>
									<?php 
									foreach ($images as $img) {
										echo '<div class="image-slider-item">'.$img.'</div>';
									}
									 ?>
									</div>
							 </div>
							 <div class="info">
							 <?php the_title('<h2 class="entry-title">', '</h2>' ); ?>
							 <p>Mã sản phẩm: <?php echo  $code ?></p>
							 <p>Tình trạng: <?php echo  $status ?></p>
							 <p class="product-content"><?php echo  $content ?></p>
							 <div class="prodcut-footer">
								 <p><? echo $price ?></p>
								 <div class="shipping" >
									 <img src="/wp-content/uploads/2020/01/Screen-Shot-2020-01-13-at-15.36.33.png" />
									 <p>Giao hàng tận nơi <br> Miễn phí lắp đặt</p>
								 </div>
							 </div>
							 <hr />

							 <div class="button-action">
								 <div class="button-call">
									 <img src="/wp-content/uploads/2020/01/Screen-Shot-2020-01-13-at-15.36.39.png" />
									 <p>0939 832 242</p>
									 <p class="mute">Tư vấn - Hỗ trợ đặt hàng</p>
								 </div>
								 <div class="button bg-red">Đặt mua</div>
								 <input placeholder="Để lại số điện thoại nhận tư vấn" />
								 <div class="button">Đăng ký tư vấn</div>
							 </div>
							 </div>
							 </div>
						</div>
					</div>
				</div>

                <?php
			}
            wp_reset_postdata();
			
			echo '</div>';
		
		}

		$totalPage =  $query->max_num_pages;
		
		echo '<div class="paging-navigation">';
		if( $paged -2 > 0){
			echo '<a href="'. get_permalink() .'?paged='.($paged -2) .'" >' . ($paged - 2) . '</a>';
		} 
		if( $paged - 1 > 0){
			echo '<a href="'. get_permalink() .'?paged='.($paged -1 ).'" >' . ($paged - 1) . '</a>';
		} 
		echo '<a href="'. get_permalink() .'?paged='.$paged.'"  class="current-page"  >' . ($paged) . '</a>';
		if( $paged + 1 <= $totalPage){
			echo '<a href="'. get_permalink() .'?paged='.($paged + 1) .'" >' . ($paged + 1) . '</a>';
		} 
		if( $paged + 2 <= $totalPage){
			echo '<a href="'. get_permalink() .'?paged='.($paged + 2) .'" >' . ($paged + 2) . '</a>';
		} 
		echo '</div>';
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
