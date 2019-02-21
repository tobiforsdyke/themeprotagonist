<?php

// @package themeprotagonist
// Standard Post Format

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header">
    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    <div class="entry-meta">
      <?php echo protagonist_posted_meta(); ?><!-- This function is inside theme-support.php file -->
    </div>
  </header>

  <div class="entry-content">
    <?php if( has_post_thumbnail() ): ?>
      <div class="standard-featured"><?php the_post_thumbnail('thumbnail'); ?></div>
    <?php endif; ?>
    <div class="entry-excerpt"><?php the_excerpt(); ?></div>
    <div class="button-container">
      <a href="<?php the_permalink(); ?>" class="btn btn-outline-primary"><?php _e( 'Read More' ); ?></a>
    </div>
  </div><!-- .entry-content -->

  <footer class="entry-footer">
    <?php echo protagonist_posted_footer(); ?>
  </footer>
</article>
