<?php
//single content featured image
global $post;
$format = get_post_format();
if($format == 'gallery'){
	wp_enqueue_style( 'lightbox2', get_template_directory_uri() . '/js/colorbox/colorbox.css');
	wp_enqueue_script( 'colorbox', get_template_directory_uri() . '/js/colorbox/jquery.colorbox-min.js', array('jquery'), '', true );
	$images=get_children('post_type=attachment&numberposts=-1&post_mime_type=image&post_parent='.get_the_ID());
	if(count($images) > 0){ ?>
	<div class="is-carousel single-carousel post-gallery content-image" id="post-gallery-<?php the_ID() ?>">
	<?php
	foreach((array)$images as $attachment_id => $attachment){
		$image = wp_get_attachment_image_src( $attachment_id, 'full' ); ?>
		<div class="single-gallery-item single-gallery-item-<?php echo $attachment_id ?>">
        	<a href="<?php echo get_permalink($attachment_id); ?>" class="colorbox-grid" data-rel="post-gallery-<?php the_ID() ?>" data-content=".single-gallery-item-<?php echo $attachment_id ?>">
        	<img src='<?php echo $image[0]; ?>'>
            </a>
            <div class="hidden">
                <div class="popup-data dark-div">
                    <?php $thumbnail = wp_get_attachment_image_src($attachment_id,'full', true); ?>
                    <img src="<?php echo $thumbnail[0] ?>" width="<?php echo $thumbnail[1] ?>" height="<?php echo $thumbnail[2] ?>" title="<?php the_title_attribute(); ?>" alt="<?php the_title_attribute(); ?>">
                    <div class="popup-data-content">
                        <h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
                        <div><?php the_excerpt(); ?></div>
                        <a class="btn btn-default" href="javascript:void(0)" data-toggle="collapse" data-target="#share-in-popup-<?php echo $attachment_id;?>"><?php _e('SHARE','cactusthemes'); ?> <i class="fa fa-share"></i></a>
                        <a href="<?php echo get_permalink($attachment_id); ?>#comment" class="btn btn-default popup-gallery-comment" title="<?php _e('View comments','cactusthemes'); ?>"><?php _e('COMMENTS','cactusthemes'); ?></a>
                        <div id="share-in-popup-<?php echo $attachment_id;?>" class="popup-share collapse">
                            <ul class="list-inline social-light">
                                <?php cactus_social_share($attachment_id); ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div><!--/hidden-->
        </div>
    <?php }//foreach attachments ?>
	</div><!--/is-carousel-->
<?php
	}
}else if($format == 'video'|| $format == 'audio'){?>
	<div class="content-image">
			<?php
				preg_match("/<embed\s+(.+?)>/i", $post->post_content, $matches_emb); if(isset($matches_emb[0])){ echo $matches_emb[0];}
				preg_match("/<source\s+(.+?)>/i", $post->post_content, $matches_sou) ;
				preg_match('/\<object(.*)\<\/object\>/is', $post->post_content, $matches_oj); 
				preg_match('/<iframe.*src=\"(.*)\".*><\/iframe>/isU', $post->post_content, $matches);
				preg_match_all('#\bhttps?://[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/))#', $post->post_content, $match);

				if(!isset($matches_emb[0]) && isset($matches_sou[0])){
					echo $matches_sou[0];
				}else if(!isset($matches_sou[0]) && isset($matches_oj[0])){
					echo $matches_oj[0];
				}else if( !isset($matches_oj[0]) && isset($matches[0])){
				 	echo $matches[0];
				}else if( !isset($matches[0]) && isset($match[0])){
					foreach ($match as $matc) {
						echo wp_oembed_get($matc[0]);
					}
				}
			?>
    </div><br />
<?php }else {
	$single_show_image = get_post_meta(get_the_ID(),'show_feature_image', true);
	if($single_show_image=='3'){if(function_exists('ot_get_option')){
		$single_show_image = ot_get_option('single_show_image');}
	}
	if($single_show_image!='1'){
		if(has_post_thumbnail()){
			$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(),'full', true); ?>
			<div class="content-image"><img src="<?php echo $thumbnail[0] ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>"></div>
		<?php }
	}
}