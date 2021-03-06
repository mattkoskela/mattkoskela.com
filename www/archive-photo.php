<?php get_header(); ?>

<?php
    $exec_query = new WP_Query( array (
      'post_type' => 'photo'
    ) );

    //* The Loop
    if ( $exec_query->have_posts() ) { ?>
    
        <div class="row">
            <span class="title">
                Photography
            </span>
        </div>
            
        <div class="row">
    
    <?php
    
        while ( $exec_query->have_posts() ): $exec_query->the_post(); ?>
    
            <div class="col-md-4">
                <a href="<?php the_permalink(); ?>">
                    <div class="card" style="background: url('<?php the_post_thumbnail_url(); ?>') no-repeat center;">
                        <div class="card-overlay"></div>
                        <div class="card-box">
                            <div class="card-title"><?php the_title(); ?></div>
                            <div style="color: #FFF; width: 100%; position: absolute; bottom: 15px; text-align: center; font-style: italic;"><?php the_field('shoot_type'); ?></div>
                        </div>
                    </div>
                </a>
            </div>
            
    <?php endwhile; ?>
        </div>
<?php
         //* Restore original Post Data
        wp_reset_postdata();
    }
?>
        
<?php get_footer(); ?>