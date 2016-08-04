@extends('front.layout')
@section('content')
<ul class="post-list">
    <li class="post-list-item">
        <article id="post-vscode-extension-qiniu-upload" class="article article-type-post" itemprop="blogPost">

            <h3 class="post-title" itemprop="name">
                <a class="post-title-link" href="http://www.imys.net/20160726/vscode-extension-qiniu-upload.html">VsCode插件：七牛图床工具，写文章更快一步</a>
            </h3>

            <div class="post-meta">
              <time datetime="2016-07-26T01:53:52.000Z" itemprop="datePublished" class="post-time">Jul 26, 2016</time>
            </div>

            <div class="post-content" id="post-content" itemprop="postContent">
                <h2 id="前言"><a href="http://www.imys.net/#前言" class="headerlink" title="前言"></a>前言</h2><p>一直以来，我都很少在文章中加插图。因为每加一张插图，我都需要先把图片上传到七牛，然后才能获取外链插入文章。</p>
                <p>之前写 Markdown 一直是用的 Sublime，直到 Vscode 最近一次更新有了 Tabs 之后，便开始尝试在工作中使用。与最初的预览版相比进步蛮大的，能看到很多 VS 的影子。之前也用过一段时间 Atom，虽然界面挺喜欢，但始终没有原生客户端的流畅感。到底客户端还是微软的强项，Vscode 这方面舒服多了，启动与大文件编辑都不比 Sublime 差。</p>
                <p>Vscode 是基于浏览器内核的跨平台编辑器，底层代码大部分都是 TypeScript，当然最终还是会编译为 javascript。这样对于一个前端而言就倍感亲切了，可以轻易的使用自己吃饭的语言去扩展功能。</p>
                <p>所以这个<a href="https://github.com/yscoder/vscode-qiniu-upload-image">七牛图床工具</a>就诞生了。</p>
                <p><img src="/front/images/vscode-qiniu-pv.gif" alt="vscode-qiniu-pv"><br></p>
            </div>

            <ul class="article-tag-list">
                <li class="article-tag-list-item"><a class="article-tag-list-link waves-effect waves-button" href="http://www.imys.net/tags/VsCode/">#VsCode</a></li>
                <li class="article-tag-list-item"><a class="article-tag-list-link waves-effect waves-button" href="http://www.imys.net/tags/markdown/">#markdown</a></li>
                <li class="article-tag-list-item"><a class="article-tag-list-link waves-effect waves-button" href="http://www.imys.net/tags/qiniu/">#qiniu</a></li>
            </ul>
        </article>
    </li>
</ul>
<nav id="page-nav">
    <div class="inner">
        <span class="page-number current waves-effect waves-button">1</span><a class="page-number waves-effect waves-button" href="http://www.imys.net/page/2/">2</a><a class="page-number waves-effect waves-button" href="http://www.imys.net/page/3/">3</a><span class="space waves-effect waves-button">…</span><a class="page-number waves-effect waves-button" href="http://www.imys.net/page/6/">6</a><a class="extend next waves-effect waves-button" rel="next" href="http://www.imys.net/page/2/">下一页</a>
    </div>
</nav>
@endsection
