<?php 
    /// Template Name: Generic Page Template
    get_header(); 

while ( have_posts() ) : the_post(); 

?>

<?php 
   get_template_part( 'layout/main-navigation' );  
?>

<div class="page-wrapper background-color-custom overflow-hidden">
  <div class="filter fixed"></div>

     <div class="container generic-container">
        <ul>
            <li>
                <a href="<?php echo site_url('/') ?>">Home</a>
            </li>
            <li><svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 -960 960 960" width="48"><path d="m375-240-43-43 198-198-198-198 43-43 241 241-241 241Z"/></svg></li>
            <li>
                <a href="<?php echo the_permalink() ?>">
                    <?php echo the_title(); ?>
                </a>
            </li>
        </ul>
     </div>

      <div class="generic-single-content">
            <?php the_content(); ?>
      </div>
<?php  
endwhile;
get_footer();