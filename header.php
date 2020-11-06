<?php
/**
 * Cocoon WordPress Theme
 * @author: yhira
 * @link: https://wp-cocoon.com/
 * @license: http://www.gnu.org/licenses/gpl-2.0.html GPL v2 or later
 */
if ( !defined( 'ABSPATH' ) ) exit; ?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover"/>

<?php //ヘッドタグ内挿入用のアクセス解析用テンプレート
get_template_part('tmp/head-analytics'); ?>
<?php //AMPの案内タグを出力
if ( has_amp_page() ): ?>
<link rel="amphtml" href="<?php echo get_amp_permalink(); ?>">
<?php endif ?>
<?php //Google Search Consoleのサイト認証IDの表示
if ( get_google_search_console_id() ): ?>
<!-- Google Search Console -->
<meta name="google-site-verification" content="<?php echo get_google_search_console_id() ?>" />
<!-- /Google Search Console -->
<?php endif;//Google Search Console終了 ?>
<?php //preconnect dns-prefetch
$domains = list_text_to_array(get_pre_acquisition_list());
if ($domains) {
  echo '<!-- preconnect dns-prefetch -->'.PHP_EOL;
}
foreach ($domains as $domain): ?>
<link rel="preconnect dns-prefetch" href="//<?php echo $domain; ?>">
<?php endforeach; ?>
<?php //Google Tag Manager
if (is_analytics() && $tracking_id = get_google_tag_manager_tracking_id()): ?>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','<?php echo $tracking_id; ?>');</script>
<!-- End Google Tag Manager -->
<?php endif //Google Tag Manager終了 ?>
<?php //自動アドセンス
get_template_part('tmp/ad-auto-adsense'); ?>
<?php //WordPressが出力するヘッダー情報
wp_head();
?>

<!-- Preload -->
<link rel="preload" as="font" type="font/woff" href="<?php echo FONT_ICOMOON_WOFF_URL; ?>" crossorigin>
<link rel="preload" as="font" type="font/ttf" href="<?php echo FONT_ICOMOON_TTF_URL; ?>" crossorigin>
<?php if (is_site_icon_font_font_awesome_4()): ?>
<link rel="preload" as="font" type="font/woff2" href="<?php echo FONT_AWESOME_4_WOFF2_URL; ?>" crossorigin>
<?php else: ?>
<link rel="preload" as="font" type="font/woff2" href="<?php echo FONT_AWESOME_5_BRANDS_WOFF2_URL; ?>" crossorigin>
<link rel="preload" as="font" type="font/woff2" href="<?php echo FONT_AWESOME_5_REGULAR_WOFF2_URL; ?>" crossorigin>
<link rel="preload" as="font" type="font/woff2" href="<?php echo FONT_AWESOME_5_SOLID_WOFF2_URL; ?>" crossorigin>
<?php endif; ?>

<?php //カスタムフィールドの挿入（カスタムフィールド名：head_custom
get_template_part('tmp/head-custom-field'); ?>

<?php //headで読み込む必要があるJavaScript
get_template_part('tmp/head-javascript'); ?>

<?php //PWAスクリプト
get_template_part('tmp/head-pwa'); ?>

<?php //ヘッドタグ内挿入用のユーザー用テンプレート
get_template_part('tmp-user/head-insert'); ?>

<!--Google-fonts -->
<link href="https://fonts.googleapis.com/css?family=M+PLUS+Rounded+1c" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Sawarabi+Mincho" rel="stylesheet">
<link data-n-head="ssr" rel="stylesheet" type="text/css" href="https://use.typekit.net/xuq6wza.css">
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">

<script src="https://use.typekit.net/rhw6qit.js" async=""></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css"> <!-- Swiper JS用 -->

<?php //自動遷移
if ( ! is_user_logged_in() ) { ?>
<script type="text/javascript">
<!--
// 一定時間経過後に指定ページにジャンプする

// 現在ページのURL取得
var url   = location.href;
if(url == "https://www2020.seibidou.jp/infowall/"){
  waitTimer = 8; // 何秒後に移動する
  url = "https://www2020.seibidou.jp/infowall/weather/"; // 移動するアドレス

}else if(url == "https://www2020.seibidou.jp/infowall/weather/"){
  waitTimer = 8; // 何秒後に移動する
  url = "https://www2020.seibidou.jp/infowall/clock/"; // 移動するアドレス

}else if(url == "https://www2020.seibidou.jp/infowall/clock/"){
  waitTimer = 8; // 何秒後に移動する
  url = "https://www2020.seibidou.jp/infowall/news/"; // 移動するアドレス

}else if(url == "https://www2020.seibidou.jp/infowall/news/"){
  waitTimer = 64; // 何秒後に移動する
  url = "https://www2020.seibidou.jp/infowall/"; // 移動するアドレス

}

function jumpPage() {
  location.href = url;
}
setTimeout("jumpPage()",waitTimer*1000)
//-->
</script>
<?php } ?>

<script src="https://www2020.seibidou.jp/infowall/wp-content/themes/cocoon-child-master/parts/add_class.js" charset="UTF-8"></script> <!-- class付与 -->

<script src="https://www2020.seibidou.jp/infowall/wp-content/themes/cocoon-child-master/parts/clock.js" charset="UTF-8"></script> <!-- 時計読み込み -->

<!-- <script  src="https://www2020.seibidou.jp/infowall/wp-content/themes/cocoon-child-master/parts/svg_clock.js"></script>--> <!-- 時計読み込\みsvg -->
</div>

</head>

<body <?php body_class(); ?> itemscope itemtype="https://schema.org/WebPage" data-barba="wrapper">

<?php //body最初に挿入するアクセス解析ヘッダータグの取得
  get_template_part('tmp/body-top-analytics'); ?>

<?php //サイトヘッダーからコンテンツまでbodyタグ最初のHTML
get_template_part('tmp/body-top'); ?>
