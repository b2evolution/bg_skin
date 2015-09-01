<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php wp_head(); ?>
</head>
<body>
<div id="mainwrap">
<div align="center">
<div id="wrap">
	<div id="header">
		<div id="title">
	        <h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
    	    <div class="description"><?php bloginfo('description'); ?></div>
		</div>
		<div id="topright">

		<a href="<?php bloginfo('rss2_url'); ?>" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/rss_top.gif" alt="RSS Feed" width="87" height="100" border="0" /></a> </div>
		<div id="pagenav">
		  <ul>
		    <?php wp_list_pages('title_li'); ?>
		  </ul>
	    </div>
		<div id="rss"><a href="<?php bloginfo('rss2_url'); ?>" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/rss_bottom.gif" alt="RSS Feed" width="87" height="35" border="0" /></a> </div>
	</div><!-- end of header -->


	<div id="main"><!-- Important for back-office editing -->
	<h1></h1>
	  <p></p>
	</div>
<?php get_sidebar();?>
	<div id="content">
      	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>

			<div class="post" id="post-<?php the_ID(); ?>">
            	<small><?php the_time('m.j.Y') ?></small>
				<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
				<div class="entry">
					<?php the_content('Read the rest of this entry &raquo;'); ?>
				</div>
				<div class="postmetadata">
					<?php the_tags('Tags: ', ', ', '<br />'); ?> <?php the_category(', ') ?>  |
                    <!-- | by <?php the_author() ?> --> <?php edit_post_link('Edit', '', ' | '); ?>  
                    <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?>
                </div>
                <?php comments_template(); // Get wp-comments.php template ?>
			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>

	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>

	<?php endif; ?>
	</div>
	<div id="footer">
	BG <a href="http://jump2top.com/themes/" target="_blank">WordPress Theme</a> by <a href="http://jump2top.com" target="_blank">SEO Company</a></div>
</div><!-- end of wrap -->
</div><!-- end of center -->
</div><!-- end of mainwrap -->
</body>
</html>
