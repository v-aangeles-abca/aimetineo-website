<?php
/**
 * index.php — Blog / fallback template
 */
get_header(); ?>

<main class="site-main">
  <?php if (is_home() || is_archive()): ?>
    <h1 class="page-title"><?php is_archive() ? the_archive_title() : bloginfo('name'); ?></h1>
    <?php if (have_posts()): ?>
      <div class="posts-grid">
        <?php while (have_posts()): the_post(); ?>
          <article class="post-card">
            <?php if (has_post_thumbnail()): ?>
              <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('medium_large', ['class' => 'post-card-img']); ?>
              </a>
            <?php endif; ?>
            <div class="post-card-body">
              <div class="post-card-meta"><?php echo get_the_date(); ?></div>
              <h2 class="post-card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
              <div class="post-card-excerpt"><?php the_excerpt(); ?></div>
            </div>
          </article>
        <?php endwhile; ?>
      </div>
      <?php the_posts_pagination(); ?>
    <?php else: ?>
      <p class="no-posts">No posts found.</p>
    <?php endif; ?>

  <?php elseif (is_single()): ?>
    <?php while (have_posts()): the_post(); ?>
      <h1 class="page-title"><?php the_title(); ?></h1>
      <div class="entry-content"><?php the_content(); ?></div>
    <?php endwhile; ?>

  <?php else: ?>
    <?php while (have_posts()): the_post(); ?>
      <h1 class="page-title"><?php the_title(); ?></h1>
      <div class="entry-content"><?php the_content(); ?></div>
    <?php endwhile; ?>
  <?php endif; ?>
</main>

<?php get_footer(); ?>
