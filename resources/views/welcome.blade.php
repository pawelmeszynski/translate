<!doctype html>
<html>
<head>
    <title>SunTranslate API</title>
    <style type="text/css">
        body {
            font-family: Trebuchet MS, sans-serif;
            font-size: 15px;
            color: #444;
            margin-right: 24px;
        }

        h1 {
            font-size: 25px;
        }

        h2 {
            font-size: 20px;
        }

        h3 {
            font-size: 16px;
            font-weight: bold;
        }

        hr {
            height: 1px;
            border: 0;
            color: #ddd;
            background-color: #ddd;
        }

        .app-desc {
            clear: both;
            margin-left: 20px;
        }

        .param-name {
            width: 100%;
        }

        .license-info {
            margin-left: 20px;
        }

        .license-url {
            margin-left: 20px;
        }

        .model {
            margin: 0 0 0px 20px;
        }

        .method {
            margin-left: 20px;
        }

        .method-notes {
            margin: 10px 0 20px 0;
            font-size: 90%;
            color: #555;
        }

        pre {
            padding: 10px;
            margin-bottom: 2px;
        }

        .http-method {
            text-transform: uppercase;
        }

        pre.get {
            background-color: #0f6ab4;
        }

        pre.post {
            background-color: #10a54a;
        }

        pre.put {
            background-color: #c5862b;
        }

        pre.delete {
            background-color: #a41e22;
        }

        .huge {
            color: #fff;
        }

        pre.example {
            background-color: #f3f3f3;
            padding: 10px;
            border: 1px solid #ddd;
        }

        code {
            white-space: pre;
        }

        .nickname {
            font-weight: bold;
        }

        .method-path {
            font-size: 1.5em;
            background-color: #0f6ab4;
        }

        .up {
            float: right;
        }

        .parameter {
            width: 500px;
        }

        .param {
            width: 500px;
            padding: 10px 0 0 20px;
            font-weight: bold;
        }

        .param-desc {
            width: 700px;
            padding: 0 0 0 20px;
            color: #777;
        }

        .param-type {
            font-style: italic;
        }

        .param-enum-header {
            width: 700px;
            padding: 0 0 0 60px;
            color: #777;
            font-weight: bold;
        }

        .param-enum {
            width: 700px;
            padding: 0 0 0 80px;
            color: #777;
            font-style: italic;
        }

        .field-label {
            padding: 0;
            margin: 0;
            clear: both;
        }

        .field-items {
            padding: 0 0 15px 0;
            margin-bottom: 15px;
        }

        .return-type {
            clear: both;
            padding-bottom: 10px;
        }

        .param-header {
            font-weight: bold;
        }

        .method-tags {
            text-align: right;
        }

        .method-tag {
            background: none repeat scroll 0% 0% #24A600;
            border-radius: 3px;
            padding: 2px 10px;
            margin: 2px;
            color: #FFF;
            display: inline-block;
            text-decoration: none;
        }

    </style>
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
        <div class="param"><p>lang=[pl]&lang=[de] or langs:pl,de,fr (optional)</p></div>
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
    <img src="{{ asset('images/screen.PNG') }}" alt="tag">
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
