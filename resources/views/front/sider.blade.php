<div id="loading" class=""></div>
<nav id="menu">
 	<div class="inner flex-row-vertical">
		<a href="javascript:;" class="header-icon waves-effect waves-circle waves-light" id="menu-off"><i class="icon icon-lg icon-close"></i></a>
		<div class="brand-wrap">
			<div class="brand">
				<a href="" class="avatar"><img src="{{$user->avatar}}"></a>
				<hgroup class="introduce">
					<h5 class="nickname">{{$user->blog_url}}</h5>
					<a href="mailto:{{$user->email}}" title="{{$user->email}}" class="mail">{{$user->email}}</a>
				</hgroup>
			</div>
		</div>
		<ul class="nav flex-col">
			<li class="waves-block waves-effect active">
				<a href="{{route('front.index',$user->blog_url)}}"><i class="icon icon-lg icon-home"></i>Home</a>
			</li>

			<li class="waves-block waves-effect">
				<a href=""><i class="icon icon-lg icon-archives"></i>Archives</a>
			</li>

			<li class="waves-block waves-effect">
				<a href=""><i class="icon icon-lg icon-tags"></i>Tags</a>
			</li>
            @if($user->gitHub_name)
			<li class="waves-block waves-effect">
				<a href="https://github.com/{{$user->gitHub_name}}" target="_blank"><i class="icon icon-lg icon-github"></i>Github</a>
			</li>
            @endif
            @if($user->sina_id)
			<li class="waves-block waves-effect">
				<a href="http://weibo.com/{{$user->sina_id}}" target="_blank"><i class="icon icon-lg icon-weibo"></i>Weibo</a>
			</li>
            @endif
            @if($user->linked_in)
            <li class="waves-block waves-effect">
                <a href="{{$user->linked_in}}" target="_blank"><i class="icon icon-lg icon-linkedin"></i>LinkedIn</a>
            </li>
            @endif
            @if($user->twitter)
            <li class="waves-block waves-effect">
                <a href="https://twitter.com/{{$user->twitter}}" target="_blank"><i class="icon icon-lg icon-twitter"></i>Twitter</a>
            </li>
            @endif
		</ul>

		<footer class="footer">
			<p><a rel="license" target="_blank" href=""><img alt="Creative Commons License" style="border-width:0;vertical-align:middle;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFAAAAAPCAMAAABEF7i9AAAAllBMVEUAAAD///+rsapERER3d3eIiIjMzMzu7u4iIiKUmZO6v7rKzsoODg4RERFVVVUNDQ0NDg0PEA8zMzNLTEtbXltmZmZydnF9gn2AgICPkI+ZmZmqqqq7u7vFxsXIzMgNDQwZGRkgICAhISEkJSMnKCcuMC4xMzE5Ozk7PTtBQkFCQkJDQ0Nna2eGhoaHh4ezuLLGysbd3d1wVGpAAAAA4UlEQVR42q2T1xqCMAyFk7QsBQeKA9x7j/d/OSm22CpX0nzcpA1/T05aAOuBVkMAScQFHLnEwoCo2f1TnQIGoVMewjZEjVFN4GH1Ue1Cn2jWqwfsOOj6wDwGvotsl/c8lv7KIq1eLOsT0HMFHMIE/RZyHnlphryT9zyV+8WH5e8yQw3wnQvgAFxPTKUVi555SHR/lOfLMgVTeDlSfN+TaoUsiTyeIm+bCkHvCA2FUKG48LDtYBZBknsYP/G8NTw0gaaHyuQf4H5pecrB/FYCT2sL9zAfy1Xyjou6L8X2W7YcLyBZCRtnq/zfAAAAAElFTkSuQmCC"></a></p>
			<p>Yusen's Blog © 2016</p>
			<p>Power by <a href="http://hexo.io/" target="_blank">Hexo</a> Theme
			<a href="https://github.com/yscoder/hexo-theme-indigo" target="_blank">indigo</a></p>
			<a href="" target="_blank" class="rss" title="rss"><i class="icon icon-2x icon-rss-square"></i></a>
		</footer>
	</div>
</nav>
