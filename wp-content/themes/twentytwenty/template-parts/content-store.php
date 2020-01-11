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
        <a class="button" href="https://www.google.com/maps/search/Picenza" target="_blank"> 
                Định vị những cửa hàng gần bạn
        </a>
    </div>
    <style>
        .banner{
            background-image: url('/wp-content/uploads/2020/01/Screen-Shot-2020-01-11-at-21.24.38.png');
            background-size: cover;
            padding: 200px 0 220px 0;
            text-align: center;
        }
        .form-store{
            max-width: 1200px;
            background: white;
            margin: -65px auto 65px auto;
            padding: 40px;
        }
        .form-store >div{
            display: inline-block;
            padding: 0 15px;
        }
        .form-store >div:nth-child(1),
        .form-store >div:nth-child(2){
            width: 40%;
        }
        .form-store select{
            border: 1px solid #ccc;
            height: 50px;
            padding: 10px 20px;
            width: 100%;
            border-radius: 0;
            text-indent: 30px;

        }
    </style>

    <div class="form-store">
        <div>
            <select>
                <option value="">Chọn tỉnh / Thành phố</option>
                <option value="HN">Hà Nội </option>
                <option value="HCM">Hồ Chí Minh</option>
            </select>
        </div>
        <div>
            <select>
                <option value="">Quận / Huyện</option>
            </select>
        </div>
        <div>
            <button class="button">Tìm cửa hàng</button>
        </div>
    </div>
	  

    <?php
        $query = new WP_Query( 
            array(
                'order'         => 'desc',
                'post_status'   => 'publish',
                'post_type'     => 'store'
                 
            )
		);
        if ($query->have_posts()) {
			echo '<div class="store-list">';

               while ($query->have_posts()) { 
               $query->the_post(); 
               
			   ?>

				<div class="store-detail" id="news-<?php $postId; ?>">
				<a href="<?php the_permalink() ?>"> 
					<?php the_post_thumbnail() ?>
					</a>
					<div class="store-content">
                        <div>
                    <?php the_title('<h3 class="entry-title">', '</h3>' ) ;?>
                    <p> <?php get_post_meta($postId, '', true) ?>321321321321</p>
                    </div>
                    <div>
					<a target="_blank" href="<?php get_post_meta(get_the_ID(),'location', true) ?>"> Xem bản đồ</i></a>
				</div>
				</div>
					
				</div> 
                <?php
			}
            wp_reset_postdata();
			
			echo '</div>';
		
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
