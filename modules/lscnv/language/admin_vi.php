<?php

/**
 * @Project NUKEVIET 4.x
 * @Author 123host <tanviet@123host.vn>
 * @Copyright (C) 2017 123host. All rights reserved
 * @License: GNU/GPL version 2 or any later version
 * @Createdate Fri, 11 Aug 2017 09:48:43 GMT
 */

if ( ! defined( 'NV_MAINFILE' ) ) die( 'Stop!!!' );

$lang_translator['author'] = '123host (tanviet@123host.vn)';
$lang_translator['createdate'] = '11/08/2017, 09:48';
$lang_translator['copyright'] = '@Copyright (C) 2017 123host All rights reserved';
$lang_translator['info'] = '';
$lang_translator['langtype'] = 'lang_module';

$lang_module['main'] = 'Quản lý Cache';
$lang_module['config'] = 'Cấu hình';
$lang_module['save'] = 'Save';
$lang_module['manage'] = 'Quản lý Cache';
$lang_module['info'] = 'Hướng dẫn';

$lang_module['123HOST_MAIN_INTRO'] = 'Tính năng xóa cache giúp bạn bật / tắt cache, xóa cache đang lưu trên hệ thống máy chủ';
$lang_module['123HOST_MAIN_TL2'] = 'Xóa Cache trang chủ';
$lang_module['123HOST_MAIN_TL3'] = 'Xóa Cache trang chủ';
$lang_module['123HOST_MAIN_TL4'] = 'Chỉ xóa cache trang chủ';
$lang_module['123HOST_MAIN_TL5'] = 'Xóa tất cả Cache';
$lang_module['123HOST_MAIN_TL6'] = 'Xóa tất cả Cache';
$lang_module['123HOST_MAIN_TL7'] = 'Xóa tất cả cache của website bao gồm cache của Bài viết, module.v.v';
$lang_module['123HOST_MAIN_PURGE_SUCCESS'] = 'Xóa cache thành công';

$lang_module['123host_purge_front_success'] = "Xóa cache trang chủ thành công";
$lang_module['123host_purge_front_failure'] = "Xóa cache trang chủ thất bại";
$lang_module['123host_purge_success'] = "Xóa cache thành công";
$lang_module['123host_status_enabled'] = "ĐANG BẬT";
$lang_module['123host_status_disable'] = "ĐANG TẮT";
$lang_module['123host_enable_cache'] = "Bật Cache";
$lang_module['123host_disable_cache'] = "Tắt Cache";
$lang_module['123host_settings_saved'] = "Cập nhật thành công";
$lang_module['123host_version_error'] = "Module này chỉ hỗ trợ phiên bản Nukeviet 4.0 trở lên. Vui lòng liên hệ support@123host.vn để được hỗ trợ!";
$lang_module['123host_file_not_exist_or_write'] = " không tồn tại hoặc không có quyền ghi.";
$lang_module['123host_system_not_meet'] = "Hệ thống không đáp ứng yêu cầu. Module cache có thể không khởi động được hoặc không thực hiện được hết các tính năng cần thiết!";

$lang_module['123host_system_meet'] = "Xin chúc mừng. Hệ thống đáp ứng tất cả các yêu cầu!";
$lang_module['123host_enable_cache_success'] = "Bật cache thành công";
$lang_module['123host_enable_cache_failure'] = "Lỗi trong quá trình bật cache. Vui lòng đảm bảo rằng file .htaccess có quyền ghi!";
$lang_module['123host_disable_cache_success'] = "Tắt cache thành công";
$lang_module['123host_disable_cache_failure'] = "Lỗi trong quá trình tắt cache!";
$lang_module['123host_check_check_req'] = "Click vào đây để kiểm tra tính tương thích của hệ thống!";
$lang_module['123host_init_cache_success'] = "Khởi tạo hệ thống Cache thành công!";
$lang_module['123host_init_cache_failure'] = "Khởi tạo hệ thống Cache thất bại!";
$lang_module['123host_edit_file_failure'] = "Lỗi: Không thể hiệu chỉnh file ";
$lang_module['123host_edit_file'] = "Hiệu chỉnh file ";
$lang_module['123host_success'] = " thành công!";
$lang_module['123host_general_config'] = "Cấu hình chung";
$lang_module['123host_specific_pages'] = "Chỉ định cho trang";
$lang_module['123host_information'] = "Thông tin";
$lang_module['123host_public_cache_ttl'] = "Thời gian lưu Cache chung";
$lang_module['123host_public_cache_ttl_des'] = "Điền số, đơn vị tính là giây cho thời gian lưu cache chung. Tối thiểu 30 giây. Giá trị đề xuất là 7 ngày: 604800";
$lang_module['123host_front_cache_ttl'] = "Thời gian lưu cache Trang chủ";
$lang_module['123host_front_cache_ttl_des'] = "Điền số, đơn vị tính là giây cho thời gian lưu cache của trang chủ. Tối thiểu 30 giây. Giá trị đề xuất là 7 ngày: 604800";

$lang_module['123host_cache_login_page'] = "Cache cho Login Page";
$lang_module['123host_cache_login_page_des'] = "Tùy chọn tắt hay bật Cache cho trang login của admin và user.";
$lang_module['123host_cache_favicon'] = "Cache cho favicon.ico";
$lang_module['123host_cache_favicon_des'] = "Bật hay tắt cache cho favicon.ico . Khuyến cáo nên bật để tăng hiệu năng.";
$lang_module['123host_cache_statuss'] = "Trạng thái Cache";
$lang_module['123host_cache_action'] = "Bật/ Tắt Cache";
$lang_module['123host_about_module'] = "Giới thiệu Module";
$lang_module['123host_about_module_des1'] = "<p>Module này được <a href='https://123host.vn/' target='_blank'>123HOST</a> phát triển riêng cho dịch vụ <a href='https://123host.vn/nukeviet-hosting.html'
target='_blank'>Nukeviet Hosting</a> . Một dịch vụ hosting cao cấp dành riêng cho mã nguồn mở Nukeviet. Mục đích:</p>
<ol>
<li><strong>Tăng tốc gấp nhiều lần cho website Nukeviet:</strong> Phản hồi từ máy chủ khi truy cập một website Nukeviet tầm
<strong>200  mili giây (ms)</strong> đến <strong>2 giây (s)</strong>. Khi bật tính năng Cache của module này, thời gian
phản hồi của máy chủ sẽ giảm xuống chỉ còn <strong>10</strong> đến <strong>20 mili giây</strong>.</li>
<br>
<li><strong>Tăng lượng online tối đa:</strong> Vì <strong>Web Server</strong/> sử dụng bản Cache được lưu từ trước để phản hồi cho người truy
cập nên hầu như máy chủ phía sau không cần xử lý PHP & MySQL, vì vậy lượng online tối đa của website sẽ tăng lên gấp
nhiều lần. </li>
<br>
<li><strong>Hạn chế thiệt hại khi bị tấn công HTTP Flood:</strong> HTTP Flood là hình thức tấn công làm máy chủ quá tải bằng cách gởi nhiều request đến web server. Nếu module cache được bật, sẽ giảm tải cho hệ thống và hạn chế tình trạng quá tải máy chủ khi bị tấn
công HTTP Flood</li>
</ol></p>";

$lang_module['123host_faqs'] = "Câu hỏi thường gặp";
$lang_module['123host_faq_q1'] = "Module 123HOST LSCache cho Nukeviet do ai phát triển?";
$lang_module['123host_faq_a1'] = "<p><a href=\"https://123host.vn/\" target=\"_blank\">123HOST</a> là đơn vị phát triển module này.</p>";
$lang_module['123host_faq_q2'] = "Module này hoạt động với cơ chế như thế nào?";
$lang_module['123host_faq_a2'] = "<p>Module này là giao diện để điều kiển cache tại phía <strong>Web Server</strong/>. Chính <strong>Web Server</strong> tại máy chủ là nhân tố thực hiện Cache. Các tính năng của module:</p>
<ol>
    <li>Bật / Tắt cache</li>
    <li>Cấu hình thời gian cache</li>
    <li>Xóa cache</li>
</ol>";
$lang_module['123host_faq_q3'] = "Cache là gì?";
$lang_module['123host_faq_a3'] = "<p>
<strong>Cache</strong> là công nghệ tăng tốc website. Khi người dùng truy cập vào website, <strong>Web Server</strong> sẽ lưu lại một bản cache, lần sau khi có truy cập cùng URL trên, <strong>Web Server</strong> sẽ dùng bản Cache để phản hồi cho người dùng mà không cần phải xử lý backend phía sau. </p>";

$lang_module['123host_faq_q4'] = "Sử dụng Hosting của Nhà cung cấp khác không phải là 123HOST thì có dùng được module này không?";
$lang_module['123host_faq_a4'] = "<p>Sẽ không dùng được module này vì <strong>Web Server</strong/> của các nhà cung cấp khác không tương thích công nghệ với module này.</p>";

$lang_module['123host_faq_q5'] = "Dùng VPS có chạy được module này không?";
$lang_module['123host_faq_a5'] = "<p>Rất tiếc module này chưa hỗ trợ cho VPS. Chỉ tương thích với dịch vụ <a href=\"https://123host.vn/nukeviet-hosting.html\" target=\"_blank\">Nukeviet Hosting</a>.</p>";

$lang_module['123host_faq_q6'] = "Phiên bản Nukeviet nào được hỗ trợ?";
$lang_module['123host_faq_a6'] = "<p>Module hiện tại chỉ hỗ trợ Nukeviet 4.</p>";

$lang_module['123host_cache_management'] = "Quản lý Cache";
$lang_module['123host_cache_management_des1'] = "<p> Tính năng này tại menu <strong>Quản Lý Cache</strong>. Tại đây người quản trị có thể:</p>
<ul>
    <li><strong>Xem trạng thái Cache:</strong> <strong> Đang bật</strong> hoặc <strong>Đang tắt</strong></li>
    <li><strong>Bật / Tắt Cache:</strong> Thực hiện bật hoặc tắt Cache.</li>
    <li><strong>Xóa Cache trang chủ:</strong> Xóa cache cho trang chủ. Ví dụ: Nếu website của bạn là https://123host.vn/ khi chọn tính năng này, cache cho URL https://123host.vn/ hoặc https://123host.vn/vi/ sẽ bị xóa. </li>
    <li><strong>Xóa tất cả cache:</strong> Xóa tất cả Cache đang có. <strong>Web Server</strong/> sẽ cập nhật lại Cache mới sau khi xóa</li>
</ul>
<p>Sau khi xóa Cache, cache mới sẽ được tạo nếu trạng thái Cache đang bật.</p>
<p>Nếu đăng tin hoặc sửa tin tức hoặc thực hiện các hành động trong module bất kỳ, <strong>hệ thống sẽ tự động xóa Cache</strong> và chúng ta không cần làm gì thêm!.</p>";

$lang_module['123host_specific_pages'] = "Chỉ định cho trang";
$lang_module['123host_specific_pages_des1'] = "<ul>
<li><strong>Cache cho Login Page:</strong> Bật hoặc tắt Cache cho trang Login. Mặc định là /admin hoặc /users. Nếu bạn đang tùy chỉnh đường dẫn đăng nhập admin, module sẽ tự cập nhật mà không cần làm gì thêm.</li>
<li><strong>Cache cho favicon.ico:</strong> Bật hay tắt cache cho favicon.ico.</li>
</ul>";

$lang_module['123host_check_requirement'] = "Kiểm tra tương thích của hệ thống.";

$lang_module['123host_check_requirement_des1'] = " để thực hiện kiểm tra tính tương thích của hệ thống.";
$lang_module['123host_support_info'] = "Thông tin hỗ trợ";
$lang_module['123host_support_info_des1'] = "<h4>Mọi thông tin hỗ trợ vui lòng liên hệ:</h4>
<ul>
    <li><strong>Email:</strong> support@123host.vn</li><br>
    <li><strong>SDT: 02873 002 123</strong> support@123host.vn</li><br>
    <li><strong>Ticket:</strong> <a href=\"https://client.123host.vn/?/tickets/new/&dept_id=1\" target=\"_blank\"> Gởi ticket hỗ trợ</a></li>
</ul>";