<?php //自動遷移
  $firstPost = 'https://www2020.seibidou.jp/infowall/opening/';
  $next_post = get_next_post();
  if( !empty( $next_post ) ) {
    $url = get_permalink( $next_post->ID );
    header('Refresh: 7; URL='. $url);
  } else {
    $url = $firstPos;
    header('Refresh: 7; URL=http://www2020.seibidou.jp/infowall/opening/');
  }
?> <!-- 自動遷移ここまで -->