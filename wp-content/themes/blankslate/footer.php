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
$social_accounts['twitter'] 	= get_field('twitter_profile', 'option' );
$social_accounts['facebook'] 	= get_field('facebook_profile', 'option' );
$social_accounts['youtube'] 	= get_field('youtube_profile', 'option' );
$social_accounts['vimeo']    	= get_field('vimeo_profile', 'option' );
$social_accounts['instagram'] 	= get_field('instagram_profile', 'option' );
$social_accounts['linkedin'] 	= get_field('linkedin_profile', 'option' );
$social_accounts['google-plus'] 	= get_field('googleplus_profile', 'option' );
?>

</div>
</div><!-- end of wrapper forces sticky footer-->

<!-- Footer container wrapper-->
<div class="<?php pageWidth();?> no-padding">

  <!-- Footer-->
  <footer id="footer" role="contentinfo" class=' '>

    <div class='c4 island overflow'>
      <div class='container'>

        <?php if($contact_email || $contact_telephone || $street_address_1 || $street_address_2 || $town_city || $county || $postcode || $country):?>
          <div id="address" class='col-12 col-6-m'>
            <div class="vcard text-center text-left-m">
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
                <p class="tel no-dec"><a href='tel:<?php print $contact_telephone; ?>'><?php print $contact_telephone; ?></a></p>
              <?php endif; ?>

              <?php if($contact_email):?>
                <p><a href="mailto:<?php print $contact_email; ?>?Subject=Hello%20<?php print get_bloginfo(name); ?>" target="_top"><?php print $contact_email; ?></a></p>
              <?php endif; ?>

            </div>
          </div>
        <?php endif; ?>

        <!--Social icons-->
        <div id="social-section" class='col-12 col-6-m'>
          <div class='text-center text-right-m'>


            <?php foreach ( $social_accounts AS $network => $account ) : ?>

              <?php if ( false != $account ) : ?>

                <div class="inline <?php echo esc_attr( $network ); ?>">
                  <a href="<?php echo esc_url( $account ); ?>" target="_blank">
                    <i class="fa fa-<?php echo esc_attr( $network ); ?>" aria-hidden="true"></i>
                  </a>
                </div>

              <?php endif; ?>

            <?php endforeach; ?>

          </div>
        </div>

        <!--Footer Menu-->
        <div class="col-12 clear">
          <nav id="footer-menu" role="navigation">
            <?php wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); ?>
          </nav>
        </div>
      </div>
    </div><!-- end of set colour-->

    <!--Footer bottom Menu-->
    <div class='island-half c5'>
      <div class='container overflow'>
        <div id="copyright" class='center left-m text-center text-left-m'>
          Copyright &#169; 2016 <?php echo esc_html( get_bloginfo( 'name' ) ); ?>
        </div>
        <div id="built-by" class='center right-m text-center text-right-m'>
        Designed & Developed by Burfield - <a href='www.google.com'>Web Design Bath</a>
        </div>
      </div>
    </div>

  </footer>
  <!-- End of footer-->
</div>
<!-- Footer container end-->

<?php wp_footer(); ?>
</body>
</html>
