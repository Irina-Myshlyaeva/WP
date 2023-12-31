<?php
/**
 * Template Name: Home Template
 */

get_header(); ?>

<main id="skip-content">
  <section id="top-slider">
    <?php if(get_theme_mod('animal_pet_shop_slider_setting') != ''){ ?>
    <?php $pet_care_zone_slide_pages = array();
      for ( $pet_care_zone_count = 1; $pet_care_zone_count <= 3; $pet_care_zone_count++ ) {
        $pet_care_zone_mod = intval( get_theme_mod( 'animal_pet_shop_top_slider_page' . $pet_care_zone_count ));
        if ( 'page-none-selected' != $pet_care_zone_mod ) {
          $pet_care_zone_slide_pages[] = $pet_care_zone_mod;
        }
      }
      if( !empty($pet_care_zone_slide_pages) ) :
        $pet_care_zone_args = array(
          'post_type' => 'page',
          'post__in' => $pet_care_zone_slide_pages,
          'orderby' => 'post__in'
        );
        $pet_care_zone_query = new WP_Query( $pet_care_zone_args );
        if ( $pet_care_zone_query->have_posts() ) :
          $i = 1;
    ?>
    <div class="owl-carousel" role="listbox">
      <?php  while ( $pet_care_zone_query->have_posts() ) : $pet_care_zone_query->the_post(); ?>
        <div class="slider-box">
          <div class="slideimg">
            <img src="<?php the_post_thumbnail_url('full'); ?>"/>
          </div>
          <div class="slider-inner-box">
            <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
            <p><?php echo esc_html( wp_trim_words( get_the_content(), 30 )); ?><p>
            <div class="slider-btn"><a href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','animal-pet-shop'); ?></a></div>
          </div>
        </div>
      <?php $i++; endwhile;
      wp_reset_postdata();?>
    </div>
    <?php else : ?>
      <div class="no-postfound"></div>
    <?php endif;
    endif;?>
    <?php } ?>
  </section>

<?php if(get_theme_mod('pet_care_zone_pet_product_setting') != ''){ ?>
  <section id="pet-product" class="py-5" product-loop="<?php echo esc_html(get_theme_mod('pet_care_zone_product_loop')); ?>">
    <div class="container">
      <div class="owl-carousel">
        <?php
        if ( class_exists( 'WooCommerce' ) ) {
          $pet_care_zone_args = array(
            'post_type' => 'product',
            'posts_per_page' => get_theme_mod('pet_care_zone_pet_product_number'),
            'product_cat' => get_theme_mod('pet_care_zone_pet_product'),
            'order' => 'ASC'
          );
          $loop = new WP_Query( $pet_care_zone_args );
          while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
            <div class="product-box">
              <div class="product-image">
                <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.esc_url(woocommerce_placeholder_img_src()).'" />'; ?>
              </div>
              <div class="product-content">
                <h3><a href="<?php echo esc_url(get_permalink( $loop->post->ID )); ?>"><?php the_title(); ?></a></h3>
                <?php woocommerce_show_product_sale_flash( $post, $product ); ?>
                <p><?php echo esc_html( wp_trim_words( get_the_content(), 10 )); ?><p>
                <div class="addtocart my-4">
                  <?php if( $product->is_type( 'simple' ) ){ woocommerce_template_loop_add_to_cart( $loop->post, $product ); } ?>
                </div>
              </div>
            </div>
          <?php endwhile; wp_reset_query(); ?>
        <?php } ?>
      </div>
    </div>
  </section>
  <?php } ?>

<?php if(get_theme_mod('animal_pet_shop_service_setting') != ''){ ?>
  <section class="services-sec py-5">
    <div class="container">
      <?php if(get_theme_mod('animal_pet_shop_services_title') != ''){ ?>
        <h3 class="mb-3 text-center"><?php echo esc_html(get_theme_mod('animal_pet_shop_services_title','')); ?></h3>
      <?php }?>
      <?php if(get_theme_mod('animal_pet_shop_services_text') != ''){ ?>
        <p class="mb-5 text-center"><?php echo esc_html(get_theme_mod('animal_pet_shop_services_text','')); ?></p>
      <?php }?>
      <div class="row">
        <?php
          $animal_pet_shop_services_cat = get_theme_mod('animal_pet_shop_services_sec_category','');
          $animal_pet_shop_services_per_page = get_theme_mod('animal_pet_shop_services_per_page',4);
          if($animal_pet_shop_services_cat){
            $animal_pet_shop_page_query5 = new WP_Query(array( 'category_name' => esc_html($animal_pet_shop_services_cat,'animal-pet-shop'),'post_per_page' => esc_attr( $animal_pet_shop_services_per_page )));
            $i=1;
            while( $animal_pet_shop_page_query5->have_posts() ) : $animal_pet_shop_page_query5->the_post(); ?>
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="box-category mb-3">
                  <i class="<?php echo esc_attr(get_theme_mod('animal_pet_shop_services_icon'.$i,'fas fa-cat')); ?>"></i>
                  <h4 class="mb-3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                  <p><?php echo esc_html( wp_trim_words( get_the_content(), 15 )); ?><p>
                  <a href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','animal-pet-shop'); ?></a>
                </div>
              </div>
            <?php $i++; endwhile;
          wp_reset_postdata();
        } ?>
      </div>
    </div>
  </section>
  <?php } ?>

  <section id="content-section" class="container">
    <?php
      if ( have_posts() ) :
        while ( have_posts() ) : the_post();
          the_content();
        endwhile;
      endif;
    ?>
  </section>
</main>

<?php get_footer(); ?>
