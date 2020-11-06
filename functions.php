<?php //子テーマ用関数
if ( !defined( 'ABSPATH' ) ) exit;

//子テーマ用のビジュアルエディタースタイルを適用
add_editor_style();

//以下に子テーマ用の関数を書く
@ini_set( 'upload_max_size' , '300M' );
@ini_set( 'post_max_size', '300M');
@ini_set( 'max_execution_time', '300' );

/* 自動挿入のpタグ除去 */
add_action('init', function() {
  remove_filter('the_excerpt', 'wpautop');
  remove_filter('the_content', 'wpautop');
  remove_filter ('acf_the_content', 'wpautop');
  });
add_filter('tiny_mce_before_init', function($init) {
$init['wpautop'] = false;
$init['apply_source_formatting'] = ture;
  return $init;
});

//body_class にページスラッグ追加
function add_my_classes( $classes ) {
  if ( is_page() || is_single() ) {
    $classes[] = get_post( get_the_ID() )->post_name;
  } 
  return $classes;
}
add_filter( 'body_class', 'add_my_classes' );

/* タグ表示 */
function taglist_shortcode() {
 $posttags = get_the_tags();
  if($posttags) {
   foreach ($posttags as $tag):
    $tagHTML= $tagHTML . '<span>' . $tag->name . '</span>';
   endforeach;
   return $tagHTML;
  }
}
add_shortcode('taglist', 'taglist_shortcode');

/* flex：縦並び */
function col_vertical( $atts, $content = null ) {
  $content = do_shortcode( shortcode_unautop( $content ) ); //入れ子のショートコード
  return '<div class="col_vertical">' . $content . '</div>';
}
add_shortcode('flex_vertical', 'col_vertical');


/* Dockの表示 */
function dock_func() {
  include 'php/dock.php';
}
add_shortcode('dock', 'dock_func');

/* opening */
function opennig_func() {
  include 'php/opennig.php';
}
add_shortcode('opennig', 'opennig_func');

function opennig_end_func() {
  include 'php/opennig_end.php';
}
add_shortcode('opennig_end', 'opennig_end_func');
/* //opening */


/* 時計の表示 */
function clock_func() {
  include 'php/clock.php';
}
add_shortcode('clock', 'clock_func');

/* 時計：日付および曜日の表示 */
function calender_func() {
  include 'php/calender.php';
}
add_shortcode('calender', 'calender_func');

/* 世界時計の表示 */
function clock_world_func() {
  include 'php/clock_world.php';
}
add_shortcode('clock_world', 'clock_world_func');

//時計盤
function clock_circle_func() {
  echo '<div class="clock_circle">';
  echo '<div class="clock_inner">';
  include 'php/clock.php';
  include 'php/calender.php';
  echo '</div>';
  echo '</div>';
}
add_shortcode('clock_circle', 'clock_circle_func');

/* 天気 */
function weather_head_func() {
  echo '<div class="news_header">';
  include 'php/clock.php';
  include 'php/calender.php';
  echo '</div>';
}
add_shortcode('weather_head', 'weather_head_func');

function GetWeather() {
  $tmp_url = "http://www.drk7.jp/weather/xml/08.xml";
  $tmp_xml = simplexml_load_file($tmp_url);
  $xml = $tmp_xml->pref->area[1]->info[0];
 
  $title = $xml->weather;              // 天気
  $detail = $xml->weather_detail;          // 詳細
  $wave = $xml->wave;                // 波
  $temperature_max = $xml->temperature->range[0];  // 最高気温
  $temperature_min = $xml->temperature->range[1];  // 最低気温
  $rain_00_06 = $xml->rainfallchance->period[0];   // 0~6時の降水確率
  $rain_06_12 = $xml->rainfallchance->period[1];   // 6~12時の降水確率
  $rain_12_18 = $xml->rainfallchance->period[2];   // 12~18時の降水確率
  $rain_18_24 = $xml->rainfallchance->period[3];   // 18~24時の降水確率
 
  print "$title";        // 天気のみ
  print "天気: $title";  // 文字を組み合わせてもOK
}

/* 今日の天気（マークのみ） */
function weather_today_only_mark_func() {
  include 'php_weather/weather_today_only_mark.php';
}
add_shortcode('weather_today_only_mark', 'weather_today_only_mark_func');

/* 今日の天気 */
function weather_today_func() {
  include 'php_weather/weather_today.php';
}
add_shortcode('weather_today', 'weather_today_func');

/* 週間予報 */
function weather_week_func() {
  include 'php_weather/weather_week.php';
}
add_shortcode('weather_week', 'weather_week_func');

/* iw_contentsの表示 */
function iw_contents_func() {
  include 'parts/iw_contens.php';
}
add_shortcode('iw_contents', 'iw_contents_func');

/* kanrenの表示_test用 */
function kanren_func() {
  include 'parts/post87.php';
}
add_shortcode('kanren', 'kanren_func');

/* NEWS */
function news_head_func() {
  include 'php_weather/news_head.php';
}
add_shortcode('news_head', 'news_head_func');

function news_area_func() {
  include 'php/news_area.php';
}
add_shortcode('news_area', 'news_area_func');

/* PHPの読み込み
---------------------------------------------------------- */
function my_php_Include($params = array()) {
extract(shortcode_atts(array('file' => 'default'), $params));
ob_start();
include(STYLESHEETPATH . "/parts/$file.php");
return ob_get_clean();
}
add_shortcode('call_php', 'my_php_Include');

?>