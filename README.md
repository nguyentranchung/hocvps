## Giới thiệu HocVPS

**HocVPS Script** là 1 bash script chạy trên SSH sẽ tự động cài đặt tất cả các thành phần cần thiết nhất cho VPS với một dòng lệnh duy nhất.

Không như những Control Panel khác, HocVPS Script không hề sử dụng bất kỳ tài nguyên server (CPU, RAM) và không thể mắc lỗi bảo mật nào để hacker khai thác được nên các bạn có thể hoàn toàn yên tâm sử dụng.

Ngoài ra, webserver sẽ được tự động tối ưu cấu hình để đảm bảo có hiệu suất hoạt động tốt nhất, bảo mật nhất. Ngay cả những bạn mới làm quen với VPS cũng có thể quản lý VPS thông qua menu dòng lệnh đơn giản, gọi bằng lệnh `hocvps`

[![](https://hocvps.com/wp-content/uploads/2016/04/HocVPS-Script-v2.0.png)](https://hocvps.com/wp-content/uploads/2016/04/HocVPS-Script-v2.0.png)

## HocVPS Script sẽ tự động cài đặt:

*   Webserver Nginx bản mới nhất.
*   Database MariaDB bản mới nhất 10.0 (chính là MySQL được tối ưu).
*   PHP phiên bản mới nhất tùy chọn: PHP 7.4, PHP 7.3, PHP 7.2, PHP 7.1, PHP 7.0, PHP 5.6; đi kèm [Zend OPcache](https://hocvps.com/cai-dat-va-cau-hinh-php-zend-opcache/)
*   [phpMyAdmin](https://www.phpmyadmin.net/) mới nhất.
*   [eXtplorer](https://hocvps.com/extplorer/) mới nhất để quản lý File Manager, có thể tạo user, phân quyền riêng biệt.

## Tính năng trên HocVPS:

1.  Thông tin cài đặt đơn giản, chỉ cần lựa chọn phiên bản PHP, tên miền chính và port admin là đủ.
2.  Sử dụng Nginx repo thay vì compile từ source như những script khác giúp việc cài đặt Nginx nhanh hơn, sau này có nâng cấp cũng dễ dàng hơn rất nhiều.
3.  Thay thế MySQL bằng MariaDB cho kịp xu hướng (đây là phiên bản cải tiến từ MySQL, hoạt động tương tự nhưng cho hiệu suất cao hơn MySQL; ngoài ra phiên bản mới nhất CentOS 7 chính thức đã hỗ trợ MariaDB).
4.  Tương thích với cả **CentOS 6 và CentOS 7**, cả 32bit lẫn 64bit chơi hết. Lưu ý **chưa dùng được trên CentOS 8**.
5.  Tùy chọn sử dụng cài đặt phiên bản PHP 7.4 (mới nhất), PHP 7.3, PHP 7.2, PHP 7.1, PHP 7.0, PHP 5.6.
6.  Có trình quản lý File Manager eXtplorer trực tiếp ngay trên web.
7.  Tự động cài đặt module Zend Opcache và có thể theo dõi status ngay trên web.
8.  Sử dụng được với cả domain www và non-www, tự động redirect giúp bạn.
9.  Update tự động cho Nginx, PHP, MariaDB.
10.  Theo dõi tình trạng server ngay trên web, có thể sử dụng mobile truy cập mọi nơi.
11.  [Thay đổi port SSH](https://hocvps.com/cac-buoc-thay-doi-ssh-port-cua-server/) mặc định từ 22 sang ngẫu nhiên hạn chế SSH Brute Force Attack, kèm theo [Fail2ban](https://hocvps.com/cai-dat-fail2ban-tren-centos/) block IP ngay nếu phát hiện login sai 3 lần (áp dụng cả SSH và HocVPS Script Admin).
12.  Toàn bộ thông tin quản lý sẽ được lưu trong file text ở `/root/hocvps-script.txt`
13.  Tham khảo thêm tính năng mới trong [Changelog](https://github.com/nguyentranchung/hocvps/blob/master/CHANGELOG.md).

## Yêu cầu hệ thống:

1.  RAM: tối thiểu 512MB
2.  Nên tạo [swap](https://hocvps.com/swap/) trước khi cài (nếu sử dụng ổ cứng SSD hoặc RAID10)

Trước khi tiến hành cài đặt, bạn cần nắm một số kiến thức căn bản trong bài [Bắt đầu](https://hocvps.com/bat-dau/), chủ yếu là [cách sử dụng ZOC Terminal kết nối SSH](https://hocvps.com/huong-dan-dung-zoc-terminal-ket-noi-ssh/).

## Cài đặt HocVPS Script

Đầu tiên các bạn cần chuẩn bị một **VPS mới tinh** bằng cách _Reinstall_ hoặc _Rebuild_, sử dụng CentOS 6 hoặc CentOS 7, bản 32bit hoặc 64bit đều được. Nên sử dụng bản **CentOS 7 x64 với PHP 7.4.**

Kết nối SSH sử dụng [ZOC Terminal](https://hocvps.com/huong-dan-dung-zoc-terminal-ket-noi-ssh/) hoặc [Putty](https://hocvps.com/huong-dan-dang-nhap-vps-su-dung-putty-windows/) với tài khoản `root`. Nếu tài khoản không có quyền root cần cấp quyền bằng cách chạy lệnh `sudo su`.  
Chạy lệnh sau để tiến hành cài đặt:

```bash
curl -sO https://raw.githubusercontent.com/nguyentranchung/hocvps/master/install && bash install
```

– Cài đặt xong, khi connect SSH VPS bạn hãy sử dụng port ngẫu nhiên nhận được, không dùng port 22!  
– HocVPS Script không hoạt động trên VPS chỉ có IPv6 (gói $2.5 của Vultr)  

_\*\*\*Nếu muốn cài đặt luôn WordPress, hãy tham khảo [script tự động cài đặt HocVPS Script và WordPress](https://hocvps.com/auto-install-hocvps-script-wordpress/)._

_\*\*\*Học VPS có **[dịch vụ cài đặt VPS/Server](https://hocvps.com/dich-vu/)**, nếu không muốn mất thời gian bạn hãy sử dụng cho chuyên nghiệp._

## Chuẩn bị quá trình cài đặt

[![](https://hocvps.com/wp-content/uploads/2016/04/Chuan-bi-cai-dat-HocVPS-Script-1.8.png)](https://hocvps.com/wp-content/uploads/2016/04/Chuan-bi-cai-dat-HocVPS-Script-1.8.png)

Trong bước này bạn cần lựa chọn:

1.  **Phiên bản PHP** muốn sử dụng: nên dùng **PHP mới nhất** để có hiệu suất tốt hơn so với các phiên bản cũ.
2.  **Tên miền chính** sử dụng với VPS, có thể nhập có www hoặc không có www tùy mục đích sử dụng, script sẽ tự động redirect giúp bạn.
3.  **Port admin quản lý server**: là port bí mật (nằm trong khoảng 2000 – 9999, thay đổi được sau khi cài) dùng để:
    *   Truy cập link quản trị, có dạng: http://domain.com:port/
    *   Sử dụng phpMyAdmin, link dạng: http://domain.com:port/phpmyadmin/
    *   Quản lý File Manager, link dạng: http://domain.com:port/filemanager/
    *   Theo dõi tình trạng hệ thống, link dạng: http://domain.com:port/serverinfo/
    *   Theo dõi tình trạng Zend Opcache, link dạng: http://domain.com:port/op.php

Sau đó, bạn cứ để cho script tự động thực hiện quá trình cài đặt, có thể mất từ 3 – 5 phút tùy cấu hình và network của VPS/Server.

Cuối cùng, nếu không có vấn đề gì xảy ra, bạn sẽ nhận được thông báo cài đặt thành công và thông tin quản lý VPS như bên dưới. Đồng thời, thông tin này cũng sẽ được lưu trong file text có đường dẫn `/root/hocvps-script.txt` để bạn xem lại sau này.

[![](https://hocvps.com/wp-content/uploads/2016/04/Cai-dat-thanh-cong-v1.8.png)](https://hocvps.com/wp-content/uploads/2016/04/Cai-dat-thanh-cong-v1.8.png)

Vậy là server sẵn sàng để bạn sử dụng rồi đấy.

## Sử dụng HocVPS Script

HocVPS Menu được sử dụng qua lệnh `hocvps` trên SSH Terminal.

  
Sau khi cài đặt xong HocVPS Script, bạn có thể sử dụng [sFTP](https://hocvps.com/huong-dan-ket-noi-sftp-bang-filezilla/) để quản lý File, upload code lên thư mục `/home/domain.com/public_html/` đồng thời trỏ tên miền về IP VPS và bắt đầu sử dụng.  
_Lưu ý: Sau khi upload source lên thư mục web, các bạn sử dụng `hocvps` menu 14 Phân Quyền Webserver để Nginx đọc được nội dung website._

Nếu muốn kết nối SSH bạn hãy sử dụng port nhận được ngẫu nhiên khi cài.

Trong quá trình sử dụng, đang ở bất kỳ chức năng nào bạn cũng có thể nhấn Ctrl + C sẽ thoát khỏi Script ngay lập tức.

## Bảo mật an toàn tuyệt đối

Mình luôn đặt vấn đề bảo mật và sự đơn giản lên hàng đầu nên từ phiên bản HocVPS Script v1.6 sẽ bổ sung thêm một lớp bảo mật nữa khi truy cập các link có chứa port. Bạn có thể thay đổi password này cho dễ nhớ hơn khi truy cập link quản trị _http://domain.com:port/_.

Username mặc định cho tất cả các tool là _admin_, password tự động sinh ra sau khi cài đặt xong server. Nếu bạn nhập sai thông tin quá 3 lần, IP sẽ tự động bị block trong 1h. Nâng thêm thời gian theo [hướng dẫn này](https://hocvps.com/cai-dat-fail2ban-tren-centos/).

– Cloudflare CDN chặn truy cập qua port bất thường nên domain sử dụng CDN Cloudflare(đám mây vàng) cần tắt CDN để truy cập domain:port. Nếu không, chỉ truy cập qua ip:port  
– Cài đặt xong HocVPS Script, các bạn nên thiết lập luôn [Script backup tự động](https://hocvps.com/rclone/) nhằm đảm bảo an toàn cho data và database.  
– HocVPS Script hoạt động rất tốt với WordPress, Joomla, Magento, PrestaShop, Xenforo (đã trực tiếp test)

## Bài viết hay liên quan đến HocVPS Script

1.  [Reset password quản lý server HocVPS Script](https://hocvps.com/reset-password-hocvps-admin/)
2.  [Rclone – Backup toàn bộ VPS lên Google Drive](https://hocvps.com/rclone/)
3.  [Cài đặt chứng chỉ Let’s Encrypt trên server HocVPS Script](https://hocvps.com/cai-dat-lets-encrypt/)
4.  [Hướng dẫn cài đặt chứng chỉ SSL trên Nginx](https://hocvps.com/cai-dat-chung-chi-ssl/)
5.  [Tự động cài đặt HocVPS Script và WordPress](https://hocvps.com/auto-install-hocvps-script-wordpress/)
6.  [Script tự động tải và cài đặt WordPress trên VPS](https://hocvps.com/script-tu-dong-tai-va-cai-dat-wordpress-tren-vps/)
7.  [Hướng dẫn config VPS chịu tải lớn với HocVPS Script 4k3 online trên VPS 2GB RAM](https://hocvps.com/huong-dan-config-vps-chiu-tai-lon-voi-hocvps-script/)

## Một số vấn đề có thể gặp phải

+\-[1\. Cài đặt diễn đàn VBB](#1-cai-dat-dien-dan-vbb)

Trong file config.php bạn hãy chuyển:

$config\['Database'\]\['dbtype'\] = 'mysql';

thành

$config\['Database'\]\['dbtype'\] = 'mysqli';

rồi thêm đoạn sau vào: `define('DISABLE_HOOKS', true);`

+\-[2\. Upgrade các thành phần của HocVPS Script](#2-upgrade-cac-thanh-phan-cua-hocvps-script)

**1\. Đối với phiên bản HocVPS Script hiện tại**

Các bạn chỉ cần chạy menu “hocvps” rồi chọn option 15) Nang cap server. Toàn bộ quá trình nâng cấp sẽ được tự động thực hiện.

**2\. Đối với phiên bản HocVPS Script cũ**

**PHP**

Để kiểm tra phiên bản PHP hiện tại bạn dùng lệnh `php -v` hoặc `php-fpm -v`

– Nếu bạn đang dùng PHP 5.4.x và muốn nâng cấp lên bản cao nhất (cùng là 5.4.x)

yum --enablerepo=remi update php\\\*

– Nếu bạn đang dùng PHP 5.4.x và muốn nâng cấp lên 5.5.x hoặc đang dùng 5.5.x và muốn nâng cấp lên bản cao nhất

yum --enablerepo=remi-php55,remi update php\\\*

**Nginx**

Để kiểm tra phiên bản Nginx đang sử dụng bạn dùng lệnh `nginx -v` hoặc `nginx -V`

Nâng cấp Nginx lên phiên bản mới nhất:

yum --enablerepo=remi-php55,remi update nginx\\\*

**MySQL-MariaDB**

Để kiểm tra phiên bản MariaDB đang sử dụng bạn dùng lệnh `mysql -p`

Nâng cấp MariaDB lên phiên bản mới nhất:

yum upgrade MariaDB-server MariaDB-client

**phpMyAdmin**

Bạn hãy xóa toàn bộ file + folder trong thư mục `/home/maindomain.com/private_html/` bằng lệnh `rm` rồi tải script phpMyAdmin mới nhất giải nén vào thư mục này.

Xem thêm hướng dẫn [cài đặt phpMyAdmin trên CentOS](https://hocvps.com/cai-dat-va-bao-mat-phpmyadmin-tren-centos/#2)

+\-[3\. Không dùng được IFRAME khi cài HocVPS Script](#3-khong-dung-duoc-iframe-khi-cai-hocvps-script)

Để bảo mật, khi server dùng HocVPS Script không website nào có thể chèn được IFRAME từ site của bạn.

Trong trường hợp cần dùng IFRAME, hãy mở file`/etc/nginx/nginx.conf` xóa dòng `add_header X-Frame-Options SAMEORIGIN;` và reload Nginx là được ngay nhé.

service nginx reload

+\-[4\. Không gửi được mail sử dụng server Linode](#4-khong-gui-duoc-mail-su-dung-server-linode)

[Linode](https://hocvps.com/vps/linode/) tự động kích hoạt IPv6 nên khi gửi mail tới Gmail sẽ bị lỗi với lệnh test:

echo "Subject: test" | /usr/lib/sendmail -v admin@gmail.com

Để gửi được mail, đơn giản bạn chỉ cần [disable IPv6](https://hocvps.com/disable-ipv6-tren-centos/) đi là xong.

+\-[5\. Mở Port với VPS Google Cloud, Amazon](#5-mo-port-voi-vps-google-cloud-amazon)

  
Mặc định, HocVPS Script đã mở các port cần thiết: SSH(2222), HTTP/HTTPS(80/443), HocVPS Admin… Tuy vậy, một số nhà cung cấp VPS (Google Cloud, Amazon…) có thiết lập tường lửa riêng bên ngoài VPS và mặc định chỉ cho phép port SSH(22) và HTTP(80). Như vậy, bạn cần mở port thủ công tại trang quản lý của nhà cung cấp  
Đối với Google Cloud, tạo **rule allow** trong **Network**–**default** như hình dưới để áp dụng mặc định cho toàn bộ VPS trong tài khoản.  
[![](https://hocvps.com/wp-content/uploads/2017/05/GG-Add-Port.png)](https://hocvps.com/wp-content/uploads/2017/05/GG-Add-Port.png)  
Đối với EC2, bạn chỉnh ở mục `NETWORK&SECURITY - Security Groups - Inbound`. Tương tự, bạn cần mở thủ công port HTTPS(443), FTP… nếu cần.
