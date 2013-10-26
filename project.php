<?php
/*
Template Name: Project Page
*/
 
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

add_action( 'genesis_before_loop', 'child_project_page_title' );
function child_project_page_title() {
	echo '<h1 class="project-page-title">Projects</h1>';
}

remove_action('genesis_loop', 'genesis_do_loop');//remove genesis loop
add_action('genesis_loop', 'special_loop');//add the special loop

function special_loop() {
 
    $loop = new WP_Query( array( 'post_type' => 'projects', 'posts_per_page' => 5 ) );
	while ( $loop->have_posts() ) : $loop->the_post(); ?>
        <div id="post-<?php the_ID(); ?>" class="project row">
            <div class="col-sm-5 thumb">
				<?php//use the genesis_get_custom_field template tag to display each custom field value ?>
				<a href="<?php the_permalink(); ?>">
					<img class="img-responsive" src="<?php the_field( 'thumbnail' ); ?>" />
				</a>
			</div>
			<div class="col-sm-7">			
				<h3>
					<a href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
					</a>
				</h3>
           
            	<p class="description">
					<?php the_field( 'description') ; ?>
				</p>
				<p class="project-footer">
					<a href="<?php the_permalink(); ?>">
						<button class="btn btn-default">Continue Reading &rarr;</button>
					</a>
				</p>
            </div><!--end #specials -->
		</div>
    <?php endwhile;?>
    <?php
    }
 
    genesis();