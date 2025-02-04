# Alert

Provide contextual feedback messages for typical user actions with the handful of available and flexible alert messages.
See [Bootstrap](https://getbootstrap.com/docs/5.3/components/alerts/) documentation for further information.

~~~html
# Variants (required)
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
# Message or content (required)
<twig:Alert type="success" message="Your action was successful!"/>
<twig:Alert type="danger">
    <strong>Heads up!</strong>
</twig:Alert>
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
