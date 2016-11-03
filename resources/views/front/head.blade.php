<head>
	<title>{{$user->blog_url?:$user->email}}'s Blog | {{$user->description->brief}}</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="theme-color" content="#3F51B5">
	<meta name="google-site-verification" content="rlxpN--EBnMOLJnY1efTuwShQId3YX7A6RWkQEr0y9c">
	<meta name="keywords" content="{{$user->description->keyword}}">
	<meta name="description" content="{$user->description->description}}">
	<meta property="og:type" content="website">
	<meta property="og:title" content="{{$user->blog_url}}'s' Blog">
	<meta property="og:url" content="http://imys.net/index.html">
	<meta property="og:site_name" content="{{$user->blog_url}}'s Blog">
	<meta property="og:description" content="{$user->description->description}}">
	<meta name="twitter:card" content="summary">
	<meta name="twitter:title" content="{$user->blog_url}}'s Blog">
	<meta name="summary" content="{$user->description->description}}">
	<meta name="twitter:description" content="{$user->description->description}}">
	<link rel="stylesheet" href="/front/css/style.css">
	<link rel="stylesheet" href="/front/css/myRewards.css">
</head>
