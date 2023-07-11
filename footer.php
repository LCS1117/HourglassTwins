<?php
/**
 * The template for displaying the footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Susty
 */
?>

</div>

<footer id="colophon">
    <p>Powered by<a href="https://tw.wordpress.org/" target="_blank" title="優雅的個人發布平台">WordPress</a> with Theme <a
                href="https://stephaneliu.com" target="_blank">HourglassTwins</a><br>

        Copyright &copy; <?php echo get22min("found_year", "2021") . ' - ' . date('Y') ?> <?php bloginfo('name') ?>
        <?php get_search_form(); ?>
    </p>

    <p><a class="menu" href="#top"><i class="fas fa-arrow-up"></i> 回到頂部 <i class="fas fa-arrow-up"></i></a></p>
</footer>
</div>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/resource/css/all.min.css">
<?php if (is_single() || is_page()) { ?>
    <script src="<?php echo get_template_directory_uri(); ?>/resource/js/jquery.min.js"></script>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/resource/css/fancybox.min.css">
    <script src="<?php echo get_template_directory_uri(); ?>/resource/js/fancybox.umd.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/resource/js/all.js"></script>
<?php } ?>
<?php if (get22min('analysis_place', '0') == 1) {
    echo get22min("analysis", "");
} ?>
<?php wp_footer(); ?>

</body>
</html>
