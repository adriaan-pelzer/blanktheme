<?php

require_once 'Browser.php';

function browser_specific_stylesheet(){
    $browser = new Browser ();

    switch ($browser->getBrowser()) {
    case Browser::BROWSER_OPERA:
        $stylesheet = 'style_op11.css';
        break;
    case Browser::BROWSER_FIREFOX:
        if ($browser->getVersion() >= 4) {
            $stylesheet = 'style_ff4.css';
        } else if ($browser->getVersion() >= 3.6) {
            $stylesheet = 'style_ff36.css';
        } else {
            $stylesheet = 'style_ff35.css';
        }
        break;
    case Browser::BROWSER_IE:
        if ($browser->getVersion() >= 9) {
            $stylesheet = 'style_ie9.css';
        } else if ($browser->getVersion() >= 8) {
            $stylesheet = 'style_ie8.css';
        } else {
            $stylesheet = 'style_ie7.css';
        }
        break;
    case Browser::BROWSER_SAFARI:
        $stylesheet = 'style_sf5.css';
        break;
    case Browser::BROWSER_CHROME:
        if ($browser->getVersion() >= 13) {
            $stylesheet = 'style_ch13.css';
        } else if ($browser->getVersion() >= 12) {
            $stylesheet = 'style_ch12.css';
        } else if ($browser->getVersion() >= 11) {
            $stylesheet = 'style_ch11.css';
        } else {
            $stylesheet = 'style_ch10.css';
        }
        break;
    default:
        break;
    }

    if ($stylesheet) {
        return '<link rel="stylesheet" href="'.get_bloginfo ('template_url').'/'.$stylesheet.'?ver=1.0" />';
    } else {
        return '<!-- '.$browser->getUserAgent().' -->';
    }
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
<meta charset="utf-8" />
<title><?php wp_title ('&laquo;', true, 'right'); ?><?php bloginfo ('name'); ?></title>
<link rel="stylesheet" href="<?php bloginfo ('stylesheet_url'); ?>" />
<?php echo browser_specific_stylesheet (); ?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
<script src="<?php bloginfo ('template_url'); ?>/js/scripts.js"></script>
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<link rel="shortcut icon" href="<?php bloginfo ('template_url'); ?>/images/favicon.ico" />
<?php wp_head(); ?>
</head>
<body>
<header>
<hgroup>
<h2><?php bloginfo ('description'); ?></h2>
<h1><?php bloginfo ('name'); ?></h1>
</hgroup>
<nav>
<ul>
<?php wp_list_pages ('depth=1&title_li='); ?>
</ul>
</nav>
</header>
