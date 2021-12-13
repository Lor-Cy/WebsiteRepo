<?php $showblog = freddo_options('_onepage_section_blog', ''); ?>
<?php if ($showblog == 1) : ?>
	<?php
		$blogSectionID = freddo_options('_onepage_id_blog', 'blog');
		$blogTitle = freddo_options('_onepage_title_blog', __('About Us', 'freddo'));
		$blogSubTitle = freddo_options('_onepage_subtitle_blog', __('Who We Are', 'freddo'));
		$blogPageBox = freddo_options('_onepage_choosepage_blog');
		$blogButtonText = freddo_options('_onepage_textbutton_blog', __('More Information', 'freddo'));
		$blogButtonLink = freddo_options('_onepage_linkbutton_blog', '#');
	?>
<section class="freddo_onepage_section freddo_blog <?php echo has_post_thumbnail($blogPageBox) ? 'withImage' : 'noImage' ?>" id="<?php echo esc_attr($blogSectionID); ?>">
	<div class="freddo_blog_color"></div>
	<div class="freddo_action_blog">
		<?php if($blogTitle || is_customize_preview()): ?>
			<h2 class="freddo_main_text"><?php echo esc_html($blogTitle); ?></h2>
		<?php endif; ?>
		
		<div class="blog_columns">
			<div class="one blog_columns_three">
				<div class="aboutInner">
					<?php if($blogPageBox) : ?>
				
					<?php
						$args = array(
						  'p'         => intval($blogPageBox),
						  'post_type' => 'page'
						);
						$query = new WP_Query( $args );
						if ( $query->have_posts() ) :
							while ( $query->have_posts() ) :
								$query->the_post();
								?>
								<article id="post-<?php the_ID(); ?>" <?php post_class( 'freddo-blog' ); ?> >
									<?php
									the_content(
										sprintf(
											/* translators: %s: Name of current post */
											__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'freddo' ),
											get_the_title()
										)
									);
									?>
								</article>
								<?php
							endwhile;
						endif;
						wp_reset_postdata();
					?>
					<?php endif; ?>
					<?php if($blogButtonText || is_customize_preview()): ?>
						<div class="freddoButton blog"><a href="<?php echo esc_url($blogButtonLink); ?>"><?php echo esc_html($blogButtonText); ?></a></div>
					<?php endif; ?>
				</div>
			</div>
			<?php if ('' != get_the_post_thumbnail($blogPageBox)) : ?>
				<div class="two blog_columns_three">
					<div class="aboutInnerImage">
						<?php echo get_the_post_thumbnail(intval($blogPageBox), 'large'); ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
<?php endif; ?>