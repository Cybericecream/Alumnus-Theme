<?php
/**
 * The template for displaying the footer. 
 *
 * Comtains closing divs for header.php.
 *
 * For more info: https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */			
 ?>

<footer class="text-center grid-x ">
  <div class="info grid-x">

    <div class="cell small-12 grid-x">
      <div class="cell large-4 small-12 grid-x">

        <div class="cell small-4">
        <h2>Alumni</h2>
        <ul>
          <?php wp_nav_menu(
            array(
                'menu' => __(' Left Footer '),
                'menu_class'     => 'footerLists'
            )
          );?>
        </ul>
        </div>

        <div class="cell small-4">
        <h2>Explore</h2>
        <ul>
          <?php wp_nav_menu(
            array(
                'menu' => __(' Centre Footer '),
                'menu_class'     => 'footerLists'
            )
          );?>
        </ul>
        </div>

        <div class="cell small-4">
        <h2>Account</h2>
        <ul>
          <?php wp_nav_menu(
            array(
                'menu' => __(' Right Footer '),
                'menu_class'     => 'footerLists'
            )
          );?>
        </ul>
        </div>

      </div>
      </div>

    </div>
    <div class="subFooter grid-x">
    <div class="cell small-12 ">

      <!-- <ul class="socialList">
        <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
        <li><a href=""><i class="fab fa-instagram"></i></a></li>
        <li><a href=""><i class="fab fa-twitter"></i></a></li>
        <li><a href=""><i class="fab fa-linkedin-in"></a></i></li>
        <li><a href=""><i class="fab fa-github"></i></a></li>
      </ul> -->
      <p><?php echo get_theme_mod( 'footer_text' ); ?></p>
    </div>
    </div>
</footer>

<?php wp_footer(); ?>
		
        </body>
        
    </html> <!-- end page -->