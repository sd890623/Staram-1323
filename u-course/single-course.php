<?php 

/*

 *  Single Event

 */

get_header();

$content_padding = get_post_meta(get_the_ID(),'course-ctpadding',true);



$course_layout = get_post_meta(get_the_ID(),'course-sidebar',true);

if(function_exists('cop_get') && $course_layout=='def'){

	$course_layout =  cop_get('u_course_settings','u-course-layout');

} 

?>
	
	<?php 
	global $page_title;
	get_template_part( 'header', 'heading' ); ?>

	    <div class="page-heading">

        <div class="container">

            <div class="row">

                <div class="col-md-8 col-sm-8">

                    <h1><?php 
				$terms = wp_get_post_terms( get_the_ID(), 'u_course_cat');

				$count = 0; $i=0;

					foreach ($terms as $term) {

						$count ++;

					}

					foreach ($terms as $term) {

						$i++;

						echo '<a href="'.get_term_link($term->slug, 'u_course_cat').'" class="cat-link">'.$term->name.'</a> ';

						if($i!=$count){ echo ', ';}

					}

                     ?></h1>

                </div>

                <?php if(is_active_sidebar('pathway_sidebar')){

                        echo '<div class="pathway pathway-sidebar col-md-4 col-sm-4 hidden-xs text-right">';

                            dynamic_sidebar('pathway_sidebar');

                        echo '</div>';

                    }else{?>

                <div class="pathway col-md-4 col-sm-4 hidden-xs text-right">

                    <?php if(function_exists('un_breadcrumbs')){ un_breadcrumbs(); } ?>

                </div>

                <?php } ?>

            </div><!--/row-->

        </div><!--/container-->

    </div><!--/page-heading-->

    <div id="body">

    	<div class="container">

        	<?php if($content_padding!='off'){ ?>

        	<div class="content-pad-3x">

            <?php }?>

                <div class="row">

                    <div id="content" class="<?php echo ($course_layout != 'full' )?'col-md-9':'col-md-12' ?><?php echo ($course_layout == 'left') ? " revert-layout":"";?>">

                    <?php 

						if (have_posts()) :

							while (have_posts()) : the_post();?>

							<article class="row single-event-content">

								<div class="col-md-4 col-sm-5">

									<?php get_template_part( 'u-course/single', 'course-meta' ); ?>

								</div>

								<div class="col-md-8 col-sm-7">

									<?php get_template_part( 'u-course/single', 'course-detail' ); ?>

									<?php //comments_template( '', true ); ?>

								</div>

							</article>

							<?php 

							endwhile;

						endif;

						?>

                    </div><!--/content-->

                    <?php if($course_layout!='full'){ get_sidebar(); } ?>

                </div><!--/row-->

            <?php if($content_padding!='off'){ ?>

            </div><!--/content-pad-3x-->

            <?php }?>

        </div><!--/container-->

    </div><!--/body-->
    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/zh_CN/sdk.js#xfbml=1&version=v2.3";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<?php get_footer(); ?>