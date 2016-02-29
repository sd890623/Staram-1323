<?php 

/*

 *  Courses List

 */

get_header();?>

	<?php

	global $page_title;

	$queried_cat = get_queried_object();

	$term_id = $queried_cat->term_id;

	$name = $queried_cat->name;	

	$slug = $queried_cat->slug;

	$page_title = $name; //overwrite page title

	get_template_part( 'header', 'heading' ); ?>

    <div id="body">

    	<div class="container">

        	<div class="content-pad-3x">

            <?php

			$date_format = get_option('date_format'); ?>

             	<div class="row">

                    <div id="content" class="col-md-9">

                    	<!--<h3 class="h2">Falcuty of Law</h3>-->

                        <div class="courses-list">

                         <?php if ( have_posts() ) : ?>

                         <table class="table course-list-table">

                          <thead class="main-color-1-bg dark-div">

                            <tr>

                              <th><?php _e('缩略图','cactusthemes'); ?></th>
                              <th><?php _e('节目名称','cactusthemes'); ?></th>

                              

                              <th><?php _e('发布日期','cactusthemes'); ?></th>

                            </tr>

                          </thead>

                          <tbody>                          

                          <?php

							while ( have_posts() ) : the_post(); 

							$startdate = get_post_meta(get_the_ID(),'u-course-start', true );

							if($startdate){

								$startdate = gmdate("Y-m-d\TH:i:s\Z", $startdate);// convert date ux

								$con_date = new DateTime($startdate);

								$start_datetime = $con_date->format($date_format);

							}
              else $start_datetime='TBA';
              

							$time_duration = get_post_meta(get_the_ID(),'u-course-dur', true );

							 ?>

                                <tr>
                                  <td><a href="<?php echo get_permalink(); ?>"><?php if(has_post_thumbnail(get_the_ID())) echo get_the_post_thumbnail( get_the_ID(), 'thumb_50x50' ); else echo ''; ?></a></td>

                                  <td><a href="<?php echo get_permalink(); ?>"><?php the_title() ?></a></td>

                                 

                                  <td><?php echo $start_datetime; ?></td>

                                </tr>

                            <?php endwhile; ?>

						  <?php endif;

						  wp_reset_postdata(); ?>

                          </tbody>

                        </table>

                        </div><!--/courses-list-->

                         <?php if(function_exists('wp_pagenavi')){

							wp_pagenavi();

						}else{

							cactusthemes_content_nav('paging');

						}?>

                    </div><!--/content-->

                    <?php get_sidebar(); ?>

                 </div><!--/row-->

            </div><!--/content-pad-->

        </div><!--/container-->

    </div><!--/body-->

<?php get_footer(); ?>