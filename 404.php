<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package lawyer
 */

get_header(); ?>

<div class="bizzex-main bizzex-container-fluid max width offset" role="main">
    <div class="entry-wrap entry-404">

		<h1>Page Not Found</h1>
		<p class="center-text">
			the page you are looking for might have been removed, had its name changed, or is temporarily unavailable
		</p>

		<p>Please try to search...</p>

		<form method="get" id="searchform" class="form-search" action="<?php echo site_url(); ?>">
		  <label for="s" class="visually-hidden">Search...</label>
		  <input type="text" id="s" class="search-query" name="s" placeholder="Search...">
		  <input type="submit" id="searchsubmit" class="hidden" name="submit" value="Search...">
		</form>
    
    </div>
  </div>
<?php get_footer(); ?>