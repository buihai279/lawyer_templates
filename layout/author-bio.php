 <div class="bizzex-custom-author-bio cf">
    <div class="inner-custom-author-bio cf">
        <div class="author_avatar">
          <?php echo get_avatar( get_the_author_meta('email') , 68 ); ?>
            <div class="bizzex-author-info">
                <h4 class="h-author man"><?php the_author(); ?></h4>
                <p class="p-author-status"></p>
                <div class="author-social"></div>
            </div>
        </div>
        <div class="p-author">
            <p class="man"><?php the_author_meta('description')?></p>
        </div>
    </div>
</div>