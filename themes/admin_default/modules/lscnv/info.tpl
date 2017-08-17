<!-- BEGIN: info -->
<div class="wrap">
	<h2 class="nav-tab-wrapper">
		<a class="nav-tab litespeed-tab nav-tab-active" href="#about" data-litespeed-tab="about">Giới thiệu</a>
		<a class="nav-tab litespeed-tab" href="#cache_management"  data-litespeed-tab="cache_management">Hướng dẫn Quản lý Cache</a>
		<a class="nav-tab litespeed-tab"  href="#config" data-litespeed-tab="config">Hướng dẫn cấu hình</a>
		<a class="nav-tab litespeed-tab" href="#requirement_check" data-litespeed-tab="requirement_check">Kiểm tra tương thích</a>
		<a class="nav-tab litespeed-tab" href="#support" data-litespeed-tab="support">Thông tin hỗ trợ</a>
	</h2>
	<div class="litespeed-cache-welcome-panel">

		<div data-litespeed-layout="about" style="display: block;">
			<h3 class="litespeed-title">
				Giới thiệu Module
			</h3>
			<p>Module này được <a href="https://123host.vn/" target="_blank">123HOST</a> phát triển riêng cho dịch vụ <a href="https://123host.vn/nukeviet-hosting.html"
				    target="_blank">Nukeviet Hosting</a> . Một dịch vụ hosting cao cấp dành riêng cho mã nguồn mở Nukeviet. Mục đích:</p>
			<ol>
				<li><strong>Tăng tốc gấp nhiều lần cho website Nukeviet:</strong> Phản hồi từ máy chủ khi truy cập một website Nukeviet tầm
					<strong>200  mili giây (ms)</strong> đến <strong>2 giây (s)</strong>. Khi bật tính năng Cache của module này, thời gian
					phản hồi của máy chủ sẽ giảm xuống chỉ còn <strong>10</strong> đến <strong>20 mili giây</strong>.</li>
				<br>
				<li><strong>Tự cập nhật Cache:</strong> Tự động xóa cache và cập nhật Cache khi có thay đổi như cập nhật tin tức hay module.</li><br>
				<li><strong>Tăng lượng online tối đa:</strong> Vì <strong>Web Server</strong/> sử dụng bản Cache được lưu từ trước để phản hồi cho người truy
					cập nên hầu như máy chủ phía sau không cần xử lý PHP & MySQL, vì vậy lượng online tối đa của website sẽ tăng lên gấp
					nhiều lần. </li>
				<br>
				<li><strong>Hạn chế thiệt hại khi bị tấn công HTTP Flood:</strong> HTTP Flood là hình thức tấn công làm máy chủ quá tải bằng cách gởi nhiều request đến web server. Nếu module cache được bật, sẽ giảm tải cho hệ thống và hạn chế tình trạng quá tải máy chủ khi bị tấn
					công HTTP Flood</li>
			</ol>

			<h3 class="litespeed-title">
				Câu hỏi thường gặp <a href="javascript:;" class="litespeed-expend" data-litespeed-expend-all="faqs">+</a>
			</h3>

			<h4 class="litespeed-question litespeed-down">Module 123HOST LSCache cho Nukeviet do ai phát triển?</h4>
			<div class="litespeed-answer" style="display: none;">
				<p>
					<a href="https://123host.vn/" target="_blank">123HOST</a> là đơn vị phát triển module này. </p>
			</div>

			<h4 class="litespeed-question litespeed-down">Module này hoạt động với cơ chế như thế nào?</h4>
			<div class="litespeed-answer" style="display: none;">
				<p>Module này là giao diện để điều kiển cache tại phía <strong>Web Server</strong/>. Chính <strong>Web Server</strong> tại máy chủ là nhân tố thực hiện Cache. Các tính năng của module:</p>
				<ol>
					<li>Bật / Tắt cache</li>
					<li>Cấu hình thời gian cache</li>
					<li>Xóa cache</li>
				</ol>
			</div>

			<h4 class="litespeed-question litespeed-down">Cache là gì?</h4>
			<div class="litespeed-answer" style="display: none;">
				<p>
					<strong>Cache</strong> là công nghệ tăng tốc website. Khi người dùng truy cập vào website, <strong>Web Server</strong> sẽ lưu lại một bản cache, lần sau khi có truy cập cùng URL trên, <strong>Web Server</strong> sẽ dùng bản Cache để phản hồi cho người dùng mà không cần phải xử lý backend phía sau. </p>
			</div>

			<h4 class="litespeed-question litespeed-down">Sử dụng Hosting của Nhà cung cấp khác không phải là 123HOST thì có dùng được module này không?</h4>
			<div class="litespeed-answer" style="display: none;">
				<p>Sẽ không dùng được module này vì <strong>Web Server</strong/> của các nhà cung cấp khác không tương thích công nghệ với module này.</p>
			</div>

			<h4 class="litespeed-question litespeed-down">Dùng VPS có chạy được module này không?</h4>
			<div class="litespeed-answer" style="display: none;">
				<p>
					Rất tiếc module này chưa hỗ trợ cho VPS. Chỉ tương thích với dịch vụ <a href="https://123host.vn/nukeviet-hosting.html" target="_blank">Nukeviet Hosting</a> </p>
			</div>

			<h4 class="litespeed-question litespeed-down">Phiên bản Nukeviet nào được hỗ trợ?</h4>
			<div class="litespeed-answer" style="display: none;">
				<p>
					Module hiện tại chỉ hỗ trợ Nukeviet 4.</p>
			</div>


		</div>
		
		<div data-litespeed-layout="cache_management" style="display: none;">
			<h3 class="litespeed-title">Quản lý Cache</h3>
			<p> Tính năng này tại menu <strong>Quản Lý Cache</strong>. Tại đây người quản trị có thể:</p>
			<ul>
				<li><strong>Xem trạng thái Cache:</strong> <strong> Đang bật</strong> hoặc <strong>Đang tắt</strong></li>
				<li><strong>Bật / Tắt Cache:</strong> Thực hiện bật hoặc tắt Cache.</li>
				<li><strong>Xóa Cache trang chủ:</strong> Xóa cache cho trang chủ. Ví dụ: Nếu website của bạn là https://123host.vn/ khi chọn tính năng này, cache cho URL https://123host.vn/ hoặc https://123host.vn/vi/ sẽ bị xóa. </li>
				<li><strong>Xóa tất cả cache:</strong> Xóa tất cả Cache đang có. <strong>Web Server</strong/> sẽ cập nhật lại Cache mới sau khi xóa</li>
			</ul>
			<p>Sau khi xóa Cache, cache mới sẽ được tạo nếu trạng thái Cache đang bật.</p>
			<p>Nếu đăng tin hoặc sửa tin tức hoặc thực hiện các hành động trong module bất kỳ, <strong>hệ thống sẽ tự động xóa Cache</strong> và chúng ta không cần làm gì thêm!.</p>
		</div>
		<div data-litespeed-layout="config" style="display: none;">
			<h3 class="litespeed-title">Cấu hình chung</h3>
			
			<ul>
				<li><strong>Thời gian lưu Cache chung:</strong> Là thời gian tối đa lưu cache cho tất cả các URL (trừ URL trang chủ). Quá thời gian này Cache sẽ hết hạn và hệ thống sẽ cập nhật Cache mới.</li>
				<li><strong>Thời gian lưu cache trang chủ:</strong> Là thời gian lưu Cache cho Trang chủ. URL là / </li>
			</ul>
			<h3 class="litespeed-title">Chỉ định cho trang</h3>
			
			<ul>
				<li><strong>Cache cho Login Page:</strong> Bật hoặc tắt Cache cho trang Login. Mặc định là /admin hoặc /users. Nếu bạn đang tùy chỉnh đường dẫn đăng nhập admin, module sẽ tự cập nhật mà không cần làm gì thêm.</li>
				<li><strong>Cache cho favicon.ico:</strong> Bật hay tắt cache cho favicon.ico.</li>
				
			</ul>
		</div>
		<div data-litespeed-layout="requirement_check" style="display: none;">
			<h3 class="litespeed-title">Kiểm tra tương thích của hệ thống.</h3>

			<div class="litespeed-callout litespeed-callout-warning">
				<p>{BUTTON_CHECK_REQUIREMENT} để thực hiện kiểm tra tính tương thích của hệ thống.</p>
			</div>
		</div>
		<div data-litespeed-layout="support" style="display: none;">
			<h3 class="litespeed-title">Thông tin hỗ trợ</h3>

			<h4>Mọi thông tin hỗ trợ vui lòng liên hệ</h4>

			<ul>
				<li><strong>Email:</strong> support@123host.vn</li><br>
				<li><strong>SDT: 02873 002 123</strong> support@123host.vn</li><br>
				<li><strong>Ticket:</strong> <a href="https://client.123host.vn/?/tickets/new/&dept_id=1" target="_blank"> Gởi ticket hỗ trợ</a></li>
			</ul>
		</div>

	</div>
</div>
<!-- END: info -->