<?php
/**
 * Cấu hình cơ bản cho WordPress
 *
 * Trong quá trình cài đặt, file "wp-config.php" sẽ được tạo dựa trên nội dung 
 * mẫu của file này. Bạn không bắt buộc phải sử dụng giao diện web để cài đặt, 
 * chỉ cần lưu file này lại với tên "wp-config.php" và điền các thông tin cần thiết.
 *
 * File này chứa các thiết lập sau:
 *
 * * Thiết lập MySQL
 * * Các khóa bí mật
 * * Tiền tố cho các bảng database
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Thiết lập MySQL - Bạn có thể lấy các thông tin này từ host/server ** //
/** Tên database MySQL */
define( 'DB_NAME', 'cqdwahsvhosting_new' );

/** Username của database */
define( 'DB_USER', 'cqdwahsvhosting_vien' );

/** Mật khẩu của database */
define( 'DB_PASSWORD', 'cqdwahsvhosting_vien' );

/** Hostname của database */
define( 'DB_HOST', 'localhost' );

/** Database charset sử dụng để tạo bảng database. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Kiểu database collate. Đừng thay đổi nếu không hiểu rõ. */
define('DB_COLLATE', '');

/**#@+
 * Khóa xác thực và salt.
 *
 * Thay đổi các giá trị dưới đây thành các khóa không trùng nhau!
 * Bạn có thể tạo ra các khóa này bằng công cụ
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Bạn có thể thay đổi chúng bất cứ lúc nào để vô hiệu hóa tất cả
 * các cookie hiện có. Điều này sẽ buộc tất cả người dùng phải đăng nhập lại.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'r1;>Q[KdfW9F>*)[R&3l}S.vU#dfDVJaqS*.#hHdkL__RwM=}YtDWZkFX)WMXLz(' );
define( 'SECURE_AUTH_KEY',  'EFv33- (IT#*L^[h/gKH+xn8, WV4Y*?&-+,)H{/]nhYwJN$:Mecq8gFI;2y(#7I' );
define( 'LOGGED_IN_KEY',    '=rJ/u|cYJt-O5K=.MU1prd:pV[1r1R!s_Igb_Y,%NjeB]ET&(K~TT4=h*+K@[(^3' );
define( 'NONCE_KEY',        'O; BQ%`0hlxh|m0=_+>9 :S((.-Ka@=?XEbzakq}Zqej&pj]2zk?<-Ga095G^yv!' );
define( 'AUTH_SALT',        'AQ%!fArrqmOJs,V9G`9f0o!m[>U*U/lyOeF2~]x]E7{Y@16:Mn46e]au-%/2a<Ep' );
define( 'SECURE_AUTH_SALT', 'K%u>5ly-hSiK]B!J+(]O(bG~ {_#]<$|}b^%Z`x6PH(tuxd&|aA61%<H(|j< BeD' );
define( 'LOGGED_IN_SALT',   'O7)fW*Bb`O+h,*|{IF^S+$Dyv rP+^!SpAOb#$E9%SOlk}:)u/.3qT04a%8,v$g!' );
define( 'NONCE_SALT',       '7HSB]IxfXIG%:{TQ&K~LdtPUs3Lhb(gM#Vj^,RBIFFtG:(j$_E.[#G5h&%eL|L$/' );

/**#@-*/
define('FS_METHOD', 'direct');

/**
 * Tiền tố cho bảng database.
 *
 * Đặt tiền tố cho bảng giúp bạn có thể cài nhiều site WordPress vào cùng một database.
 * Chỉ sử dụng số, ký tự và dấu gạch dưới!
 */
$table_prefix  = 'wp_';

/**
 * Dành cho developer: Chế độ debug.
 *
 * Thay đổi hằng số này thành true sẽ làm hiện lên các thông báo trong quá trình phát triển.
 * Chúng tôi khuyến cáo các developer sử dụng WP_DEBUG trong quá trình phát triển plugin và theme.
 *
 * Để có thông tin về các hằng số khác có thể sử dụng khi debug, hãy xem tại Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Đó là tất cả thiết lập, ngưng sửa từ phần này trở xuống. Chúc bạn viết blog vui vẻ. */

/** Đường dẫn tuyệt đối đến thư mục cài đặt WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Thiết lập biến và include file. */
require_once(ABSPATH . 'wp-settings.php');
