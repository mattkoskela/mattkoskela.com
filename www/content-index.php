<?php
    $exec_query = new WP_Query( array (
      'post_type' => 'tech',
      'posts_per_page' => 6
    ) );

    //* The Loop
    if ( $exec_query->have_posts() ) { ?>
    
        <div class="row">
            <span class="title">
                <a href="/tech">
                    Tech
                </a>
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
                            <div class="card-date"><?php //the_date(); ?></div>
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
        
        
<?php
    $exec_query = new WP_Query( array (
      'post_type' => 'photo',
      'posts_per_page' => 6
    ) );

    //* The Loop
    if ( $exec_query->have_posts() ) { ?>
    
        <div class="row">
            <span class="title" style="margin-top: 20px;">
                <a href="/photography">
                    Photography
                </a>
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
                            <div class="card-date"><?php //the_date(); ?></div>
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

</div>