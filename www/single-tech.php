<?php get_header(); ?>

<div class="row">
    <div class="col-sm-12">
    

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    
        <div class="story-title">
            <h2><?php the_title(); ?></h2>
        </div>
        <div class="story-title">
            <i><?php the_time('l, F jS, Y') ?></i>
        </div>
        
        <div style="margin-top: 30px;">
        
            <?php the_content('<p>Read the rest of this entry &raquo;</p>'); ?>
            
<?php endwhile; ?>
    </div>
<?php else: ?>
    <p>Sorry, no posts matched your criteria.</p>
<?php endif; ?>

     
    </div>

<!--
    <div class="col-sm-3">
        <?php get_sidebar(); ?>
    </div>
-->
</div>

<?php get_footer(); ?>