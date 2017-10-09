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
    <div class="thumb">
        <a href="<? echo html_encode(getAlbumURL()); ?>"><? printAlbumThumbImage(getAnnotatedAlbumTitle()); ?></a>
    </div>
    <div class="albumdesc">
        <h3><a href="<? echo html_encode(getAlbumURL()); ?>"><? printAlbumTitle(); ?></a></h3>
        <small><? printAlbumDate(); ?></small>
        <div><? printAlbumDesc(); ?></div>
    </div>
</div>
<? endwhile; ?>

<div id="main" style="display: none;">
    <div id="padbox">
        <?php printGalleryDesc(); ?>
        <div id="albums">
            <?php while (next_album()): ?>
                <div class="album">
                    <div class="thumb">
                        <a href="<?php echo html_encode(getAlbumURL()); ?>" title="<?php echo gettext('View album:'); ?> <?php printAnnotatedAlbumTitle(); ?>"><?php printAlbumThumbImage(getAnnotatedAlbumTitle()); ?></a>
                    </div>
                    <div class="albumdesc">
                        <h3><a href="<?php echo html_encode(getAlbumURL()); ?>" title="<?php echo gettext('View album:'); ?> <?php printAnnotatedAlbumTitle(); ?>"><?php printAlbumTitle(); ?></a></h3>
                        <small><?php printAlbumDate(""); ?></small>
                        <div><?php printAlbumDesc(); ?></div>
                    </div>
                    <p style="clear: both; "></p>
                </div>
            <?php endwhile; ?>
        </div>
        <br class="clearall">
        <?php printPageListWithNav("« " . gettext("prev"), gettext("next") . " »"); ?>
    </div>
</div>
<div id="credit">
    <?php
    if (function_exists('printFavoritesURL')) {
        printFavoritesURL(NULL, '', ' | ', '<br />');
    }
    ?>
    <?php @call_user_func('printUserLogin_out', '', ' | '); ?>
    <?php if (class_exists('RSS')) printRSSLink('Gallery', '', 'RSS', ' | '); ?>
    <?php printCustomPageURL(gettext("Archive View"), "archive"); ?>
    <?php
    if (extensionEnabled('contact_form')) {
        printCustomPageURL(gettext('Contact us'), 'contact', '', '', ' | ');
    }
    ?>
    <?php
    if (!zp_loggedin() && function_exists('printRegisterURL')) {
        printRegisterURL(gettext('Register for this site'), '', ' | ');
    }
    ?>
</div>
<?php @call_user_func('mobileTheme::controlLink'); ?>
<?php @call_user_func('printLanguageSelector'); ?>
<?php
zp_apply_filter('theme_body_close');
?>


</body>
</html>
