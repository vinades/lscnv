123HOST LSCache
=======
Module này được 123HOST phát triển riêng cho dịch vụ Nukeviet Hosting . Một dịch vụ hosting cao cấp dành riêng cho mã nguồn mở Nukeviet. 

Mục đích:
--------
* Tăng tốc gấp nhiều lần cho website Nukeviet: Phản hồi từ máy chủ khi truy cập một website Nukeviet tầm 200 mili giây (ms) đến 2 giây (s). Khi bật tính năng Cache của module này, thời gian phản hồi của máy chủ sẽ giảm xuống chỉ còn 10 đến 20 mili giây.
* Tăng lượng online tối đa: Vì Web Server sử dụng bản Cache được lưu từ trước để phản hồi cho người truy cập nên hầu như máy chủ phía sau không cần xử lý PHP & MySQL, vì vậy lượng online tối đa của website sẽ tăng lên gấp nhiều lần.
* Hạn chế thiệt hại khi bị tấn công HTTP Flood: HTTP Flood là hình thức tấn công làm máy chủ quá tải bằng cách gởi nhiều request đến web server. Nếu module cache được bật, sẽ giảm tải cho hệ thống và hạn chế tình trạng quá tải máy chủ khi bị tấn công HTTP Flood

Tương thích:
--------
* NukeViet 4.0, NukeViet 4.0 Official, NukeViet 4.1 Official, NukeViet 4.2
* Module: Shop

Tính năng:
--------
* Bật và tắt Cache
* Tự động xóa cache khi có cập nhật (thêm bài viết, các thao tác chỉnh sửa module)
* Không cache khi người dùng Login (admin / User)
* Không cache khi thêm đơn hàng, thanh toán
* Hỗ trợ đa ngôn ngữ: Tiếng Việt và Tiếng Anh

