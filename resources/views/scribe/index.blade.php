<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Laravel API Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var tryItOutBaseUrl = "https://enjoyhub-back-production.up.railway.app";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-5.10.0.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-5.10.0.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image"/>
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                            </ul>
                    <ul id="tocify-header-endpoints" class="tocify-header">
                <li class="tocify-item level-1" data-unique="endpoints">
                    <a href="#endpoints">Endpoints</a>
                </li>
                                    <ul id="tocify-subheader-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-documentation">
                                <a href="#endpoints-GETapi-documentation">Handles the API request and renders the Swagger documentation view.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-oauth2-callback">
                                <a href="#endpoints-GETapi-oauth2-callback">Handles the OAuth2 callback and retrieves the required file for the redirect.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-register">
                                <a href="#endpoints-POSTapi-register">POST api/register</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-login">
                                <a href="#endpoints-POSTapi-login">POST api/login</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-books">
                                <a href="#endpoints-GETapi-books">GET api/books</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-books--id-">
                                <a href="#endpoints-GETapi-books--id-">GET api/books/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-books">
                                <a href="#endpoints-POSTapi-books">POST api/books</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-books-by-emotion--emotionId-">
                                <a href="#endpoints-GETapi-books-by-emotion--emotionId-">GET api/books/by-emotion/{emotionId}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-emotions">
                                <a href="#endpoints-GETapi-emotions">GET api/emotions</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-books-import-random-genre">
                                <a href="#endpoints-POSTapi-books-import-random-genre">POST api/books/import/random-genre</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-users">
                                <a href="#endpoints-GETapi-users">GET api/users</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-users--id--lists">
                                <a href="#endpoints-GETapi-users--id--lists">GET api/users/{id}/lists</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-users--userId--lists">
                                <a href="#endpoints-POSTapi-users--userId--lists">POST api/users/{userId}/lists</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-users--userId--discarded--contentId-">
                                <a href="#endpoints-POSTapi-users--userId--discarded--contentId-">POST api/users/{userId}/discarded/{contentId}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-users--userId--discarded">
                                <a href="#endpoints-GETapi-users--userId--discarded">GET api/users/{userId}/discarded</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-lists--listId--items">
                                <a href="#endpoints-GETapi-lists--listId--items">GET api/lists/{listId}/items</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-lists--listId--items">
                                <a href="#endpoints-POSTapi-lists--listId--items">POST api/lists/{listId}/items</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-lists--listId--items--contentId-">
                                <a href="#endpoints-DELETEapi-lists--listId--items--contentId-">DELETE api/lists/{listId}/items/{contentId}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-recommendations">
                                <a href="#endpoints-POSTapi-recommendations">POST api/recommendations</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: May 26, 2026</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<aside>
    <strong>Base URL</strong>: <code>https://enjoyhub-back-production.up.railway.app</code>
</aside>
<pre><code>This documentation aims to provide all the information you need to work with our API.

&lt;aside&gt;As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).&lt;/aside&gt;</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>This API is not authenticated.</p>

        <h1 id="endpoints">Endpoints</h1>

    

                                <h2 id="endpoints-GETapi-documentation">Handles the API request and renders the Swagger documentation view.</h2>

<p>
</p>



<span id="example-requests-GETapi-documentation">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://enjoyhub-back-production.up.railway.app/api/documentation" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://enjoyhub-back-production.up.railway.app/api/documentation"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-documentation">
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-documentation" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-documentation"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-documentation"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-documentation" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-documentation">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-documentation" data-method="GET"
      data-path="api/documentation"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-documentation', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-documentation"
                    onclick="tryItOut('GETapi-documentation');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-documentation"
                    onclick="cancelTryOut('GETapi-documentation');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-documentation"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/documentation</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-documentation"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-documentation"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-oauth2-callback">Handles the OAuth2 callback and retrieves the required file for the redirect.</h2>

<p>
</p>



<span id="example-requests-GETapi-oauth2-callback">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://enjoyhub-back-production.up.railway.app/api/oauth2-callback" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://enjoyhub-back-production.up.railway.app/api/oauth2-callback"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-oauth2-callback">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">content-type: text/html; charset=utf-8
cache-control: no-cache, private
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">&lt;!doctype html&gt;
&lt;html lang=&quot;en-US&quot;&gt;
&lt;body&gt;
&lt;script src=&quot;oauth2-redirect.js&quot;&gt;&lt;/script&gt;
&lt;/body&gt;
&lt;/html&gt;
</code>
 </pre>
    </span>
<span id="execution-results-GETapi-oauth2-callback" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-oauth2-callback"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-oauth2-callback"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-oauth2-callback" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-oauth2-callback">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-oauth2-callback" data-method="GET"
      data-path="api/oauth2-callback"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-oauth2-callback', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-oauth2-callback"
                    onclick="tryItOut('GETapi-oauth2-callback');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-oauth2-callback"
                    onclick="cancelTryOut('GETapi-oauth2-callback');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-oauth2-callback"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/oauth2-callback</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-oauth2-callback"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-oauth2-callback"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-register">POST api/register</h2>

<p>
</p>



<span id="example-requests-POSTapi-register">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://enjoyhub-back-production.up.railway.app/api/register" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"qkunze@example.com\",
    \"userName\": \"consequatur\",
    \"password\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://enjoyhub-back-production.up.railway.app/api/register"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "qkunze@example.com",
    "userName": "consequatur",
    "password": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-register">
</span>
<span id="execution-results-POSTapi-register" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-register"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-register"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-register" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-register">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-register" data-method="POST"
      data-path="api/register"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-register', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-register"
                    onclick="tryItOut('POSTapi-register');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-register"
                    onclick="cancelTryOut('POSTapi-register');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-register"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/register</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-register"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-register"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-register"
               value="qkunze@example.com"
               data-component="body">
    <br>
<p>Must be a valid email address. Example: <code>qkunze@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>userName</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="userName"                data-endpoint="POSTapi-register"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-register"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="endpoints-POSTapi-login">POST api/login</h2>

<p>
</p>



<span id="example-requests-POSTapi-login">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://enjoyhub-back-production.up.railway.app/api/login" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"consequatur\",
    \"password\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://enjoyhub-back-production.up.railway.app/api/login"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "consequatur",
    "password": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-login">
</span>
<span id="execution-results-POSTapi-login" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-login"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-login"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-login">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-login" data-method="POST"
      data-path="api/login"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-login', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-login"
                    onclick="tryItOut('POSTapi-login');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-login"
                    onclick="cancelTryOut('POSTapi-login');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-login"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/login</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-login"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-login"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-books">GET api/books</h2>

<p>
</p>



<span id="example-requests-GETapi-books">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://enjoyhub-back-production.up.railway.app/api/books" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://enjoyhub-back-production.up.railway.app/api/books"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-books">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">[
    {
        &quot;contentId&quot;: 1,
        &quot;title&quot;: &quot;Journey to the Center of the Earth&quot;,
        &quot;releaseYear&quot;: 2006,
        &quot;description&quot;: &quot;The intrepid Professor Lindenbrock embarks upon the strangest expedition of the nineteenth century: a journey down an extinct Icelandic volcano to the Earth&rsquo;s very core. In his quest to penetrate the planet&rsquo;s primordial secrets, the geologist&mdash;together with his quaking nephew Axel and their devoted guide, Hans&mdash;discovers an astonishing subterranean menagerie of prehistoric proportions. Verne&rsquo;s imaginative tale is at once the ultimate science fiction adventure and a reflection on the perfectibility of human understanding and the psychology of the questor. As David Brin notes in his Introduction, though Verne never knew the term &ldquo;science fiction,&rdquo; Journey to the Centre of the Earth is &ldquo;inarguably one of the wellsprings from which it all began.&rdquo;&quot;,
        &quot;image&quot;: &quot;http://books.google.com/books/content?id=icKmd-tlvPMC&amp;printsec=frontcover&amp;img=1&amp;zoom=1&amp;edge=curl&amp;source=gbs_api&quot;,
        &quot;type&quot;: &quot;book&quot;,
        &quot;emotionId&quot;: 9,
        &quot;created_at&quot;: &quot;2026-05-20T13:43:25.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-05-20T13:43:25.000000Z&quot;
    },
    {
        &quot;contentId&quot;: 2,
        &quot;title&quot;: &quot;Mysteries&quot;,
        &quot;releaseYear&quot;: 2001,
        &quot;description&quot;: &quot;The first complete English translation of the Nobel Prize-winner&rsquo;s literary masterpiece A Penguin Classic Mysteries is the story of Johan Nilsen Nagel, a mysterious stranger who suddenly turns up in a small Norwegian town one summer&mdash;and just as suddenly disappears. Nagel is a complete outsider, a sort of modern Christ treated in a spirit of near parody. He condemns the politics and thought of the age, brings comfort to the &ldquo;insulted and injured,&rdquo; and gains the love of two women suggestive of the biblical Mary and Martha. But there is a sinister side of him: in his vest he carries a vial of prussic acid... The novel creates a powerful sense of Nagel&#039;s stream of thought, as he increasingly withdraws into the torture chamber of his own subconscious psyche. For more than seventy years, Penguin has been the leading publisher of classic literature in the English-speaking world. With more than 1,800 titles, Penguin Classics represents a global bookshelf of the best works throughout history and across genres and disciplines. Readers trust the series to provide authoritative texts enhanced by introductions and notes by distinguished scholars and contemporary authors, as well as up-to-date translations by award-winning translators.&quot;,
        &quot;image&quot;: &quot;http://books.google.com/books/content?id=MRoMUV2kLZEC&amp;printsec=frontcover&amp;img=1&amp;zoom=1&amp;source=gbs_api&quot;,
        &quot;type&quot;: &quot;book&quot;,
        &quot;emotionId&quot;: 2,
        &quot;created_at&quot;: &quot;2026-05-20T13:43:25.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-05-20T13:43:25.000000Z&quot;
    },
    {
        &quot;contentId&quot;: 3,
        &quot;title&quot;: &quot;Frankenstein&quot;,
        &quot;releaseYear&quot;: 2025,
        &quot;description&quot;: &quot;Frankenstein; or, The Modern Prometheus is an 1818 Gothic novel written by English author Mary Shelley. Frankenstein tells the story of Victor Frankenstein, a young scientist who creates a sapient creature in an unorthodox scientific experiment that involved putting it together with different body parts. Shelley started writing the story when she was 18 and staying in Bath, and the first edition was published anonymously in London on 1 January 1818, when she was 20. Her name first appeared in the second edition, which was published in Paris in 1821. Shelley travelled through Europe in 1815, moving along the river Rhine in Germany, and stopping in Gernsheim, 17 kilometres (11 mi) away from Frankenstein Castle, where, about a century earlier, Johann Konrad Dippel, an alchemist, had engaged in experiments. She then journeyed to the region of Geneva, Switzerland, where much of the story takes place. Galvanism and occult ideas were topics of conversation for her companions, particularly for her lover and future husband Percy Bysshe Shelley. In 1816, Mary, Percy, John Polidori, and Lord Byron had a competition to see who would write the best horror story.&quot;,
        &quot;image&quot;: &quot;http://books.google.com/books/content?id=lyWOEQAAQBAJ&amp;printsec=frontcover&amp;img=1&amp;zoom=1&amp;edge=curl&amp;source=gbs_api&quot;,
        &quot;type&quot;: &quot;book&quot;,
        &quot;emotionId&quot;: 7,
        &quot;created_at&quot;: &quot;2026-05-20T13:43:26.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-05-20T13:43:26.000000Z&quot;
    },
    {
        &quot;contentId&quot;: 4,
        &quot;title&quot;: &quot;The Odyssey of Homer&quot;,
        &quot;releaseYear&quot;: 2005,
        &quot;description&quot;: &quot;A stunning verse translation of Homer&rsquo;s epic tale about one man&rsquo;s decade-long struggle to return home after years on the battlefields of Troy, from National Book Award&ndash;winning translator Allen Mandelbaum The inspiration for the upcoming film The Odyssey, directed by Christopher Nolan and starring Matt Damon, Anne Hathaway, Tom Holland, Elliot Page, Robert Pattinson, and Zendaya &ldquo;Muse, tell me of the man of many wiles, the man who wandered many paths of exile after he sacked Troy&rsquo;s sacred citadel.&rdquo; So begins one of the greatest adventures of world literature. Homer&rsquo;s epic chronicle of the Greek hero Odysseus&rsquo; decade-long journey home from the Trojan War has inspired writers from Virgil to James Joyce. Odysseus survives storm and shipwreck, the cave of the Cyclops and the isle of Circe, the lure of the Sirens&rsquo; song and a trip to the Underworld, only to find his most difficult challenge at home, where treacherous suitors seek to steal his kingdom and his loyal wife, Penelope. Meanwhile, his son Telemachus is on a journey of his own, tasked by the goddess Athena to fend off the suitors and liaise with warriors who fought alongside Odysseus during the Trojan War. But when the paths of father and son converge, they must use all their wits to reclaim Ithaca&mdash;or die trying. Allen Mandelbaum&rsquo;s brilliant verse translation realizes the power and the beauty of the original Greek and demonstrates why the Odyssey has captured the human imagination for nearly three thousand years.&quot;,
        &quot;image&quot;: &quot;http://books.google.com/books/content?id=ORyo8qAA-CQC&amp;printsec=frontcover&amp;img=1&amp;zoom=1&amp;edge=curl&amp;source=gbs_api&quot;,
        &quot;type&quot;: &quot;book&quot;,
        &quot;emotionId&quot;: 2,
        &quot;created_at&quot;: &quot;2026-05-20T13:43:27.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-05-20T13:43:27.000000Z&quot;
    },
    {
        &quot;contentId&quot;: 5,
        &quot;title&quot;: &quot;There There&quot;,
        &quot;releaseYear&quot;: 2018,
        &quot;description&quot;: &quot;PULITZER PRIZE FINALIST &bull; NATIONAL BESTSELLER &bull; A wondrous and shattering award-winning novel that follows twelve characters from Native communities: all traveling to the Big Oakland Powwow, all connected to one another in ways they may not yet realize. A contemporary classic, this &ldquo;astonishing literary debut&rdquo; (Margaret Atwood, bestselling author of The Handmaid&rsquo;s Tale) &ldquo;places Native American voices front and center&rdquo; (NPR/Fresh Air). One of The Atlantic&rsquo;s Great American Novels of the Past 100 Years Among them is Jacquie Red Feather, newly sober and trying to make it back to the family she left behind. Dene Oxendene, pulling his life together after his uncle&rsquo;s death and working at the powwow to honor his memory. Fourteen-year-old Orvil, coming to perform traditional dance for the very first time. They converge and collide on one fateful day at the Big Oakland Powwow and together this chorus of voices tells of the plight of the urban Native American&mdash;grappling with a complex and painful history, with an inheritance of beauty and spirituality, with communion and sacrifice and heroism A book with &ldquo;so much jangling energy and brings so much news from a distinct corner of American life that it&rsquo;s a revelation&rdquo; (The New York Times). It is fierce, funny, suspenseful, and impossible to put down--full of poetry and rage, exploding onto the page with urgency and force. There There is at once poignant and unflinching, utterly contemporary and truly unforgettable. Don&#039;t miss Tommy Orange&#039;s new book, Wandering Stars!&quot;,
        &quot;image&quot;: &quot;http://books.google.com/books/content?id=oNY0DwAAQBAJ&amp;printsec=frontcover&amp;img=1&amp;zoom=1&amp;edge=curl&amp;source=gbs_api&quot;,
        &quot;type&quot;: &quot;book&quot;,
        &quot;emotionId&quot;: 2,
        &quot;created_at&quot;: &quot;2026-05-20T13:43:28.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-05-20T13:43:28.000000Z&quot;
    },
    {
        &quot;contentId&quot;: 6,
        &quot;title&quot;: &quot;Fugitive Pieces&quot;,
        &quot;releaseYear&quot;: 1997,
        &quot;description&quot;: &quot;A stunning debut novel from an award-winning poet. Jakob Beer, traumatically orphaned as a young child during World War II, learns over his lifetime the power of language to destroy, omit, and obliterate, and also to restore, conjure and witness, as he comes to understand and experience the extent of what was lost to him and of what is possible to regain.&quot;,
        &quot;image&quot;: &quot;http://books.google.com/books/content?id=EIHmvTdDOVoC&amp;printsec=frontcover&amp;img=1&amp;zoom=1&amp;source=gbs_api&quot;,
        &quot;type&quot;: &quot;book&quot;,
        &quot;emotionId&quot;: 7,
        &quot;created_at&quot;: &quot;2026-05-20T13:43:29.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-05-20T13:43:29.000000Z&quot;
    },
    {
        &quot;contentId&quot;: 7,
        &quot;title&quot;: &quot;The Last Man&quot;,
        &quot;releaseYear&quot;: 2019,
        &quot;description&quot;: &quot;First published in 1826, The Last Man is an apocalyptic sci-ence fiction work by Mary Shelley. A courtly society at the crossroads between monarchy and republic is afflicted by a serious epidemic that threatens the survival of all mankind. Will Lionel be able to save the few who are faithful to him? In addition to an exciting novel, Shelley also succeeds in in-terweaving autobiographical, historical and scientific aspects into the story.&quot;,
        &quot;image&quot;: &quot;http://books.google.com/books/content?id=5nNpEAAAQBAJ&amp;printsec=frontcover&amp;img=1&amp;zoom=1&amp;edge=curl&amp;source=gbs_api&quot;,
        &quot;type&quot;: &quot;book&quot;,
        &quot;emotionId&quot;: 1,
        &quot;created_at&quot;: &quot;2026-05-20T13:43:30.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-05-20T13:43:30.000000Z&quot;
    },
    {
        &quot;contentId&quot;: 8,
        &quot;title&quot;: &quot;The Street of Crocodiles&quot;,
        &quot;releaseYear&quot;: 2025,
        &quot;description&quot;: &quot;&#039;&#039;The Street of Crocodiles&#039;&#039; by Bruno Schulz (1892-1942) was first published in Polish in 1934; this English translation was first published in the US by Walker and Company in 1963, public domain. A novel that blends the real and the fantastic, from \&quot;one of the most original imaginations in modern Europe\&quot; (Cynthia Ozick). The Street of Crocodiles in the Polish city of Drogobych is a street of memories and dreams where recollections of Bruno Schulz&#039;s uncommon boyhood and of the eerie side of his merchant family&#039;s life are evoked in a startling blend of the real and the fantastic. Most memorable - and most chilling - is the portrait of the author&#039;s father, a maddened shopkeeper who imports rare birds&#039; eggs to hatch in his attic, who believes tailors&#039; dummies should be treated like people, and whose obsessive fear of cockroaches causes him to resemble one. Bruno Schulz, a Polish Jew killed by the Nazis in 1942, is considered by many to have been the leading Polish writer between the two world wars.&quot;,
        &quot;image&quot;: &quot;http://books.google.com/books/content?id=v7VPEQAAQBAJ&amp;printsec=frontcover&amp;img=1&amp;zoom=1&amp;edge=curl&amp;source=gbs_api&quot;,
        &quot;type&quot;: &quot;book&quot;,
        &quot;emotionId&quot;: 10,
        &quot;created_at&quot;: &quot;2026-05-20T13:43:31.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-05-20T13:43:31.000000Z&quot;
    },
    {
        &quot;contentId&quot;: 9,
        &quot;title&quot;: &quot;Oliver Twist&quot;,
        &quot;releaseYear&quot;: 2019,
        &quot;description&quot;: &quot;JAICO ILLUSTARTED CLASSICS SERIES is a collection of beloved children&rsquo;s classics read by generations all over the world. Rich with adventures and thrills, these immortal stories with vivid illustrations are designed to delight young readers. IN A RAMSHACKLE workhouse of a parish in England, a baby boy was born to a woman who died in childbirth. The boy was named OLIVER TWIST. He spent a sad childhood in abject misery in various workhouses. At the age of twelve, he runs away to London where he is picked up by a notorious criminal, Fagin, a mastermind at house breaking, pickpocketing and petty thievery. He teaches Oliver all these evil deeds. But a kind-hearted gentleman robbed by Fagin sympathizes with the plight of Oliver and helps him to find a family, his inheritance and above all Oliver&rsquo;s true identity. CHARLES DICKENS was born in a little house in Landport, Portsea, England. The second of eight children, he grew up in a family frequently beset by financial insecurity. When the family fortunes improved, Dickens went back to school, after which he became an office boy, a freelance reporter, and finally an author.&quot;,
        &quot;image&quot;: &quot;http://books.google.com/books/content?id=3oSqDwAAQBAJ&amp;printsec=frontcover&amp;img=1&amp;zoom=1&amp;edge=curl&amp;source=gbs_api&quot;,
        &quot;type&quot;: &quot;book&quot;,
        &quot;emotionId&quot;: 9,
        &quot;created_at&quot;: &quot;2026-05-20T13:43:32.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-05-20T13:43:32.000000Z&quot;
    },
    {
        &quot;contentId&quot;: 10,
        &quot;title&quot;: &quot;The Picture of Dorian Gray&quot;,
        &quot;releaseYear&quot;: 2019,
        &quot;description&quot;: &quot;The Picture of Dorian Gray is the only published novel by Oscar Wilde, appearing as the lead story in Lippincott&#039;s Monthly Magazine on 20 June 1890, printed as the July 1890 issue. The magazine&#039;s editors feared the story was indecent as submitted, so they censored roughly 500 words, without Wilde&#039;s knowledge, before publication. But even with that, the story was still greeted with outrage by British reviewers, some of whom suggested that Wilde should be prosecuted on moral grounds, leading Wilde to defend the novel aggressively in letters to the British press. Today, Wilde&#039;s fin de si&egrave;cle novella is considered a classic. This new edition from Immortal Books includes footnotes and images.&quot;,
        &quot;image&quot;: &quot;http://books.google.com/books/content?id=6vGiDwAAQBAJ&amp;printsec=frontcover&amp;img=1&amp;zoom=1&amp;edge=curl&amp;source=gbs_api&quot;,
        &quot;type&quot;: &quot;book&quot;,
        &quot;emotionId&quot;: 5,
        &quot;created_at&quot;: &quot;2026-05-20T13:43:33.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-05-20T13:43:33.000000Z&quot;
    },
    {
        &quot;contentId&quot;: 11,
        &quot;title&quot;: &quot;Japanese Garden Design&quot;,
        &quot;releaseYear&quot;: 2026,
        &quot;description&quot;: &quot;\&quot;Marc Peter Keane is the undisputed American master of Japanese garden scholars; he is also an educator and garden designer in his own right. Two of his previous books Japanese Garden Design and The Art of Setting Stones are indispensable.\&quot; &mdash;The New York Times In Japanese Garden Design landscape architect Marc Peter Keane presents a complete overview of the history and development of the principles that underlie all Japanese gardens&mdash;a respect for nature combined with profound concepts of aesthetics and structure. Keane is one of the world&#039;s leading designers of Japanese-style gardens and he describes in detail the historical influences of Confucian, Shinto and Buddhist ideas that have linked poetry and philosophy to the tangible forms of gardens in Japan. Creative inspiration is found in prehistoric Japanese conceptions of nature, gardens of the Heian-era aristocrats, world-renowned Zen Buddhist temple rock gardens and tea gardens; compact courtyard gardens and large-scale Edo-era stroll gardens. Detailed explanations of these basic forms identify and interpret the symbolism and principles behind them and explain how they are still in active use today. Topics covered include: Early Gardens: Poetry in Paradise Gardens of the Heian Aristocrats Zen Gardens: The Art of Emptiness The Tea Garden: A Spiritual Passage Tsubo Gardens: Private Niches Edo Stroll Gardens: A Collector&#039;s Park Filled with gorgeous photographs and expert text by a leading garden designer, this book explains the theory and practice of Japanese gardening from an insider&#039;s point of view. It will be treasured by all Japanese garden lovers and visitors to Japan.&quot;,
        &quot;image&quot;: &quot;http://books.google.com/books/content?id=iffFEQAAQBAJ&amp;printsec=frontcover&amp;img=1&amp;zoom=1&amp;edge=curl&amp;source=gbs_api&quot;,
        &quot;type&quot;: &quot;book&quot;,
        &quot;emotionId&quot;: 10,
        &quot;created_at&quot;: &quot;2026-05-20T14:26:59.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-05-20T14:26:59.000000Z&quot;
    },
    {
        &quot;contentId&quot;: 12,
        &quot;title&quot;: &quot;Photographic Guide to the Birds of Indonesia&quot;,
        &quot;releaseYear&quot;: 2013,
        &quot;description&quot;: &quot;A Photographic Guide to the Birds of Indonesia is the best, most comprehensive photographic guide to the birds of Indonesia. Because of its vast size and geographical location, Indonesia has the world&#039;s most diverse avifauna. It boasts of more than 1,600 species--of which 235 rare birds are only found in Indonesia--making it the world&#039;s number one travel destination for bird-watching. This bird field guide covers a total of 912 species, including most of the non-migratory and endemic species that are seen only in Indonesia and a number of threatened and endangered species. A photograph and distribution map is given for each bird. Many new photographs of Indonesian birds appear in this volume for the first time and have been carefully selected to show the important characteristics of each bird. The concise text provides vital information, and an index of common names is provided at the back of the book.&quot;,
        &quot;image&quot;: &quot;http://books.google.com/books/content?id=0hnRAgAAQBAJ&amp;printsec=frontcover&amp;img=1&amp;zoom=1&amp;edge=curl&amp;source=gbs_api&quot;,
        &quot;type&quot;: &quot;book&quot;,
        &quot;emotionId&quot;: 3,
        &quot;created_at&quot;: &quot;2026-05-20T14:27:00.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-05-20T14:27:00.000000Z&quot;
    },
    {
        &quot;contentId&quot;: 13,
        &quot;title&quot;: &quot;Pinocchio&quot;,
        &quot;releaseYear&quot;: 2006,
        &quot;description&quot;: &quot;Includes 39 lithograps. Words and phrases, objects in themselves, have been an ongoing subject in Dine&#039;s art; here those words and phrases are Collodi&#039;s.&quot;,
        &quot;image&quot;: &quot;http://books.google.com/books/content?id=-p-fPwAACAAJ&amp;printsec=frontcover&amp;img=1&amp;zoom=1&amp;source=gbs_api&quot;,
        &quot;type&quot;: &quot;book&quot;,
        &quot;emotionId&quot;: 10,
        &quot;created_at&quot;: &quot;2026-05-20T14:27:01.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-05-20T14:27:01.000000Z&quot;
    },
    {
        &quot;contentId&quot;: 14,
        &quot;title&quot;: &quot;Italian Science Fiction&quot;,
        &quot;releaseYear&quot;: 2019,
        &quot;description&quot;: &quot;This book explores Italian science fiction from 1861, the year of Italy&rsquo;s unification, to the present day, focusing on how this genre helped shape notions of Otherness and Normalness. In particular, Italian Science Fiction draws upon critical race studies, postcolonial theory, and feminist studies to explore how migration, colonialism, multiculturalism, and racism have been represented in genre film and literature. Topics include the role of science fiction in constructing a national identity; the representation and self-representation of &ldquo;alien&rdquo; immigrants in Italy; the creation of internal &ldquo;Others,&rdquo; such as southerners and Roma; the intersections of gender and race discrimination; and Italian science fiction&rsquo;s transnational dialogue with foreign science fiction. This book reveals that though it is arguably a minor genre in Italy, science fiction offers an innovative interpretive angle for rethinking Italian history and imagining future change in Italian society.&quot;,
        &quot;image&quot;: &quot;http://books.google.com/books/content?id=lOijDwAAQBAJ&amp;printsec=frontcover&amp;img=1&amp;zoom=1&amp;edge=curl&amp;source=gbs_api&quot;,
        &quot;type&quot;: &quot;book&quot;,
        &quot;emotionId&quot;: 1,
        &quot;created_at&quot;: &quot;2026-05-20T14:27:02.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-05-20T14:27:02.000000Z&quot;
    },
    {
        &quot;contentId&quot;: 15,
        &quot;title&quot;: &quot;Reporting the Siege of Sarajevo&quot;,
        &quot;releaseYear&quot;: 2021,
        &quot;description&quot;: &quot;The first comprehensive study of the reporting of the Siege of Sarajevo (1992-96), the longest siege in modern European history.&quot;,
        &quot;image&quot;: &quot;http://books.google.com/books/content?id=8x0LEAAAQBAJ&amp;printsec=frontcover&amp;img=1&amp;zoom=1&amp;edge=curl&amp;source=gbs_api&quot;,
        &quot;type&quot;: &quot;book&quot;,
        &quot;emotionId&quot;: 10,
        &quot;created_at&quot;: &quot;2026-05-20T14:27:03.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-05-20T14:27:03.000000Z&quot;
    },
    {
        &quot;contentId&quot;: 16,
        &quot;title&quot;: &quot;The Films of Ingmar Bergman&quot;,
        &quot;releaseYear&quot;: 2007,
        &quot;description&quot;: &quot;Laura Hubner is one of the first critics to analyse the elements of &#039;illusion&#039; in key films by Bergman and relate these to cultural and artistic influences on his creative output, the phenomenon of Bergman as &#039;art film&#039; director, and debates about modernism, postmodernism and emerging feminist discourses on gender and multiplicity.&quot;,
        &quot;image&quot;: &quot;http://books.google.com/books/content?id=FBqFDAAAQBAJ&amp;printsec=frontcover&amp;img=1&amp;zoom=1&amp;edge=curl&amp;source=gbs_api&quot;,
        &quot;type&quot;: &quot;book&quot;,
        &quot;emotionId&quot;: 7,
        &quot;created_at&quot;: &quot;2026-05-20T14:27:03.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-05-20T14:27:03.000000Z&quot;
    },
    {
        &quot;contentId&quot;: 17,
        &quot;title&quot;: &quot;Steadicam&quot;,
        &quot;releaseYear&quot;: 2001,
        &quot;description&quot;: &quot;In this unique study, Serena Ferrara examines the revolutionary impact of the Steadicam on filmmaking. The Steadicam has freed-up the camera operator to follow a film&#039;s movement, wherever it is happening. Serena Ferrara explains the principles by which the Steadicam is operated and the impact it has on filmmaking, including the effects it can produce on screen, on a film&#039;s narrative, on its audience, and on the director&#039;s creativity. Also featured are interviews with movie industry professionals, in which a variety of views of the Steadicam are presented in an open discussion. Interviewees include: Garrett Brown Giuseppe Rotunno John Carpenter Mario Orfini Larry McConkey Nicola Pecorini Haskell Wexler Ed DiGiulio Vittorio Storaro Caroline Goodall Anyone involved in, or fascinated by, the process of filmmaking with find this an enlightening and inspirational study.&quot;,
        &quot;image&quot;: &quot;http://books.google.com/books/content?id=9CNuOldC1t0C&amp;printsec=frontcover&amp;img=1&amp;zoom=1&amp;edge=curl&amp;source=gbs_api&quot;,
        &quot;type&quot;: &quot;book&quot;,
        &quot;emotionId&quot;: 5,
        &quot;created_at&quot;: &quot;2026-05-20T14:27:04.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-05-20T14:27:04.000000Z&quot;
    },
    {
        &quot;contentId&quot;: 18,
        &quot;title&quot;: &quot;Rain of Ruin&quot;,
        &quot;releaseYear&quot;: 1995,
        &quot;description&quot;: &quot;Contains more than 400 photographs of Hiroshima and Nagasaki before, during, and after those fateful days&quot;,
        &quot;image&quot;: &quot;http://books.google.com/books/content?id=Y92QJDY7PLUC&amp;printsec=frontcover&amp;img=1&amp;zoom=1&amp;source=gbs_api&quot;,
        &quot;type&quot;: &quot;book&quot;,
        &quot;emotionId&quot;: 8,
        &quot;created_at&quot;: &quot;2026-05-20T14:27:05.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-05-20T14:27:05.000000Z&quot;
    },
    {
        &quot;contentId&quot;: 19,
        &quot;title&quot;: &quot;Sony a7 Series&quot;,
        &quot;releaseYear&quot;: 2015,
        &quot;description&quot;: &quot;Now that you&rsquo;ve bought the amazing Sony a7 series camera, you need a book that goes beyond a tour of the camera&rsquo;s features to show you exactly how to use the camera to take great pictures. With Sony a7 Series: From Snapshots to Great Shots, you get the perfect blend of photography instruction and camera reference that will take your images to the next level! Beautifully illustrated with large, vibrant photos, this book teaches you how to take control of your photography to get the image you want every time you pick up the camera. Follow along with your friendly and knowledgeable guide, Pulitzer Prize&mdash;winning photographer and author Brian Smith, and you will: Learn the top ten things you need to know about shooting with the Sony a7 series cameras Learn to use the camera&rsquo;s advanced camera settings to gain full control over the look and feel of your images Master the photographic basics of composition, focus, depth of field, and much more Learn all the best tricks and techniques for getting great action shots, landscapes, and portraits Find out how to get great photos in low light Learn the basics behind shooting video with your a7 series camera and start making movies of your own Understand the nuances of your menu settings and how to customize your camera Learn more about lens mount adopters, creative compositions, and accessories through three downloadable bonus chapters Grasp all the concepts and techniques as you go, with assignments at the end of every chapter And once you&rsquo;ve got the shot, show it off! Join the book&rsquo;s Flickr group, share your photos, and discuss how you use your camera to get great shots at flickr.com/groups/sonya7-a7rfromsnapshotstogreatshots.&quot;,
        &quot;image&quot;: &quot;http://books.google.com/books/content?id=pCFlCgAAQBAJ&amp;printsec=frontcover&amp;img=1&amp;zoom=1&amp;edge=curl&amp;source=gbs_api&quot;,
        &quot;type&quot;: &quot;book&quot;,
        &quot;emotionId&quot;: 6,
        &quot;created_at&quot;: &quot;2026-05-20T14:27:06.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-05-20T14:27:06.000000Z&quot;
    },
    {
        &quot;contentId&quot;: 20,
        &quot;title&quot;: &quot;Photographic Guide to the Birds of Southeast Asia&quot;,
        &quot;releaseYear&quot;: 2009,
        &quot;description&quot;: &quot;Whether traveling through Southeast Asia or relaxing at home, bird lovers will enjoy this thorough and colorful bird watching guide. A Photographic Guide to the Birds of Southeast Asia is the first comprehensive photographic guide to the birds of mainland Southeast Asia, the Philippines and Borneo. It covers important bird species found in Malaysia, Singapore, Thailand, Cambodia and Vietnam, as well as southern China, Hong Kong, Taiwan and the Philippines. Of an estimated 10,000 living bird species in the world, Southeast Asia is home to over 3,000 of them--making this one of the most diverse avifaunal regions on the planet and a birdwatcher&#039;s paradise. This comprehensive guide covers over 660 species and has more than 700 color photographs. It is an invaluable guide to anyone planning a visit to Asia who is interested in birds. It gives a distribution map for each species and a checklist at the back. Many of the photographs in this book appear for the first time and have been carefully selected to illustrate the most important species and their key features. The text provides vital information to ensure accurate identifications. A Photographic Guide to the Birds of Southeast Asia is indispensable reading for bird lovers everywhere.&quot;,
        &quot;image&quot;: &quot;http://books.google.com/books/content?id=EdLZAwAAQBAJ&amp;printsec=frontcover&amp;img=1&amp;zoom=1&amp;edge=curl&amp;source=gbs_api&quot;,
        &quot;type&quot;: &quot;book&quot;,
        &quot;emotionId&quot;: 6,
        &quot;created_at&quot;: &quot;2026-05-20T14:27:07.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-05-20T14:27:07.000000Z&quot;
    },
    {
        &quot;contentId&quot;: 21,
        &quot;title&quot;: &quot;The Plague of Fantasies&quot;,
        &quot;releaseYear&quot;: 1997,
        &quot;description&quot;: &quot;Slavoj Zizek is, without doubt, one of the most stimulating and vibrant thinkers of our time, and his idiosyncratic blend of Lacan and Hegel is always sparkling with insight and studded with amusing stories, anecdotes and jokes. In The Plague of Fantasies Zizek approaches another enormous subject with characteristic brio and provocativeness. The current epoch is plagued by fantasms: there is an ever intensifying antagonism between the process of ever greater abstraction of our lives&mdash;whether in the form of digitalization or market relations&mdash;and the deluge of pseudo-concrete images which surround us. Traditional critical thought would have sought to trace the roots of abstract notions in concrete social reality; but today, the correct procedure is the inverse&mdash;from pseudo-concrete imagery to the abstract process which structures our lives. Ranging in his examples from national differences in toilet design to cybersex, and from intellectuals&#039; responses to the Bosnian war to Robert Schumann&#039;s music, Zizek explores the relations between fantasy and ideology, the way in which fantasy animates enjoy-ment while protecting against its excesses, the associations of the notion of fetishism with fantasized seduction, and the ways in which digitalization and cyberspace affect the status of subjectivity. To the already initiated, The Plague of Fantasies will be a welcome reminder of why they enjoy Zizek&#039;s writing so much. For new readers, it will be the beginning of a long and meaningful relationship.&quot;,
        &quot;image&quot;: &quot;http://books.google.com/books/content?id=NM5PqgKd2dsC&amp;printsec=frontcover&amp;img=1&amp;zoom=1&amp;edge=curl&amp;source=gbs_api&quot;,
        &quot;type&quot;: &quot;book&quot;,
        &quot;emotionId&quot;: 10,
        &quot;created_at&quot;: &quot;2026-05-20T14:27:44.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-05-20T14:27:44.000000Z&quot;
    },
    {
        &quot;contentId&quot;: 22,
        &quot;title&quot;: &quot;A Wizard of Earthsea&quot;,
        &quot;releaseYear&quot;: 2012,
        &quot;description&quot;: &quot;A boy grows to manhood while attempting to subdue the evil he unleashed on the world as an apprentice to the Master Wizard.&quot;,
        &quot;image&quot;: &quot;http://books.google.com/books/content?id=FD72ekYZqIkC&amp;printsec=frontcover&amp;img=1&amp;zoom=1&amp;edge=curl&amp;source=gbs_api&quot;,
        &quot;type&quot;: &quot;book&quot;,
        &quot;emotionId&quot;: 7,
        &quot;created_at&quot;: &quot;2026-05-20T14:27:45.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-05-20T14:27:45.000000Z&quot;
    },
    {
        &quot;contentId&quot;: 23,
        &quot;title&quot;: &quot;Gifts&quot;,
        &quot;releaseYear&quot;: 2004,
        &quot;description&quot;: &quot;A darkly compelling fantasy about a world in which each person has a magical, dangerous gift.&quot;,
        &quot;image&quot;: &quot;http://books.google.com/books/content?id=UY7bjfq3mYkC&amp;printsec=frontcover&amp;img=1&amp;zoom=1&amp;edge=curl&amp;source=gbs_api&quot;,
        &quot;type&quot;: &quot;book&quot;,
        &quot;emotionId&quot;: 9,
        &quot;created_at&quot;: &quot;2026-05-20T14:27:45.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-05-20T14:27:45.000000Z&quot;
    },
    {
        &quot;contentId&quot;: 24,
        &quot;title&quot;: &quot;The Wind in the Willows&quot;,
        &quot;releaseYear&quot;: 1993,
        &quot;description&quot;: &quot;The escapades of four animal friends who live along a river in the English countryside--Toad, Mole, Rat, and Badger.&quot;,
        &quot;image&quot;: &quot;http://books.google.com/books/content?id=Mo7D3Je7_DMC&amp;printsec=frontcover&amp;img=1&amp;zoom=1&amp;edge=curl&amp;source=gbs_api&quot;,
        &quot;type&quot;: &quot;book&quot;,
        &quot;emotionId&quot;: 8,
        &quot;created_at&quot;: &quot;2026-05-20T14:27:46.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-05-20T14:27:46.000000Z&quot;
    },
    {
        &quot;contentId&quot;: 25,
        &quot;title&quot;: &quot;The Dark Tower VII&quot;,
        &quot;releaseYear&quot;: 2004,
        &quot;description&quot;: &quot;Sams Local 11-7-2004 $35.00.&quot;,
        &quot;image&quot;: &quot;http://books.google.com/books/content?id=Geq0uKAxZPEC&amp;printsec=frontcover&amp;img=1&amp;zoom=1&amp;edge=curl&amp;source=gbs_api&quot;,
        &quot;type&quot;: &quot;book&quot;,
        &quot;emotionId&quot;: 9,
        &quot;created_at&quot;: &quot;2026-05-20T14:27:47.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-05-20T14:27:47.000000Z&quot;
    },
    {
        &quot;contentId&quot;: 26,
        &quot;title&quot;: &quot;Crown of Midnight&quot;,
        &quot;releaseYear&quot;: 2013,
        &quot;description&quot;: &quot;Eighteen-year-old Celaena Sardothien is bold, daring and beautiful - the perfect seductress and the greatest assassin her world has ever known. But though she won the King&#039;s contest and became his champion, Celaena has been granted neither her liberty nor the freedom to follow her heart. The slavery of the suffocating salt mines of Endovier that scarred her past is nothing compared to a life bound to her darkest enemy, a king whose rule is so dark and evil it is near impossible to defy. Celaena faces a choice that is tearing her heart to pieces: kill in cold blood for a man she hates, or risk sentencing those she loves to death. Celaena must decide what she will fight for: survival, love or the future of a kingdom. Because an assassin cannot have it all ...And trying to may just destroy her. Love or loathe Celaena, she will slice open your heart with her dagger and leave you bleeding long after the last page of this New York Times bestselling sequel, in what is undeniably THE hottest new fantasy series.&quot;,
        &quot;image&quot;: &quot;http://books.google.com/books/content?id=7bTeIug-jFEC&amp;printsec=frontcover&amp;img=1&amp;zoom=1&amp;edge=curl&amp;source=gbs_api&quot;,
        &quot;type&quot;: &quot;book&quot;,
        &quot;emotionId&quot;: 8,
        &quot;created_at&quot;: &quot;2026-05-20T14:27:48.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-05-20T14:27:48.000000Z&quot;
    },
    {
        &quot;contentId&quot;: 27,
        &quot;title&quot;: &quot;Tales from Earthsea&quot;,
        &quot;releaseYear&quot;: 2002,
        &quot;description&quot;: &quot;Exploring the legend of Earthsea&#039;s history, people, languages, literature, and magic, this collection of four magical stories is now available in a paperback edition.&quot;,
        &quot;image&quot;: &quot;http://books.google.com/books/content?id=Fc4vX8-vQPgC&amp;printsec=frontcover&amp;img=1&amp;zoom=1&amp;source=gbs_api&quot;,
        &quot;type&quot;: &quot;book&quot;,
        &quot;emotionId&quot;: 3,
        &quot;created_at&quot;: &quot;2026-05-20T14:27:49.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-05-20T14:27:49.000000Z&quot;
    },
    {
        &quot;contentId&quot;: 28,
        &quot;title&quot;: &quot;Prince Caspian Movie Tie-in Edition (rack)&quot;,
        &quot;releaseYear&quot;: 2008,
        &quot;description&quot;: &quot;This movie tie-in edition of the full original PRINCE CASPIAN novel will be rack size, and feature a movie cover and an 8-page movie still insert.&quot;,
        &quot;image&quot;: &quot;http://books.google.com/books/content?id=4bn7XhMeBH8C&amp;printsec=frontcover&amp;img=1&amp;zoom=1&amp;source=gbs_api&quot;,
        &quot;type&quot;: &quot;book&quot;,
        &quot;emotionId&quot;: 9,
        &quot;created_at&quot;: &quot;2026-05-20T14:27:50.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-05-20T14:27:50.000000Z&quot;
    },
    {
        &quot;contentId&quot;: 29,
        &quot;title&quot;: &quot;The Happy Prince and Other Tales&quot;,
        &quot;releaseYear&quot;: 1888,
        &quot;description&quot;: null,
        &quot;image&quot;: &quot;http://books.google.com/books/content?id=vVKeG7xD_WkC&amp;printsec=frontcover&amp;img=1&amp;zoom=1&amp;edge=curl&amp;source=gbs_api&quot;,
        &quot;type&quot;: &quot;book&quot;,
        &quot;emotionId&quot;: 7,
        &quot;created_at&quot;: &quot;2026-05-20T14:27:50.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-05-20T14:27:50.000000Z&quot;
    },
    {
        &quot;contentId&quot;: 30,
        &quot;title&quot;: &quot;Friends Learn Ballet&quot;,
        &quot;releaseYear&quot;: 1985,
        &quot;description&quot;: &quot;Ellie practices ballet steps with her friend Natalie and both dream of becoming ballet dancers. Includes a vocabulary list, discussion questions, and a note for grownups.&quot;,
        &quot;image&quot;: &quot;http://books.google.com/books/content?id=sEAZiIiZEJYC&amp;printsec=frontcover&amp;img=1&amp;zoom=1&amp;source=gbs_api&quot;,
        &quot;type&quot;: &quot;book&quot;,
        &quot;emotionId&quot;: 8,
        &quot;created_at&quot;: &quot;2026-05-20T14:28:42.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-05-20T14:28:42.000000Z&quot;
    },
    {
        &quot;contentId&quot;: 31,
        &quot;title&quot;: &quot;Henry&#039;s Leg&quot;,
        &quot;releaseYear&quot;: 1986,
        &quot;description&quot;: null,
        &quot;image&quot;: &quot;http://books.google.com/books/content?id=DYWzQAAACAAJ&amp;printsec=frontcover&amp;img=1&amp;zoom=1&amp;source=gbs_api&quot;,
        &quot;type&quot;: &quot;book&quot;,
        &quot;emotionId&quot;: 10,
        &quot;created_at&quot;: &quot;2026-05-20T14:28:43.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-05-20T14:28:43.000000Z&quot;
    },
    {
        &quot;contentId&quot;: 32,
        &quot;title&quot;: &quot;School Days&quot;,
        &quot;releaseYear&quot;: 1997,
        &quot;description&quot;: &quot;Laura and her sisters share some good and bad times when they attend different schools near their various prairie homes.&quot;,
        &quot;image&quot;: &quot;http://books.google.com/books/content?id=qGsZxfIV49wC&amp;printsec=frontcover&amp;img=1&amp;zoom=1&amp;source=gbs_api&quot;,
        &quot;type&quot;: &quot;book&quot;,
        &quot;emotionId&quot;: 5,
        &quot;created_at&quot;: &quot;2026-05-20T14:28:43.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-05-20T14:28:43.000000Z&quot;
    },
    {
        &quot;contentId&quot;: 33,
        &quot;title&quot;: &quot;Bad Magic&quot;,
        &quot;releaseYear&quot;: 2014,
        &quot;description&quot;: &quot;Thirteen-year-old Clay, a boy who no longer believes in magic, tags graffiti on his classroom wall and, as punishment, is sent to a camp for wayward kids located on a volcanic island, where eccentric campmates abound, a ghost walks among the abandoned ruins of a mansion, and a dangerous force threatens to erupt with bad magic.&quot;,
        &quot;image&quot;: &quot;http://books.google.com/books/content?id=leRlrgEACAAJ&amp;printsec=frontcover&amp;img=1&amp;zoom=1&amp;source=gbs_api&quot;,
        &quot;type&quot;: &quot;book&quot;,
        &quot;emotionId&quot;: 2,
        &quot;created_at&quot;: &quot;2026-05-20T14:28:44.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-05-20T14:28:44.000000Z&quot;
    },
    {
        &quot;contentId&quot;: 34,
        &quot;title&quot;: &quot;Keep of the Ancient King; Illus by Michael Fishel; Cover Art by Keith Parkinson&quot;,
        &quot;releaseYear&quot;: 1983,
        &quot;description&quot;: null,
        &quot;image&quot;: null,
        &quot;type&quot;: &quot;book&quot;,
        &quot;emotionId&quot;: 6,
        &quot;created_at&quot;: &quot;2026-05-20T14:28:45.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-05-20T14:28:45.000000Z&quot;
    },
    {
        &quot;contentId&quot;: 35,
        &quot;title&quot;: &quot;Spring Is Here&quot;,
        &quot;releaseYear&quot;: 2000,
        &quot;description&quot;: &quot;Follows the four seasons around the year, from snow melting into spring, through the quiet harvest and the fall of snow, and then to spring again.&quot;,
        &quot;image&quot;: &quot;http://books.google.com/books/content?id=zlkJYAAACAAJ&amp;printsec=frontcover&amp;img=1&amp;zoom=1&amp;source=gbs_api&quot;,
        &quot;type&quot;: &quot;book&quot;,
        &quot;emotionId&quot;: 7,
        &quot;created_at&quot;: &quot;2026-05-20T14:28:46.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-05-20T14:28:46.000000Z&quot;
    },
    {
        &quot;contentId&quot;: 36,
        &quot;title&quot;: &quot;Cleopatra VII&quot;,
        &quot;releaseYear&quot;: 1999,
        &quot;description&quot;: &quot;While her father is in hiding after attempts on his life, twelve-year-old Cleopatra records in her diary how she fears for her own safety and hopes to survive to become Queen of Egypt some day.&quot;,
        &quot;image&quot;: null,
        &quot;type&quot;: &quot;book&quot;,
        &quot;emotionId&quot;: 5,
        &quot;created_at&quot;: &quot;2026-05-20T14:28:47.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-05-20T14:28:47.000000Z&quot;
    },
    {
        &quot;contentId&quot;: 37,
        &quot;title&quot;: &quot;The Silver Door&quot;,
        &quot;releaseYear&quot;: 2010,
        &quot;description&quot;: &quot;When Genna is chosen as the Sunrider of prophecy, her destiny is to unite the magic of the sun and the moon for the good of both Nightlings and humans.&quot;,
        &quot;image&quot;: &quot;http://books.google.com/books/content?id=Sj5MWqEPsDkC&amp;printsec=frontcover&amp;img=1&amp;zoom=1&amp;edge=curl&amp;source=gbs_api&quot;,
        &quot;type&quot;: &quot;book&quot;,
        &quot;emotionId&quot;: 1,
        &quot;created_at&quot;: &quot;2026-05-20T14:28:47.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-05-20T14:28:47.000000Z&quot;
    },
    {
        &quot;contentId&quot;: 38,
        &quot;title&quot;: &quot;The Grizzly&quot;,
        &quot;releaseYear&quot;: 1964,
        &quot;description&quot;: &quot;Eleven-year old David is forced to take charge when a grizzly injures his father. He finds resources in himself he never dreamed he had.&quot;,
        &quot;image&quot;: null,
        &quot;type&quot;: &quot;book&quot;,
        &quot;emotionId&quot;: 1,
        &quot;created_at&quot;: &quot;2026-05-20T14:28:48.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-05-20T14:28:48.000000Z&quot;
    },
    {
        &quot;contentId&quot;: 39,
        &quot;title&quot;: &quot;Stalky &amp; Co&quot;,
        &quot;releaseYear&quot;: 1938,
        &quot;description&quot;: null,
        &quot;image&quot;: null,
        &quot;type&quot;: &quot;book&quot;,
        &quot;emotionId&quot;: 6,
        &quot;created_at&quot;: &quot;2026-05-20T14:28:49.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-05-20T14:28:49.000000Z&quot;
    }
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-books" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-books"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-books"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-books" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-books">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-books" data-method="GET"
      data-path="api/books"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-books', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-books"
                    onclick="tryItOut('GETapi-books');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-books"
                    onclick="cancelTryOut('GETapi-books');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-books"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/books</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-books"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-books"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-books--id-">GET api/books/{id}</h2>

<p>
</p>



<span id="example-requests-GETapi-books--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://enjoyhub-back-production.up.railway.app/api/books/consequatur" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://enjoyhub-back-production.up.railway.app/api/books/consequatur"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-books--id-">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;No query results for model [App\\Models\\Content] consequatur&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-books--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-books--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-books--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-books--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-books--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-books--id-" data-method="GET"
      data-path="api/books/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-books--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-books--id-"
                    onclick="tryItOut('GETapi-books--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-books--id-"
                    onclick="cancelTryOut('GETapi-books--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-books--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/books/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-books--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-books--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-books--id-"
               value="consequatur"
               data-component="url">
    <br>
<p>The ID of the book. Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTapi-books">POST api/books</h2>

<p>
</p>



<span id="example-requests-POSTapi-books">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://enjoyhub-back-production.up.railway.app/api/books" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://enjoyhub-back-production.up.railway.app/api/books"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-books">
</span>
<span id="execution-results-POSTapi-books" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-books"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-books"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-books" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-books">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-books" data-method="POST"
      data-path="api/books"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-books', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-books"
                    onclick="tryItOut('POSTapi-books');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-books"
                    onclick="cancelTryOut('POSTapi-books');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-books"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/books</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-books"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-books"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-books-by-emotion--emotionId-">GET api/books/by-emotion/{emotionId}</h2>

<p>
</p>



<span id="example-requests-GETapi-books-by-emotion--emotionId-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://enjoyhub-back-production.up.railway.app/api/books/by-emotion/consequatur" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://enjoyhub-back-production.up.railway.app/api/books/by-emotion/consequatur"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-books-by-emotion--emotionId-">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;error&quot;: &quot;Emotion not found&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-books-by-emotion--emotionId-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-books-by-emotion--emotionId-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-books-by-emotion--emotionId-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-books-by-emotion--emotionId-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-books-by-emotion--emotionId-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-books-by-emotion--emotionId-" data-method="GET"
      data-path="api/books/by-emotion/{emotionId}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-books-by-emotion--emotionId-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-books-by-emotion--emotionId-"
                    onclick="tryItOut('GETapi-books-by-emotion--emotionId-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-books-by-emotion--emotionId-"
                    onclick="cancelTryOut('GETapi-books-by-emotion--emotionId-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-books-by-emotion--emotionId-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/books/by-emotion/{emotionId}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-books-by-emotion--emotionId-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-books-by-emotion--emotionId-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>emotionId</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="emotionId"                data-endpoint="GETapi-books-by-emotion--emotionId-"
               value="consequatur"
               data-component="url">
    <br>
<p>Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-emotions">GET api/emotions</h2>

<p>
</p>



<span id="example-requests-GETapi-emotions">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://enjoyhub-back-production.up.railway.app/api/emotions" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://enjoyhub-back-production.up.railway.app/api/emotions"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-emotions">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">[
    {
        &quot;emotionId&quot;: 1,
        &quot;emotionName&quot;: &quot;calm&quot;,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    },
    {
        &quot;emotionId&quot;: 2,
        &quot;emotionName&quot;: &quot;happy&quot;,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    },
    {
        &quot;emotionId&quot;: 3,
        &quot;emotionName&quot;: &quot;sad&quot;,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    },
    {
        &quot;emotionId&quot;: 4,
        &quot;emotionName&quot;: &quot;intense&quot;,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    },
    {
        &quot;emotionId&quot;: 5,
        &quot;emotionName&quot;: &quot;dark&quot;,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    },
    {
        &quot;emotionId&quot;: 6,
        &quot;emotionName&quot;: &quot;romantic&quot;,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    },
    {
        &quot;emotionId&quot;: 7,
        &quot;emotionName&quot;: &quot;adventurous&quot;,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    },
    {
        &quot;emotionId&quot;: 8,
        &quot;emotionName&quot;: &quot;nostalgic&quot;,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    },
    {
        &quot;emotionId&quot;: 9,
        &quot;emotionName&quot;: &quot;inspiring&quot;,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    },
    {
        &quot;emotionId&quot;: 10,
        &quot;emotionName&quot;: &quot;reflective&quot;,
        &quot;created_at&quot;: null,
        &quot;updated_at&quot;: null
    }
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-emotions" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-emotions"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-emotions"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-emotions" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-emotions">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-emotions" data-method="GET"
      data-path="api/emotions"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-emotions', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-emotions"
                    onclick="tryItOut('GETapi-emotions');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-emotions"
                    onclick="cancelTryOut('GETapi-emotions');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-emotions"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/emotions</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-emotions"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-emotions"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-books-import-random-genre">POST api/books/import/random-genre</h2>

<p>
</p>



<span id="example-requests-POSTapi-books-import-random-genre">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://enjoyhub-back-production.up.railway.app/api/books/import/random-genre" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://enjoyhub-back-production.up.railway.app/api/books/import/random-genre"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-books-import-random-genre">
</span>
<span id="execution-results-POSTapi-books-import-random-genre" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-books-import-random-genre"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-books-import-random-genre"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-books-import-random-genre" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-books-import-random-genre">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-books-import-random-genre" data-method="POST"
      data-path="api/books/import/random-genre"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-books-import-random-genre', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-books-import-random-genre"
                    onclick="tryItOut('POSTapi-books-import-random-genre');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-books-import-random-genre"
                    onclick="cancelTryOut('POSTapi-books-import-random-genre');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-books-import-random-genre"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/books/import/random-genre</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-books-import-random-genre"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-books-import-random-genre"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-users">GET api/users</h2>

<p>
</p>



<span id="example-requests-GETapi-users">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://enjoyhub-back-production.up.railway.app/api/users" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://enjoyhub-back-production.up.railway.app/api/users"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-users">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">[
    {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;Test User&quot;,
        &quot;email&quot;: &quot;test@example.com&quot;,
        &quot;email_verified_at&quot;: &quot;2026-05-20 13:42:58&quot;,
        &quot;remember_token&quot;: &quot;EA7QscZKrF&quot;,
        &quot;created_at&quot;: &quot;2026-05-20T13:42:59.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-05-20T13:42:59.000000Z&quot;
    }
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-users" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-users"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-users"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-users" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-users">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-users" data-method="GET"
      data-path="api/users"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-users', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-users"
                    onclick="tryItOut('GETapi-users');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-users"
                    onclick="cancelTryOut('GETapi-users');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-users"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/users</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-users"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-users"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-users--id--lists">GET api/users/{id}/lists</h2>

<p>
</p>



<span id="example-requests-GETapi-users--id--lists">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://enjoyhub-back-production.up.railway.app/api/users/17/lists" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://enjoyhub-back-production.up.railway.app/api/users/17/lists"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-users--id--lists">
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-users--id--lists" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-users--id--lists"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-users--id--lists"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-users--id--lists" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-users--id--lists">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-users--id--lists" data-method="GET"
      data-path="api/users/{id}/lists"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-users--id--lists', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-users--id--lists"
                    onclick="tryItOut('GETapi-users--id--lists');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-users--id--lists"
                    onclick="cancelTryOut('GETapi-users--id--lists');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-users--id--lists"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/users/{id}/lists</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-users--id--lists"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-users--id--lists"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-users--id--lists"
               value="17"
               data-component="url">
    <br>
<p>The ID of the user. Example: <code>17</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTapi-users--userId--lists">POST api/users/{userId}/lists</h2>

<p>
</p>



<span id="example-requests-POSTapi-users--userId--lists">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://enjoyhub-back-production.up.railway.app/api/users/17/lists" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://enjoyhub-back-production.up.railway.app/api/users/17/lists"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-users--userId--lists">
</span>
<span id="execution-results-POSTapi-users--userId--lists" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-users--userId--lists"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-users--userId--lists"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-users--userId--lists" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-users--userId--lists">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-users--userId--lists" data-method="POST"
      data-path="api/users/{userId}/lists"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-users--userId--lists', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-users--userId--lists"
                    onclick="tryItOut('POSTapi-users--userId--lists');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-users--userId--lists"
                    onclick="cancelTryOut('POSTapi-users--userId--lists');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-users--userId--lists"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/users/{userId}/lists</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-users--userId--lists"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-users--userId--lists"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>userId</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="userId"                data-endpoint="POSTapi-users--userId--lists"
               value="17"
               data-component="url">
    <br>
<p>Example: <code>17</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTapi-users--userId--discarded--contentId-">POST api/users/{userId}/discarded/{contentId}</h2>

<p>
</p>



<span id="example-requests-POSTapi-users--userId--discarded--contentId-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://enjoyhub-back-production.up.railway.app/api/users/17/discarded/consequatur" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://enjoyhub-back-production.up.railway.app/api/users/17/discarded/consequatur"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-users--userId--discarded--contentId-">
</span>
<span id="execution-results-POSTapi-users--userId--discarded--contentId-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-users--userId--discarded--contentId-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-users--userId--discarded--contentId-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-users--userId--discarded--contentId-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-users--userId--discarded--contentId-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-users--userId--discarded--contentId-" data-method="POST"
      data-path="api/users/{userId}/discarded/{contentId}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-users--userId--discarded--contentId-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-users--userId--discarded--contentId-"
                    onclick="tryItOut('POSTapi-users--userId--discarded--contentId-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-users--userId--discarded--contentId-"
                    onclick="cancelTryOut('POSTapi-users--userId--discarded--contentId-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-users--userId--discarded--contentId-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/users/{userId}/discarded/{contentId}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-users--userId--discarded--contentId-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-users--userId--discarded--contentId-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>userId</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="userId"                data-endpoint="POSTapi-users--userId--discarded--contentId-"
               value="17"
               data-component="url">
    <br>
<p>Example: <code>17</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>contentId</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="contentId"                data-endpoint="POSTapi-users--userId--discarded--contentId-"
               value="consequatur"
               data-component="url">
    <br>
<p>Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-users--userId--discarded">GET api/users/{userId}/discarded</h2>

<p>
</p>



<span id="example-requests-GETapi-users--userId--discarded">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://enjoyhub-back-production.up.railway.app/api/users/17/discarded" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://enjoyhub-back-production.up.railway.app/api/users/17/discarded"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-users--userId--discarded">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">[]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-users--userId--discarded" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-users--userId--discarded"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-users--userId--discarded"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-users--userId--discarded" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-users--userId--discarded">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-users--userId--discarded" data-method="GET"
      data-path="api/users/{userId}/discarded"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-users--userId--discarded', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-users--userId--discarded"
                    onclick="tryItOut('GETapi-users--userId--discarded');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-users--userId--discarded"
                    onclick="cancelTryOut('GETapi-users--userId--discarded');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-users--userId--discarded"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/users/{userId}/discarded</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-users--userId--discarded"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-users--userId--discarded"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>userId</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="userId"                data-endpoint="GETapi-users--userId--discarded"
               value="17"
               data-component="url">
    <br>
<p>Example: <code>17</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-lists--listId--items">GET api/lists/{listId}/items</h2>

<p>
</p>



<span id="example-requests-GETapi-lists--listId--items">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://enjoyhub-back-production.up.railway.app/api/lists/consequatur/items" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://enjoyhub-back-production.up.railway.app/api/lists/consequatur/items"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-lists--listId--items">
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-lists--listId--items" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-lists--listId--items"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-lists--listId--items"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-lists--listId--items" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-lists--listId--items">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-lists--listId--items" data-method="GET"
      data-path="api/lists/{listId}/items"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-lists--listId--items', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-lists--listId--items"
                    onclick="tryItOut('GETapi-lists--listId--items');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-lists--listId--items"
                    onclick="cancelTryOut('GETapi-lists--listId--items');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-lists--listId--items"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/lists/{listId}/items</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-lists--listId--items"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-lists--listId--items"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>listId</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="listId"                data-endpoint="GETapi-lists--listId--items"
               value="consequatur"
               data-component="url">
    <br>
<p>Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTapi-lists--listId--items">POST api/lists/{listId}/items</h2>

<p>
</p>



<span id="example-requests-POSTapi-lists--listId--items">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://enjoyhub-back-production.up.railway.app/api/lists/consequatur/items" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://enjoyhub-back-production.up.railway.app/api/lists/consequatur/items"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-lists--listId--items">
</span>
<span id="execution-results-POSTapi-lists--listId--items" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-lists--listId--items"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-lists--listId--items"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-lists--listId--items" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-lists--listId--items">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-lists--listId--items" data-method="POST"
      data-path="api/lists/{listId}/items"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-lists--listId--items', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-lists--listId--items"
                    onclick="tryItOut('POSTapi-lists--listId--items');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-lists--listId--items"
                    onclick="cancelTryOut('POSTapi-lists--listId--items');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-lists--listId--items"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/lists/{listId}/items</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-lists--listId--items"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-lists--listId--items"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>listId</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="listId"                data-endpoint="POSTapi-lists--listId--items"
               value="consequatur"
               data-component="url">
    <br>
<p>Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-DELETEapi-lists--listId--items--contentId-">DELETE api/lists/{listId}/items/{contentId}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-lists--listId--items--contentId-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "https://enjoyhub-back-production.up.railway.app/api/lists/consequatur/items/consequatur" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://enjoyhub-back-production.up.railway.app/api/lists/consequatur/items/consequatur"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-lists--listId--items--contentId-">
</span>
<span id="execution-results-DELETEapi-lists--listId--items--contentId-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-lists--listId--items--contentId-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-lists--listId--items--contentId-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-lists--listId--items--contentId-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-lists--listId--items--contentId-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-lists--listId--items--contentId-" data-method="DELETE"
      data-path="api/lists/{listId}/items/{contentId}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-lists--listId--items--contentId-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-lists--listId--items--contentId-"
                    onclick="tryItOut('DELETEapi-lists--listId--items--contentId-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-lists--listId--items--contentId-"
                    onclick="cancelTryOut('DELETEapi-lists--listId--items--contentId-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-lists--listId--items--contentId-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/lists/{listId}/items/{contentId}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-lists--listId--items--contentId-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-lists--listId--items--contentId-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>listId</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="listId"                data-endpoint="DELETEapi-lists--listId--items--contentId-"
               value="consequatur"
               data-component="url">
    <br>
<p>Example: <code>consequatur</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>contentId</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="contentId"                data-endpoint="DELETEapi-lists--listId--items--contentId-"
               value="consequatur"
               data-component="url">
    <br>
<p>Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTapi-recommendations">POST api/recommendations</h2>

<p>
</p>



<span id="example-requests-POSTapi-recommendations">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://enjoyhub-back-production.up.railway.app/api/recommendations" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://enjoyhub-back-production.up.railway.app/api/recommendations"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-recommendations">
</span>
<span id="execution-results-POSTapi-recommendations" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-recommendations"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-recommendations"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-recommendations" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-recommendations">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-recommendations" data-method="POST"
      data-path="api/recommendations"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-recommendations', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-recommendations"
                    onclick="tryItOut('POSTapi-recommendations');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-recommendations"
                    onclick="cancelTryOut('POSTapi-recommendations');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-recommendations"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/recommendations</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-recommendations"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-recommendations"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

            

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>
