<?php
//Contact openssl_get_cert_locations
$contact_telephone = get_field('contact_telephone', 'option');
$contact_email = get_field('contact_email', 'option');
$street_address_1 = get_field('street_address_1', 'option');
$street_address_2 = get_field('street_address_2', 'option');
$town_city = get_field('town_city', 'option');
$postcode = get_field('postcode', 'option');
$country = get_field('country', 'option');
//social links
$twitter_profile = get_field('twitter_profile', 'option');
$facebook_profile = get_field('facebook_profile', 'option');
$youtube_profile = get_field('youtube_profile', 'option');
$vimeo_profile = get_field('vimeo_profile', 'option');
$instagram_profile = get_field('instagram_profile', 'option');
$linkedin_profile = get_field('linkedin_profile', 'option');
$googleplus_profile = get_field('googleplus_profile', 'option');
?>

<div class="clear"></div>
</div>
</div><!-- end of wrapper forces sticky footer-->
<div class="<?php pageWidth();?> no-padding">
  <footer id="footer" role="contentinfo" class=' '>

    <div class='c4 island overflow'>
      <div class='container'>

        <?php if($contact_email || $contact_telephone || $street_address_1 || $street_address_2 || $town_city || $county || $postcode || $country):?>
          <div id="address" class='col-12 col-6-tablet'>
            <div class="vcard">
              <p class="adr">

                <?php if($street_address_1):?>
                  <span class="street-address"><?php print $street_address_1; ?></span><br>
                <?php endif; ?>

                <?php if($street_address_2):?>
                  <span class="street-address2"><?php print $street_address_2; ?></span><br>
                <?php endif; ?>

                <?php if($town_city):?>
                  <span class="region"><?php print $town_city; ?></span><br>
                <?php endif; ?>

                <?php if($postcode):?>
                  <span class="postal-code"><?php print $postcode; ?></span><br>
                <?php endif; ?>

                <?php if($country): ?>
                  <span class="country-name"><?php print $country; ?></span>
                <?php endif; ?>

              </p>

              <?php if($contact_telephone):?>
                <p class="tel"><a href='tel:<?php print $contact_telephone; ?>'><?php print $contact_telephone; ?></a></p>
              <?php endif; ?>

              <?php if($contact_email):?>
                <p><a href="mailto:<?php print $contact_email; ?>?Subject=Hello%20<?php print get_bloginfo(name); ?>" target="_top"><?php print $contact_email; ?></a></p>
              <?php endif; ?>

            </div>
          </div>
        <?php endif; ?>

        <?php if($twitter_profile || $facebook_profile || $youtube_profile || $vimeo_profile || $instagram_profile || $linkedin_profile || $googleplus_profile):?>
          <div id="social-section" class='col-12 col-6-tablet'>
            
          </div>
        <?php endif; ?>

        <div class="col-12 clear">
          <nav id="footer-menu" role="navigation">
            <?php wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); ?>
          </nav>
        </div>
      </div>

    </div>

    <div class='island-half c5'>
      <div id="copyright" class='container '>
        <?php echo sprintf( __( '%1$s %2$s %3$s. All Rights Reserved.', 'blankslate' ), '&copy;', date( 'Y' ), esc_html( get_bloginfo( 'name' ) ) ); echo sprintf( __( ' Theme By: %1$s.', 'blankslate' ), '<a href="http://tidythemes.com/">TidyThemes</a>' ); ?>
      </div>
    </div>

  </footer>
</div>

<?php wp_footer(); ?>
</body>
</html>
