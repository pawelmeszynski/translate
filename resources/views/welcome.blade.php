<!doctype html>
<html>
<head>
    <title>SunTranslate API</title>
    <link rel="stylesheet" href="{{ asset('css/front.css') }}">
</head>
<body>
<h1>SunTranslate API</h1>
<div class="app-desc">How to use SunTranslate APi? It's really simple, check out the endpoints below👇</div>
<div class="app-desc">Contact Info: <a href="p.meszynski99@gmail.com">p.meszynski99@gmail.com</a></div>
<div class="app-desc">Version: 1.0.0</div>
<div class="app-desc">BasePath: countries-api.ddev.site/</div>
<div class="license-info">All rights reserved</div>
<h3>Table of Contents </h3>
<div class="method-summary"></div>
<ul>
    <li><a href="/api/names"><code><span class="http-method">get</span> /api/names</code></a></li>
</ul>
<h1><a name="Names">Names</a></h1>
<div class="method"><a name="getAllnames"/>
    <div class="method-path">
        <pre class="get"><code class="huge"><span class="http-method">get</span> /api/names</code></pre>
    </div>
    <div class="method-summary">Get all names (<span class="nickname">or array of translation languages</span>)</div>
    <div class="method-notes"></div>
    <h3 class="field-label">Query parameters</h3>
    <div class="field-items">
        <div class="param"><p>lang[]=pl&lang[]=de or langs:pl,de,fr (optional)</p></div>
        <div class="param-desc"><span class="param-type">Query Parameter</span> &mdash; Array of languages to get</div>
        <p><b>without parameter, all data will be returned</b></p>
    </div>  <!-- field-items -->
    <!--Todo: process Response Object and its headers, schema, examples -->
    <h3 class="field-label">Example data</h3>
    <div class="example-data-content-type">Content-Type: application/json</div>
    <pre class="example"><code>{"empty": false}</code></pre>
    <h3 class="field-label">Produces</h3>
    This API call produces the following media types according to the <span class="header">Accept</span> request header;
    the media type will be conveyed by the <span class="header">Content-Type</span> response header.
    <ul>
        <li><code>application/json</code></li>
    </ul>
    <h3 class="field-label">Responses</h3>
    <h4 class="field-label">200</h4>
    <img src="{{ asset('images/api.PNG') }}" alt="tag">
    <p>successful operation</p>
    <a href="#Names">Names</a>
    <h4 class="field-label">400</h4>
    Something went wrong
    <a href="#"></a>
    <h4 class="field-label">404</h4>
    Nothing in database
    <a href="#"></a>
</div> <!-- method -->
<hr/>
<hr/>
<footer>
    <p>© Author: Paweł Meszyński</p>
</footer>
</body>
</html>
