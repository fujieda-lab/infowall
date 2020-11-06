<?php
/**
 * WordPress の基本設定
 *
 * このファイルは、インストール時に wp-config.php 作成ウィザードが利用します。
 * ウィザードを介さずにこのファイルを "wp-config.php" という名前でコピーして
 * 直接編集して値を入力してもかまいません。
 *
 * このファイルは、以下の設定を含みます。
 *
 * * MySQL 設定
 * * 秘密鍵
 * * データベーステーブル接頭辞
 * * ABSPATH
 *
 * @link https://ja.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// 注意:
// Windows の "メモ帳" でこのファイルを編集しないでください !
// 問題なく使えるテキストエディタ
// (http://wpdocs.osdn.jp/%E7%94%A8%E8%AA%9E%E9%9B%86#.E3.83.86.E3.82.AD.E3.82.B9.E3.83.88.E3.82.A8.E3.83.87.E3.82.A3.E3.82.BF 参照)
// を使用し、必ず UTF-8 の BOM なし (UTF-8N) で保存してください。

// ** MySQL 設定 - この情報はホスティング先から入手してください。 ** //
/** WordPress のためのデータベース名 */
define( 'DB_NAME', 'vu006900' );

/** MySQL データベースのユーザー名 */
define( 'DB_USER', 'vu006900' );

/** MySQL データベースのパスワード */
define( 'DB_PASSWORD', 'etfjakpa5se' );

/** MySQL のホスト名 */
define( 'DB_HOST', 'localhost' );

/** データベースのテーブルを作成する際のデータベースの文字セット */
define( 'DB_CHARSET', 'utf8mb4' );

/** データベースの照合順序 (ほとんどの場合変更する必要はありません) */
define( 'DB_COLLATE', '' );

/**#@+
 * 認証用ユニークキー
 *
 * それぞれを異なるユニーク (一意) な文字列に変更してください。
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org の秘密鍵サービス} で自動生成することもできます。
 * 後でいつでも変更して、既存のすべての cookie を無効にできます。これにより、すべてのユーザーを強制的に再ログインさせることになります。
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'B27FY(tE|({lq=|R !t!~93rU23(YaixnEYet81-kfv_qR%y$uu!Q>Jfej%Y&{ou' );
define( 'SECURE_AUTH_KEY',  'zsgj`s@t|Gq3z9N8s^x}UKw&4M|<#[El`?A)la:ny]d=sh)UgNo6=znast_f}9GU' );
define( 'LOGGED_IN_KEY',    'UNp5tN_Q>UG#.TTAk%mO*p[.5rA_vbVxwzHZ[Z>Bukn&l/)Y:w]+2iHg8:?w,dY6' );
define( 'NONCE_KEY',        '&:VL`R_96XHd&qWnI;()xH3D!qLpep]<v;P`wf@$eD08X~#a}oQW_@WdhD*Nt(4?' );
define( 'AUTH_SALT',        'snQny;l]^B~Q>/A%yl#aiROTBSrmOnP1.9z%V>&e#Ad/`x+NWf@8950N#Z9DHO?J' );
define( 'SECURE_AUTH_SALT', '|{6}fpwb$OUmesSF?L:8XV{SQDQY94c)P]{M@E@%{4DA_I?QvL1&#bUv&hBa!Wba' );
define( 'LOGGED_IN_SALT',   'zN[sA_$YknCMq<6l]9-X9+dK|K>sU9Ub|i#3x@b&!)CeocI^d>4o<O?^j!c+bH;e' );
define( 'NONCE_SALT',       'v[$IiG10Sd<7)NV5ej]kEb p`]/l%9FvwM1~Bd:0~bf[heb^cpC]QMg1Si_07n%z' );

/**#@-*/

/**
 * WordPress データベーステーブルの接頭辞
 *
 * それぞれにユニーク (一意) な接頭辞を与えることで一つのデータベースに複数の WordPress を
 * インストールすることができます。半角英数字と下線のみを使用してください。
 */
$table_prefix = 'wp_infowall_new';

/**
 * 開発者へ: WordPress デバッグモード
 *
 * この値を true にすると、開発中に注意 (notice) を表示します。
 * テーマおよびプラグインの開発者には、その開発環境においてこの WP_DEBUG を使用することを強く推奨します。
 *
 * その他のデバッグに利用できる定数についてはドキュメンテーションをご覧ください。
 *
 * @link https://ja.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

define('WP_ALLOW_MULTISITE', true);

define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', false);
define('DOMAIN_CURRENT_SITE', 'www2020.seibidou.jp');
define('PATH_CURRENT_SITE', '/infowall/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);

/* 編集が必要なのはここまでです ! WordPress でのパブリッシングをお楽しみください。 */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
