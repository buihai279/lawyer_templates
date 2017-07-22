<div class="bizzex-navbar-wrap">
  <div class="bizzex-navbar bizzex-navbar-fixed-top">
    <div class="bizzex-navbar-inner max width cf">
      <div class="bizzex-brand-wrap">
        <a href="<?php bloginfo('url'); ?>" class="bizzex-brand text" title="<?php bloginfo('description'); ?>"> <?php  bloginfo('name' ); ?> </a>
      </div>
      <a href="#" class="bizzex-btn-navbar collapsed" data-toggle="collapse" data-target=".bizzex-nav-collapse">
        <i class="bizzex-icon-menu"></i>
        <span class="visually-hidden">Navigation</span>
      </a>
      <nav class="bizzex-nav-collapse collapse" role="navigation">
        <?php 
          $classMenu = (is_front_page()) ? 'bizzex-nav bizzex-nav-scrollspy sf-menu' : 'bizzex-nav sf-menu' ;
          wp_nav_menu( array( 
                'theme_location' => 'header-menu' ,
                'container'=>'',
                'menu_class'=>$classMenu,
                'walker' => new WPDocs_Walker_Nav_Menu()
              ) );
        ?>
      </nav> <!-- end .bizzex-nav-collapse.collapse -->
    </div> <!-- end .bizzex-navbar-inner -->
  </div> <!-- end .bizzex-navbar -->
</div> <!-- end .bizzex-navbar-wrap -->

