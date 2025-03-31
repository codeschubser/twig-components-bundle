# Breadcrumbs

Provide breadcrumb navigation with valid schema.org markup.

~~~html
# Twig
<twig:Breadcrumbs
    class="my-2"
    items="{{ [
            {url: url('app_homepage'), label: 'pages.homepage.label'|trans, icon: 'bi bi-house'},
            {label: 'pages.blog.label'|trans},
        ] }}"
/>

# HTML
<nav class="my-2" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="https://127.0.0.1:8000/"><i class="bi bi-house" aria-label="Startseite"></i></a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Blog</li>
    </ol>
</nav>

<script type="application/ld+json">{"@context":"https:\/\/schema.org","@type":"BreadcrumbList","itemListElement":[{"@type":"ListItem","position":1,"name":"Startseite","item":"https:\/\/127.0.0.1:8000\/"},{"@type":"ListItem","position":2,"name":"Blog"}]}</script>
~~~
