# Cards

~~~html
# Twig
<twig:Card/>

# HTML
<div class="card">
    <div class="card-body"></div>
</div>
~~~

~~~html
# Variant (required)
# Twig
<twig:Card variant="primary"/>
<twig:Card variant="secondary"/>
<twig:Card variant="info"/>
<twig:Card variant="success"/>
<twig:Card variant="warning"/>
<twig:Card variant="danger"/>

# HTML
<div class="card text-bg-primary">
    <div class="card-body"></div>
</div>
...
~~~

Info: [Available variants](variants.md)

~~~html
# Optional properties

# Header
# Twig
<twig:Card header="Card header"/>

# HTML
<div class="card">
    <div class="card-header">Card header</div>
    <div class="card-body"></div>
</div>

# Footer
# Twig
<twig:Card footer="Card footer"/>

# HTML
<div class="card">
    <div class="card-body"></div>
    <div class="card-footer">Card footer</div>
</div>

# Title
# Twig
<twig:Card title="Card title"/>

# HTML
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Card title</h5>
    </div>
</div>

# Subtitle (title is required)
# Twig
<twig:Card title="Card title" subtitle="Card subtitle"/>

# HTML
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <h6 class="card-subtitle mb-2">Card subtitle</h6>
    </div>
</div>

# Text
# Twig
<twig:Card text="Lorem ipsum dolor sit amet"/>

# HTML
<div class="card">
    <div class="card-body">
        <div class="card-text">Lorem ipsum dolor sit amet</div>
    </div>
</div>

# Image
# Twig
<twig:Card image="/path/to/image.jpg"/>

# HTML
<div class="card">
    <img src="/path/to/image.jpg" class="card-image card-img-top" alt="">
    <div class="card-body"></div>
</div>

# Full example
# Twig
<twig:Card
    variant="primary"
    header="Card header"
    image="https://picsum.photos/1024/150"
    footer="Card footer"
    title="Card title"
    subtitle="Card subtitle"
    text="Some quick example text to build on the card title and make up the bulk of the card's content."
>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">An item</li>
        <li class="list-group-item">A second item</li>
        <li class="list-group-item">A third item</li>
    </ul>
</twig:Card>

# HTML
<div class="card text-bg-primary">
    <div class="card-header">Card header</div>
    <img src="https://picsum.photos/1024/150" class="card-image" alt="Card title">
    <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <h6 class="card-subtitle mb-2">Card subtitle</h6>
        <div class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</div>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">An item</li>
        <li class="list-group-item">A second item</li>
        <li class="list-group-item">A third item</li>
    </ul>
    <div class="card-footer">Card footer</div>
</div>
~~~
