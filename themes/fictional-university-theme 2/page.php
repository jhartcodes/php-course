<?php

  get_header();
// https://developer.wordpress.org/reference/functions/have_posts/  loop referencence.
  while(have_posts()) {
    the_post(); ?>
<div class="page-banner">
    <div class="page-banner__bg-image"
        style="background-image: url( <?php echo get_theme_file_uri('/images/ocean.jpg') ?>)"></div>
    <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title"><?php the_title();?></h1>
        <div class="page-banner__intro">
            <p>DONT FORGET TO REPLACE ME LATER </p>
        </div>
    </div>
</div>

<div class="container container--narrow page-section">

    <?php

    // the parent variable calls a wp function with another wp function, get always returns a the value, 
      $theParent = wp_get_post_parent_id(get_the_ID());
      if ($theParent) { ?>
    <div class="metabox metabox--position-up metabox--with-home-link">
        <p><a class="metabox__blog-home-link" href="<?php echo get_permalink($theParent); ?>"><i class="fa fa-home"
                    aria-hidden="true"></i> Back to <?php echo get_the_title($theParent); ?></a> <span
                class="metabox__main"><?php the_title(); ?></span></p>
    </div>
    <?php }
    ?>

    <?php
    // if current page has children this array will retrun all the children, if not then it returns 0, we can use this to dynamically render the breadcrumb if the id has a parent.
    $testArray = get_pages(array(
      'child_of' => get_the_ID()
    ));
    
    if ($theParent or $testArray) { ?>
    <div class="page-links">
        <!-- get the title page returns 0 if its a parent and the function will return the current page-->
        <h2 class="page-links__title"><a
                href="<?php  echo get_permalink($theParent);?>"><?php echo get_the_title($theParent);?> </a></h2>
        <ul class="min-list">
            <?php 
            // if there are no children the findChildren of function doesn't run. 
          if ($theParent){
          $findChildrenOf = $theParent;
          } else {
              $findChildrenOf = get_the_ID();
          }  
            wp_list_pages( array(
              'title_li' => NULL,
              'child_of' => $findChildrenOf,
              'sort_colum' => 'menu_order'
            ))?>
        </ul>
    </div>
    <div class="generic-content">
        <?php the_content()?>
    </div>
</div>
<?php }?>
<?php }

  get_footer();

?>