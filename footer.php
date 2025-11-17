<!-- footer -->
<footer class="footer">
  <div class="l-container">
    <div class="footer-inner">
      <div class="footer-site-info">
        <div class="footer-logo">
          <a href="<?php echo esc_url(home_url('/')); ?>">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" width="640" height="84"
              alt="武者への道 Presented by 模写修行" />
          </a>
        </div>

        <p class="footer-site-description"><span>武者への道は駆け出しデザイナー・エンジニアを</span><span>応援するメディアです</span></p>

        <div class="footer-sns">
          <div class="c-sns">
            <a href="https://www.google.com/" class="c-sns-icon" target="_blank" rel="noopener noreferrer">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-sns-twitter.svg" width="400"
                height="400" alt="twitter" />
            </a>

            <a href="https://www.google.com/" class="c-sns-icon" target="_blank" rel="noopener noreferrer">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-sns-facebook.svg" width="1024"
                height="1024" alt="facebook" />
            </a>
          </div>
        </div>
      </div>

      <nav class="footer-nav">
        <?php
        wp_nav_menu(
          array(
            "theme_location" => "footer-menu",
            "container" => false, // 余計なdivを出さない
            "menu_class" => "footer-nav-list",
            "depth" => 1,
            "fallback_cb" => false, // メニューがない場合は何も表示しない
          ));
        ?>
      </nav>
    </div>

    <small class="footer-copyright">&copy; 2024 Road to MUSHA, inc.</small>
  </div>
</footer>
<!-- end footer -->
<?php wp_footer(); ?>
</body>

</html>