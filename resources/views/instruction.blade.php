<!doctype html>
<html>
<head>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <title>SunTranslate API</title>
</head>
<body>
<div class="head-container">
    <div class="bg"></div>
    <h1> Translation API</h1>
</div>
<div class="text-container">
    <p>How to use SunTranslate APi? It's really simple, check out the endpoints below!  </br>
        <img src="{{ asset('images/arrow.PNG') }}" alt="tag">
    </p>
</div>
<section>
    <div class="left-line"></div>
    <div class="right-line"></div>
    <div class="blue-container">
        <h3><a href="https://countries-api.ddev.site/api/names">GET /api/names</a></h3>
    </div>
    <p class="instruction">Get all names <b>(or array of languages to translate)</b></p>
    <p class="text-gray"><i>Query parameters</i>
        <i class="bi bi-arrow-down-short"></i>
    </p>
    <div class="parameter-container">
        <table>
            <tr>
                <th colspan="2">Parameters</th>
            </tr>
            <tr>
                <td>lang</td>
                <td><em>(Optional)</em><p>Array of languages to translate, there is no limit of lang parameters</p></td>
            </tr>
        </table>
    </div>
    <div class="response-container">
        <p><em>Response body<br></em>If successful, the response body contains data with the following structure:</p>
        <img src="{{ asset('images/api.PNG') }}" alt="tag">
        <p><b>400</b></p>
        <p>Something went wrong </p>
        <p><b>404</b></p>
        <p>Nothing in database</p>
    </div>
</section>
<hr>
<footer>
    <p>© Author: Paweł Meszyński</p>
</footer>
</body>
</html>
