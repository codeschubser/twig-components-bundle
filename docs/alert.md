# Alert

Provide contextual feedback messages for typical user actions with the handful of available and flexible alert messages.
See [Bootstrap](https://getbootstrap.com/docs/5.3/components/alerts/) documentation for further information.

~~~html
# Twig
<twig:Alert variant="primary"/>

# HTML
<div class="alert alert-primary" role="alert"></div>
~~~

~~~html
# Variant (required)
<twig:Alert variant="primary"/>
<twig:Alert variant="secondary"/>
<twig:Alert variant="info"/>
<twig:Alert variant="success"/>
<twig:Alert variant="warning"/>
<twig:Alert variant="danger"/>
<twig:Alert variant="light"/>
<twig:Alert variant="dark"/>
~~~

Info: [Available variants](variants.md)

~~~html
# Message or content (optional)
<twig:Alert type="success" message="Your action was successful!"/>
<twig:Alert type="danger">
    <strong>Heads up!</strong>
</twig:Alert>

# HTML
<div class="alert alert-success" role="alert">
    Your actions was successful!
</div>
~~~

~~~html
# Title (optional)
<twig:Alert type="info" title="Hello world!"/>
~~~

~~~html
# Icon (optional)
<twig:Alert type="secondary" icon="bi bi-info-circle-full"/>
~~~

~~~html
# Dismissible (optional)
<twig:Alert type="warning" dismissible/>
~~~

~~~html
# All options

# Twig
<twig:Alert variant="danger" icon="bi bi-info-circle" title="Attention!" message="Lorem ipsum dolor sit amet" dismissible="true"/>

# HTML
<div class="alert alert-danger alert-dismissible d-flex align-items-start" role="alert">
	<span class="flex-shrink-0 me-3 bi bi-info-circle"></span>
	<div>
		<h6 class="alert-heading mb-0">Attention!</h6>
		<p class="mb-0">Lorem ipsum dolor sit amet</p>
	</div>

	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
~~~

![Rendered](alert.png "Alert with icon, title and dismissible button")
