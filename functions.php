<?php
    /**
     * mm-cv-resume-theme functions and definition
     *
     * @package my-cv-resume-them
     */

    /**
     * Sets the maximum content width based on the theme's design and stylesheet
     * This will limit the width of all uploaded images and embeds.
     */
    if ( ! isset( $content_width ) )
        $content_width = 800; /* pixels */

    if (! function_exists('mm_cv_resume_theme_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     */
    function mm_cv_resume_theme_setup() {
        /**
         * Make theme available for translation.
         * Translations can be placed in the /languages/ directory.
         */
        load_theme_textdomain( 'mm-cv-resume-theme', get_template_directory() . '/languages' );
        register_nav_menus( array(
            'primary' => __('Primary Menu', 'mm-cv-resume-theme'),
        ));
    }
    endif;
    add_action( 'after_setup_theme', 'mm_cv_resume_theme_setup' );
    /* URL DEFINES */
    const mm_cv_resume_theme_GITHUB_URL = 'https://github.com/MukendiMputu/my-cv-resume-theme';

    /* Theme Credit link */
   function mm_cv_resume_theme_credit_link() {
    echo esc_html_e( 'Design & Developed by','Mukendi Mputu'). "<a href=".esc_url(mm_cv_resume_theme_GITHUB_URL)." target='_blank'> Github</a>";
   }

   /* Breadcrumb Begin */
   function mm_cv_resume_theme_breadcrumb() {
    if (!is_home()) {
      echo '<a href="';
        echo esc_url(home_url());
      echo '">';
        bloginfo('name');
      echo "</a> ";
      if (is_category() || is_single()) {
        the_category(', ');
        if (is_single()) {
          echo "<span> ";
            the_title();
          echo "</span> ";
        }
      } elseif (is_page()) {
        the_title();
      }
    }
   }