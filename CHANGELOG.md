Thông tin các phiên bản **[HocVPS Script](https://github.com/nguyentranchung/hocvps)**.

## HocVPS Script v2.1.0 - 2020/09/03

Chung Nguyễn release version đầu tiền trên Github để quản lý.

*   Port ssh sẽ tự động chọn ngẫu nhiên từ 2000 - 9999
*   Port admin sẽ tự động chọn ngẫu nhiên từ 2000 - 9999
*   Hỗ trợ PHP 7.4

## HocVPS Script v2.0.3 – 6 September, 2017

Fix lỗi Nginx block thư mục `/.well-known/`, cần dùng khi cài đặt SSL.

Bỏ cấu hình disable function ở `www.conf`, để lại cấu hình duy nhất trong file `/etc/php.d/00-hocvps-custom.ini`.

## HocVPS Script v2.0.2 – 19 June, 2017

Thay đổi cấu trúc file cấu hình PHP-FPM để tương thích với [Nginx Amplify](https://hocvps.com/nginx-amplify/).

## HocVPS Script v2.0.1 – 10 May, 2017

Do chuyển từ MariaDB 5 lên 10 nên có lỗi phát sinh liên quan đến 3 table _gtid\_slave\_pos, innodb\_table\_stats, innodb\_index\_stats_.

Phiên bản HocVPS Script 2.0.1 chủ yếu fix lỗi này!

Nếu bạn đang dùng HocVPS Script v2.0, nên chạy lệnh dưới để nâng cấp lên 2.0.1 và fix bug!

mysqldump --all-databases > /root/all\_databases\_backup.sql 2> /dev/null # Backup all database
curl -sO https://hocvps.com/scripts/config/mysql/mariadb10\_fix.sh && bash mariadb10\_fix.sh

## HocVPS Script v2.0 – 3 May, 2017

Thay đổi hoàn toàn phần core của HocVPS Script với rất nhiều tính năng và hiệu suất hoạt động vượt trội so với bản cũ. Phiên bản 2.0 này mình học hỏi tham khảo rất nhiều từ mã nguồn của [Centmin Mod](http://centminmod.com/), cộng với tối ưu theo nhu cầu sử dụng của người Việt Nam.

*   Nâng cấp MariaDB 5 lên **MariaDB 10** + tối ưu thông số cấu hình theo phiên bản mới.
*   Tối ưu lại cấu hình **PHP-FPM**.
*   Fix lỗi SELinux không disable với một số ít server.
*   Fix lỗi RAM ảo cài đặt MariaDB lỗi.
*   Nâng cấp phpMyAdmin lên phiên bản mới 4.7.0 mới nhất.
*   Change port admin quản lý mặc định sang **2017**. Yêu cầu port nhâp thủ công > 2000 và < 9999, đồng thời kiểm tra ngay port có đang được sử dụng không khi cài đặt.
*   Tính năng mới cho phép đổi port admin.
*   Bỏ phiên bản PHP 5.4, PHP 5.5, giờ chỉ support **PHP 5.6, PHP 7.0 và PHP 7.1** mới nhất.
*   Thay đổi tên tham số lưu trữ cấu hình sau khi cài đặt xong.
*   Fix lỗi không chạy [Logrotate](https://hocvps.com/logrotate/) trên CentOS 7.
*   Fix lỗi phân quyền Webserver.
*   Fix lỗi thêm Park Domain, Forward Domain, giờ tách riêng file cấu hình trong thư mục `/etc/nginx/conf.d/`
*   Tối ưu request, giảm thời gian cài đặt script.

## HocVPS Script v1.8 – 13 February, 2017

*   Tính năng mới: **hỗ trợ cài đặt PHP 7.1**
*   Sửa lỗi: tool File Manager, Server Info đã tương thích với PHP 7.1. Cảm ơn _Nhan Le_ đã support.
*   Nâng cấp: HocVPS Script Admin cho phép thay đổi mật khẩu tài khoản `admin` của phpMyAdmin không cần nhập mật khẩu cũ.
*   Nâng cấp: phiên bản mới nhất phpMyAdmin.

## HocVPS Script v1.7

Phiên bản đầu tiên ghi changelog.