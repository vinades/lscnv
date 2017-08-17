<!-- BEGIN: config -->

<div class="wrap">
	<div>
		<h2 class="nav-tab-wrapper">
			<a class="nav-tab litespeed-tab" href="#general" data-litespeed-tab="general">Cấu hình chung</a>
			<a class="nav-tab litespeed-tab nav-tab-active" href="#specific" data-litespeed-tab="specific">Chỉ định cho trang</a>
		</h2>
	</div>
	<div class="litespeed-cache-welcome-panel">
		<p>{MESSAGE}</p>
		<form method="post" action="" id="litespeed_form_options">
			<div data-litespeed-layout="general" style="display: none;">
				<h3 class="litespeed-title">Thông tin</h3>

				<table class="form-table">
					<tbody>

						<tr>
							<th>Thời gian lưu Cache chung</th>
							<td>
								<input type="text" class="regular-text " name="public_cache_ttl" value="{PUBLIC_CACHE_TTL}"> giây
								<div class="litespeed-desc">
									Điền số, đơn vị tính là giây cho thời gian lưu cache chung. Tối thiểu 30 giây. Giá trị đề xuất là 7 ngày: 604800
								</div>
							</td>
						</tr>
						<tr>
							<th>Thời gian lưu cache trang chủ</th>
							<td>
								<input type="text" class="regular-text " name="front_page_cache_ttl" value="{FRONT_PAGE_CACHE_TTL}"> giây
								<div class="litespeed-desc">
									Điền số, đơn vị tính là giây cho thời gian lưu cache của trang chủ. Tối thiểu 30 giây. Giá trị đề xuất là 7 ngày: 604800
									</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div data-litespeed-layout="specific" style="display: block;">
				<h3 class="litespeed-title">Thông tin</h3>
				<table class="form-table">
					<tbody>
						<tr>
							<th>Cache cho Login Page</th>
							<td>
								<div class="litespeed-row">
									<div class="litespeed-switch litespeed-label-info">
										<input type="radio" name="cache_login_page" id="conf_cache_login_1" value="1" {ENABLE_CACHE_LOGIN_PAGE_CHECKED}>
										<label for="conf_cache_login_1">Enable</label>
										<input type="radio" name="cache_login_page" id="conf_cache_login_0"
										    value="0" {DISABLE_CACHE_LOGIN_PAGE_CHECKED}>
										<label for="conf_cache_login_0">Disable</label>
									</div>
								</div>
								<div class="litespeed-desc">
									Tùy chọn tắt hay bật Cache cho trang login của admin và user. </div>
							</td>
						</tr>
						<tr>
							<th>Cache cho favicon.ico</th>
							<td>
								<div class="litespeed-row">
									<div class="litespeed-switch litespeed-label-info">
										<input type="radio" name="cache_favicon" id="conf_cache_favicon_1" value="1" {ENABLE_CACHE_FAVICON_CHECKED}>
										<label for="conf_cache_favicon_1">Enable</label>
										<input type="radio" name="cache_favicon"  id="conf_cache_favicon_0" value="0"  {DISABLE_CACHE_FAVICON_CHECKED}> 
										<label for="conf_cache_favicon_0">Disable</label> </div>
								</div>
								<div class="litespeed-desc">
									Bật hay tắt cache cho favicon.ico . Khuyến cáo nên bật để tăng hiệu năng.</div>
							</td>
						</tr>
						<!-- build_setting_cache_resources -->
					</tbody>
				</table>
			</div>

			<div class="litespeed-top20"></div>
			<p class="submit"><input type="submit" name="litespeed-submit" id="litespeed-submit" class="btn btn-primary" value="Save Changes"></p>
		</form>
	</div>
</div>

<!-- END: config -->