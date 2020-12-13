<!DOCTYPE html>
<html lang="en">
<head>
	<base href="{{ asset('') }}">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
	<style>
		/* http://meyerweb.com/eric/tools/css/reset/ 
		   v2.0 | 20110126
		   License: none (public domain)
		*/

		html, body, div, span, applet, object, iframe,
		h1, h2, h3, h4, h5, h6, p, blockquote, pre,
		a, abbr, acronym, address, big, cite, code,
		del, dfn, em, img, ins, kbd, q, s, samp,
		small, strike, strong, sub, sup, tt, var,
		b, u, i, center,
		dl, dt, dd, ol, ul, li,
		fieldset, form, label, legend,
		table, caption, tbody, tfoot, thead, tr, th, td,
		article, aside, canvas, details, embed, 
		figure, figcaption, footer, header, hgroup, 
		menu, nav, output, ruby, section, summary,
		time, mark, audio, video {
			margin: 0;
			padding: 0;
			border: 0;
			font-size: 100%;
			font: inherit;
			vertical-align: baseline;
		}
		/* HTML5 display-role reset for older browsers */
		article, aside, details, figcaption, figure, 
		footer, header, hgroup, menu, nav, section {
			display: block;
		}
		body {
			background-color: black;
			background-image: url(https://images5.alphacoders.com/109/thumb-1920-1099191.jpg);
			background-attachment: fixed;
			background-size: cover;
			background-position: center;
			font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto,
            "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji",
            "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
			line-height: 1;
		}
		ol, ul {
			list-style: none;
		}
		blockquote, q {
			quotes: none;
		}
		blockquote:before, blockquote:after,
		q:before, q:after {
			content: '';
			content: none;
		}
		table {
			border-collapse: collapse;
			border-spacing: 0;
		}
	</style>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="main" id="root">
		<div class="container">
			<div class="navigation menu">
				<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
					<a class="navbar-brand" href="{{ route('genshintoy.index') }}" style="font-weight: bold;">GenshinToy</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
				    <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="collapsibleNavbar">
				  <ul class="navbar-nav mr-auto">
				    <li class="nav-item">
				      <a class="nav-link" href="{{ route('genshintoy.calculateDamage') }}">Tính Damage</a>
				    </li>
				    <li class="nav-item dropdown">
				      <a class="nav-link dropdown-toggle" data-toggle="dropdown" id="char-menu-dropdown" href="#">Nhân vật</a>
				      <div class="dropdown-menu">
				      	<a href="{{ route('genshintoy.index') }}" class="dropdown-item">Danh sách nhân vật</a>
				      </div>
				    </li>
				    <li class="nav-item dropdown">
				      <a class="nav-link dropdown-toggle" data-toggle="dropdown" id="char-menu-dropdown" href="#">Trang bị</a>
				      <div class="dropdown-menu">
				      	<a href="{{ route('genshintoy.weapons') }}" class="dropdown-item">Vũ khí</a>
				      	<a href="{{ route('genshintoy.artifacts') }}" class="dropdown-item">Thánh di vật</a>
				      </div>
				    </li>
				  </ul>
				</div>
				  <!--
				  <form class="form-inline" action="/action_page.php">
				    <input class="form-control mr-sm-2" type="text" placeholder="Nhập từ khóa">
				    <button class="btn" style="    
				    color: #000000;
				    background-color: #C8E0F7;
				    border-color: #30353B;" type="submit">Tìm kiếm</button>
				  </form>-->
				</nav>
			</div>