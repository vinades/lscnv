<!-- BEGIN: info -->
<div class="wrap">
	<h2 class="nav-tab-wrapper">
		<a class="nav-tab litespeed-tab nav-tab-active" href="?page=lscache-info#faqs" data-litespeed-tab="faqs">FAQs</a><a class="nav-tab litespeed-tab"
		    href="?page=lscache-info#config" data-litespeed-tab="config">Configuration</a><a class="nav-tab litespeed-tab" href="?page=lscache-info#compatibility"
		    data-litespeed-tab="compatibility">Plugin Compatibilities</a><a class="nav-tab litespeed-tab" href="?page=lscache-info#common_rewrite"
		    data-litespeed-tab="common_rewrite">Common Rewrite Rules</a><a class="nav-tab litespeed-tab" href="?page=lscache-info#admin_ip"
		    data-litespeed-tab="admin_ip">Admin IP Commands</a><a class="nav-tab litespeed-tab" href="?page=lscache-info#crawler" data-litespeed-tab="crawler">Crawler</a>		</h2>
	<div class="litespeed-cache-welcome-panel">

		<div data-litespeed-layout="faqs" style="display: block;">
			<h3 class="litespeed-title">
				LiteSpeed Cache FAQs <a href="javascript:;" class="litespeed-expend" data-litespeed-expend-all="faqs">+</a>
			</h3>

			<h4 class="litespeed-question litespeed-down">Is the LiteSpeed Cache Plugin for WordPress free?</h4>
			<div class="litespeed-answer" style="display: none;">
				<p>
					Yes, the plugin itself will remain free and open source. That said, a LiteSpeed server is required (see question 2) </p>
			</div>

			<h4 class="litespeed-question litespeed-down">What server software is required for this plugin?</h4>
			<div class="litespeed-answer" style="display: none;">
				<p>A LiteSpeed server is required in order to use this plugin.</p>
				<ol>
					<li>LiteSpeed Web Server Enterprise with LSCache Module (v5.0.10+)</li>
					<li>OpenLiteSpeed (v1.4.17+)</li>
					<li>LiteSpeed WebADC (v2.0+)</li>
				</ol>
				<p>Any single server or cluster including a LiteSpeed server will work.</p>
			</div>

			<h4 class="litespeed-question litespeed-down">Does this plugin work in a clustered environment?</h4>
			<div class="litespeed-answer" style="display: none;">
				<p>
					The cache entries are stored at the litespeed server level. The simplest solution is to use LiteSpeed WebADC, as the cache
					entries will be cached at that level. </p>
				<p>
					If using another load balancer, the cache entries will only be stored at the backend nodes, not at the load balancer. The
					purges will also not be synchronized across the nodes, so this is not recommended. </p>
				<p>
					If a customized solution is required, please contact LiteSpeed Technologies at info@litespeedtech.com </p>
				<p>NOTICE: The rewrite rules created by this plugin must be copied to the WebADC</p>

			</div>

			<h4 class="litespeed-question litespeed-down">Where are the cache entries stored?</h4>
			<div class="litespeed-answer" style="display: none;">
				<p>The actual cached pages are stored and managed by LiteSpeed Servers. Nothing is stored on the PHP side.</p>
			</div>

			<h4 class="litespeed-question litespeed-down">Is WooCommerce supported?</h4>
			<div class="litespeed-answer" style="display: none;">
				<p>
					In short, yes. However, for some woocommerce themes, the cart may not be updated correctly. </p>
				<p><b>To test the cart:</b></p>
				<ul>
					<li>On a non-logged-in browser, visit and cache a page, then visit and cache a product page.</li>
					<li>The first page should be accessible from the product page (e.g. the shop).</li>
					<li>Once both pages are confirmed cached, add the product to the cart.</li>
					<li>After adding to the cart, visit the first page.</li>
					<li>The page should still be cached, and the cart should be up to date.</li>
					<li>If that is not the case, please add woocommerce_items_in_cart to the do not cache cookie list.</li>
				</ul>
				<p>
					Some themes like Storefront and Shop Isle are built such that the cart works without the rule. However, other themes like
					the E-Commerce theme, do not, so please verify the theme used. </p>
			</div>

			<h4 class="litespeed-question litespeed-down">Are my images optimized?</h4>
			<div class="litespeed-answer" style="display: none;">
				<p>
					The cache plugin does not do anything with the images themselves. We recommend you trying an image optimization plugin like
					<a href="https://shortpixel.com/h/af/CXNO4OI28044" rel="friend noopener noreferer" target="_blank">ShortPixel</a>					to optimize your images. It can reduce your site's images up to 90%. </p>
			</div>

			<h4 class="litespeed-question litespeed-down">How do I get WP-PostViews to display an updating view count?</h4>
			<div class="litespeed-answer" style="display: none;">
				<ol>
					<li>Use <code>&lt;div id="postviews_lscwp"&gt;&lt;/div&gt;</code> to replace <code>&lt;?php if(function_exists('the_views')) { the_views(); } ?&gt;</code>
						<ul>
							<li>NOTE: The id can be changed, but the div id and the ajax function must match.</li>
						</ul>
					</li>
					<li>Replace the ajax query in <code>wp-content/plugins/wp-postviews/postviews-cache.js</code> with <textarea id="wpwrap"
						    rows="11" readonly="">jQuery.ajax({
		type:"GET",
		url:viewsCacheL10n.admin_ajax_url,
		data:"postviews_id="+viewsCacheL10n.post_id+"&amp;action=postviews",
		cache:!1,
		success:function(data) {
			if(data) {
				jQuery('#postviews_lscwp').html(data+' views');
			}
		}
	});</textarea> </li>
					<li>
						Purge the cache to use the updated pages. </li>
				</ol>
			</div>

		</div>
		<div data-litespeed-layout="config" style="display: none;">
			<h3 class="litespeed-title">LiteSpeed Cache Configuration</h3>


			<h4>Instructions for LiteSpeed Web Server Enterprise</h4>
			<p>
				Make sure that the server license has the LSCache module enabled. A <a href="https://www.litespeedtech.com/products/litespeed-web-server/download/get-a-trial-license"
				    rel="noopener noreferrer" target="_blank">2-CPU trial license with LSCache module</a> is available for free for 15 days.</p>
			<p>
				The server must be configured to have caching enabled. If you are the server admin, <a href="https://www.litespeedtech.com/support/wiki/doku.php/litespeed_wiki:cache:common_installation#web_server_configuration"
				    rel="noopener noreferrer" target="_blank">click here.</a> Otherwise request that the server admin configure the cache
				root for the server.</p>
			<p>
				In the .htaccess file for the WordPress installation, add the following:<textarea id="wpwrap" rows="3" readonly="">&lt;IfModule LiteSpeed&gt;
   CacheLookup public on
&lt;/IfModule&gt;</textarea>
			</p>


			<h4>Instructions for OpenLiteSpeed</h4>
			<p>This integration utilizes OLS's cache module.</p>
			<p>
				If it is a fresh OLS installation, the easiest way to integrate is to use <a href="http://open.litespeedtech.com/mediawiki/index.php/Help:1-Click_Install"
				    rel="noopener noreferrer" target="_blank">ols1clk.</a> If using an existing WordPress installation, use the --wordpresspath
				parameter. Else if OLS and WordPress are already installed, please follow the instructions <a href="http://open.litespeedtech.com/mediawiki/index.php/Help:How_To_Set_Up_LSCache_For_WordPress"
				    rel="noopener noreferrer" target="_blank">here.</a></p>


			<h3>How to test the plugin</h3>
			<p>The LiteSpeed Cache Plugin utilizes LiteSpeed specific response headers.</p>
			<p>
				Visiting a page for the first time should result in a <br><code>X-LiteSpeed-Cache-Control:miss</code><br> or <br><code>X-LiteSpeed-Cache-Control:no-cache</code><br>				response header for the page.</p>
			<p>
				Subsequent requests should have the <code>X-LiteSpeed-Cache-Control:hit</code><br> response header until the page is
				updated, expired, or purged.</p>
			<p>
				Please visit <a href="https://www.litespeedtech.com/support/wiki/doku.php/litespeed_wiki:cache:lscwp:installation#testing"
				    rel="noopener noreferrer" target="_blank">this page</a> for more information.</p>








		</div>
		<div data-litespeed-layout="compatibility" style="display: none;">
			<h3 class="litespeed-title">LiteSpeed Cache Plugin Compatibility</h3>

			<p><a href="https://wordpress.org/support/topic/known-supported-plugins?replies=1" rel="noopener noreferrer" target="_blank">Link Here</a></p>
			<p>
				Please add a comment listing the plugins that you are using and how they are functioning on the support thread. With your
				help, we can provide the best WordPress caching solution.</p>

			<h4>This is a list of plugins that are confirmed to be compatible with LiteSpeed Cache Plugin:</h4>
			<ul>
				<li>bbPress</li>
				<li>WooCommerce</li>
				<li>Contact Form 7</li>
				<li>Google XML Sitemaps</li>
				<li>Yoast SEO</li>
				<li>Wordfence Security</li>
				<li>NextGen Gallery</li>
				<li>Aelia CurrencySwitcher</li>
				<li>Fast Velocity Minify, thanks to Raul Peixoto</li>
				<li>Autoptimize</li>
				<li>Better WP Minify</li>
				<li>WP Touch</li>
				<li>Theme My Login</li>
				<li>wpForo</li>
				<li>WPLister</li>
				<li>Avada</li>
				<li>WP-PostRatings</li>
			</ul>

			<h4>This is a list of known UNSUPPORTED plugins:</h4>
			<ul>
				<li>NILL</li>
			</ul>


		</div>
		<div data-litespeed-layout="common_rewrite" style="display: none;">
			<h3 class="litespeed-title">LiteSpeed Cache Common Rewrite Rules</h3>

			<div class="litespeed-callout litespeed-callout-warning">
				<h4>NOTICE:</h4>
				<p>The following rewrite rules can be configured in the LiteSpeed Cache settings page. Please make any needed changes on
					that page. It will automatically generate the correct rules in the htaccess file.</p>
			</div>

			<h4 class="litespeed-question litespeed-down">Mobile Views:</h4>
			<div class="litespeed-answer" style="display: none;">
				<p>
					Some sites have adaptive views, meaning the page sent will adapt to the browser type (desktop vs mobile). This rewrite rule
					is used for sites that load a different page for each type. </p>
				<p>
					This configuration can be added on the settings page in the General tab. </p>
				<textarea id="wpwrap" rows="2" readonly="">RewriteCond %{HTTP_USER_AGENT} Mobile|Android|Silk/|Kindle|BlackBerry|Opera\ Mini|Opera\ Mobi [NC]
RewriteRule .* - [E=Cache-Control:vary=ismobile]</textarea>
			</div>

			<h4 class="litespeed-question litespeed-down">Do Not Cache Cookies:</h4>
			<div class="litespeed-answer" style="display: none;">
				<p>Another common rewrite rule is to notify the cache not to cache when it sees a specified cookie name.</p>
				<p>This configuration can be added on the settings page in the Do Not Cache tab.</p>
				<textarea id="wpwrap" rows="2" readonly="">RewriteCond %{HTTP_COOKIE} dontcachecookie
RewriteRule .* - [E=Cache-Control:no-cache]</textarea>
			</div>

			<h4 class="litespeed-question litespeed-down">Do Not Cache User Agent:</h4>
			<div class="litespeed-answer" style="display: none;">
				<p>A not so commonly used rewrite rule is to notify the cache not to cache when it sees a specified User Agent.</p>
				<p>This configuration can be added on the settings page in the Do Not Cache tab.</p>
				<textarea id="wpwrap" rows="2" readonly="">RewriteCond %{HTTP_USER_AGENT} dontcacheuseragent
RewriteRule .* - [E=Cache-Control:no-cache]</textarea>
			</div>
		</div>
		<div data-litespeed-layout="admin_ip" style="display: none;">
			<h3 class="litespeed-title">Admin IP Query String Actions</h3>

			<h4>The following commands are available to the admin and do not require log-in, providing quick access to actions on the
				various pages.</h4>

			<h4>Action List:</h4>

			<ul>
				<li>NOCACHE - This is used to display a page without caching it. An example use case is to compare a cached version of a
					page with an uncached version.</li>
				<li>PURGE - This is used to purge most cache tags associated with the page. The lone exception is the blog ID tag. Note that
					this means that pages with the same cache tag will be purged as well.</li>
				<li>PURGESINGLE - This is used to purge the first cache tag associated with the page.</li>
				<li>SHOWHEADERS - This is used to show all the cache headers associated with a page. This may be useful for debugging purposes.</li>
			</ul>

			<h5>To trigger the action for a page, access the page with the query string <code>?LSCWP_CTRL=ACTION</code></h5>
		</div>
		<div data-litespeed-layout="crawler" style="display: none;">
			<h3 class="litespeed-title">
				Crawler Introduction <a href="javascript:;" class="litespeed-expend" data-litespeed-expend-all="crawler">+</a>
			</h3>

			<h4 class="litespeed-question litespeed-down">How Does the Crawler Work?</h4>
			<div class="litespeed-answer" style="display: none;">
				<p>Using a sitemap as a guide, LSCache’s crawler, travels its way throughout the backend, refreshing pages that have expired
					in the cache. The purpose is to keep the cache as fresh as possible while minimizing visitor exposure to uncached content.</p>

				<p>The sitemap can be generated by the crawler, or you can provide your own custom map.</p>

				<p>To learn more about each of the crawler settings, see <a href="https://www.litespeedtech.com/support/wiki/doku.php/litespeed_wiki:cache:lscwp:configuration#crawler_settings"
					    target="_blank">our wiki - Crawler Settings</a>.</p>
			</div>


			<h4 class="litespeed-question litespeed-down">Should I Enable the Crawler?</h4>
			<div class="litespeed-answer" style="display: none;">
				<p>Not every site needs a crawler.</p>

				<p>In WordPress, the first visitor to an uncached page waits for the page to be dynamically-generated and served, and the
					page is then cached for subsequent visitors.</p>

				<p>The LSCache crawler makes the first visitor’s experience better by essentially becoming the first visitor. The crawler
					caches the page, and the visitor who would have been first is spared the wait. As such, the crawler realistically only
					benefits the first out of the many users who visit that page before it expires. If you have a small user base, then
					crawling impacts a greater percentage of your visitors than it would on a site that draws a large crowd.</p>

				<p>You should weigh this benefit against your server’s resources. If resources are plentiful, then the crawler is a nice
					thing to have.</p>

				<p>If your site is busy, you’ll find that commonly-visited pages are quickly re-cached by new visitors, without the aid
					of a crawler. An extra crawler task would compete for server resources while delivering minimal benefits.</p>

				<p>The decision to use a crawler depends on the busy-ness of the site and the availability of server resources. Ultimately,
					it is the hosting provider who can best make this call.</p>
			</div>



			<h4 class="litespeed-question litespeed-down">Enabling the Crawler</h4>
			<div class="litespeed-answer" style="display: none;">
				<p>Due to the potential of the crawler to consume considerable resources, we have put the on/off switch in the hands of
					the server administrators. The crawler is disabled by default and can only be enabled by an admin.</p>

				<p>Instructions for enabling the crawler can be found in <a href="https://www.litespeedtech.com/support/wiki/doku.php/litespeed_wiki:cache:lscwp:configuration:enabling_the_crawler"
					    target="_blank">our wiki - Enabling the Crawler</a>. If you do not have access to server configuration files or virtual
					host include files, you will need to ask your web host for assistance.</p>
			</div>



			<h4 class="litespeed-question litespeed-down">Testing the Crawler</h4>
			<div class="litespeed-answer" style="display: none;">
				<p>To determine whether the crawler is working as expected, you can test it with a single URL.</p>

				<ul>
					<li>
						Pick a URL from your sitemap and purge it:<br> Navigate to <b>LiteSpeed Cache &gt; Manage &gt; Purge By… &gt; URL</b>						and enter the full URL in the text box. </li>
					<li>
						Manually run the crawler:<br> Navigate to <b>LiteSpeed Cache &gt; Crawler</b>, make sure <b>Activation</b> is set to
						Enable, and press the <b>Manually run</b> button. Wait for it to finish. </li>
					<li>
						See if the purged URL was cached during the crawl:<br> Turn on your browser’s Developer Tool/Inspector. Visit the URL
						that should have been crawled. Select the <b>Network</b> tab in the inspector, select the page request (the URL we
						just visited - it should be the first entry in the list), and select the <b>Header</b> tab. If the URL was crawled
						correctly, you will see the response header X-LiteSpeed-Cache: hit. </li>
				</ul>
			</div>

			<h5>If you don’t see X-LiteSpeed-Cache: hit, and you can’t figure out why the crawler didn’t cache the purged URL, you can
				visit <a href="https://wordpress.org/support/plugin/litespeed-cache" target="_blank">our support forum</a> for help.</h5>
		</div>
	</div>
</div>
<!-- END: info -->