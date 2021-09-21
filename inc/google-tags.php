<?php
/**
 * Google Tag Manager
 *
 * @package      COR-2021
 * @author       Mark Corpuz
 * @since        1.0.9
**/

/**
 * Add Google Tag Manager code in <head>
 * 
 */

add_action( 'wp_head', 'urc_google_tag_manager_js' );
function urc_google_tag_manager_js() {

	<!-- Global site tag (gtag.js) - Google Ads: 1006737213 --> <script async src="https://www.googletagmanager.com/gtag/js?id=AW-1006737213"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'AW-1006737213'); </script>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-556922-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());
	  gtag('config', 'UA-556922-1');
	  gtag('config', 'AW-1006737213');
	</script>

	<meta name="p:domain_verify" content="0a4ace3e1ac7c1854a32de7541879163"/>

	<meta name="facebook-domain-verification" content="hk62ntn5lngv984v3f4drv4bklad5g" />

	<script data-ad-client="ca-pub-0947746501358966" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	                                
	<!-- Facebook Pixel Code -->
	<script>
	  !function(f,b,e,v,n,t,s)
	  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
	  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
	  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
	  n.queue=[];t=b.createElement(e);t.async=!0;
	  t.src=v;s=b.getElementsByTagName(e)[0];
	  s.parentNode.insertBefore(t,s)}(window, document,'script',
	  'https://connect.facebook.net/en_US/fbevents.js');
	  fbq('init', '342285032648063');
	  fbq('track', 'PageView');
	</script>
	<noscript><img height="1" width="1" style="display:none"
	  src="https://www.facebook.com/tr?id=342285032648063&ev=PageView&noscript=1"
	/></noscript>
	<!-- End Facebook Pixel Code -->

	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-WQFDBGR');</script>
	<!-- End Google Tag Manager -->

}


/**
 * Add Google Tag Manager code immediately after opening <body> tag
 * 
 */

add_action( 'genesis_before', 'urc_google_tag_manager_no_js' );
function urc_google_tag_manager_no_js() {

	<!-- Twitter universal website tag code -->
	<script>
	!function(e,t,n,s,u,a){e.twq||(s=e.twq=function(){s.exe?s.exe.apply(s,arguments):s.queue.push(arguments);
	},s.version='1.1',s.queue=[],u=t.createElement(n),u.async=!0,u.src='//static.ads-twitter.com/uwt.js',
	a=t.getElementsByTagName(n)[0],a.parentNode.insertBefore(u,a))}(window,document,'script');
	// Insert Twitter Pixel ID and Standard Event data below
	twq('init','nzg7t');
	twq('track','PageView');
	</script>
	<!-- End Twitter universal website tag code -->

	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WQFDBGR"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->

}