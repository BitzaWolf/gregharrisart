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
	<?php if (class_exists('RSS')) printRSSHeaderLink('Album', getAlbumTitle()); ?>
</head>
<body>


<? zp_apply_filter('theme_body_open'); ?>
<header>
    <span class="site-header-title">Greg Harris Art</span>
	<nav>
		<a href="/Digital-Art/">Digital Art</a>
		<a href="/Sculptures/">Sculptures</a>
		<a href="/Featured/">Featured</a>
	</nav>
</header>


<div class="sub-albums">
	<? while(next_album()): ?>
		<? printAlbumThumbImage(getAnnotatedAlbumTitle()); ?>
	<? endwhile; ?>
</div>


<div class="images">
	<? while(next_image()): ?>
		<? printImageThumb(getAnnotatedImageTitle()); ?>
	<? endwhile; ?>
</div>


<div class="pagination">
	<? printPageListWithNav("« " . gettext("prev"), gettext("next") . " »"); ?>
</div>


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