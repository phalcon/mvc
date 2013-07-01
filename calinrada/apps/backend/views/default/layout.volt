<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<title>{% block title %}Test8{% endblock %}</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="{% block meta_description %}Test description{% endblock %}">
<meta name="keywords" content="">
{{ stylesheet_link('assets/admin/default/css/bootstrap.css') }}
{{ stylesheet_link('assets/admin/default/css/styles.css') }}
{{ stylesheet_link('assets/admin/default/css/bootstrap-responsive.css') }}
{{ stylesheet_link('assets/admin/default/css/themes.css') }}
<!--[if IE 7]>
{{ stylesheet_link('assets/admin/default/css/ie/ie7.css') }}
<![endif]-->
<!--[if IE 8]>
{{ stylesheet_link('assets/admin/default/css/ie/ie8.css') }}
<![endif]-->
<!--[if IE 9]>
{{ stylesheet_link('assets/admin/default/css/ie/ie9.css') }}
<![endif]-->
{% block stylesheets %}{% endblock %}
<link rel="shortcut icon" href="ico/favicon.ico">
{{ javascript_include("assets/admin/default/js/jquery.js") }}
{{ javascript_include("assets/admin/default/js/bootstrap.min.js") }}
<script>
	$(function() {
			$('li.dropdown').mouseenter(function() {
				if($('body').hasClass('menu_hover')) {
					$(this).addClass('open')
				}
			}).mouseleave(function() {
				if($('body').hasClass('menu_hover')) {
					$(this).removeClass('open')
				}
			});
	});
</script>
{% block javascripts %}{% endblock %}
</head>
<body class="menu_hover">

{% block body %}{% endblock %}

{{ javascript_include("assets/admin/default/js/respond.min.js") }}
{{ javascript_include("assets/admin/default/js/ios-orientationchange-fix.js") }}
</body>
</html>