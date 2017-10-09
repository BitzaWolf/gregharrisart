<?php
// force UTF-8 Ø

if (!defined('WEBPATH'))
    die();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="<?php echo LOCAL_CHARSET; ?>">
    <?php zp_apply_filter('theme_head'); ?>
    <?php printHeadTitle(); ?>
    <link rel="stylesheet" href="<?php echo pathurlencode($zenCSS); ?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo pathurlencode(dirname(dirname($zenCSS))); ?>/common.css" type="text/css" />
    <?php if (class_exists('RSS')) printRSSHeaderLink('Gallery', gettext('Gallery RSS')); ?>
</head>
<body>


<?php zp_apply_filter('theme_body_open'); ?>
<header>
    <span class="site-header-title">Greg Harris Art</span>
	<nav>
		<? while (next_album()): ?>
			<a href="<? echo html_encode(getAlbumURL()); ?>"><? printAlbumTitle(); ?></a>
		<? endwhile; ?>
	</nav>
</header>


<? while (next_album()): ?>
<div class="title-page-album" style="background-image: url('<? echo getCustomAlbumThumb(1200); ?>')">
    <a href="<? echo html_encode(getAlbumURL()); ?>"><? printAlbumTitle(); ?></a>
</div>
<hr class="title-page-album-seperator" />
<? endwhile; ?>


<footer>
	<div class="copyright">
		&copy; Greg Harris  <? echo date("Y"); ?>
	</div>
	<div class="bitzawolf">
		<a href="http://bitzawolf.com">Website Design by Bitzawolf</a>
	</div>
</footer>


<? @call_user_func('mobileTheme::controlLink'); ?>
<? @call_user_func('printLanguageSelector'); ?>
<? zp_apply_filter('theme_body_close'); ?>


</body>
</html>
