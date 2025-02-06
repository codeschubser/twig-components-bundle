# Button

~~~html
# Twig
<twig:Button variant="primary" label="Button"/>

# HTML
<button class="btn btn-primary" type="button">Button</button>
~~~

~~~html
# Variant (required)
<twig:Button variant="primary" label="Primary"/>
<twig:Button variant="secondary" label="Secondary"/>
<twig:Button variant="info" label="Info"/>
<twig:Button variant="success" label="Success"/>
<twig:Button variant="warning" label="Warning"/>
<twig:Button variant="danger" label="Danger"/>
~~~

Info: [Available variants](variants.md)

~~~html
# Label (optional)
<twig:Button variant="danger" label="Cancel"/>
<twig:Button variant="danger">Cancel</twig:Button>

# HTML
<button class="btn btn-danger" type="button">Cancel</button>
~~~

~~~html
# Type (optional)
<twig:Button variant="danger" label="Delete" isSubmit/>

# HTML
<button class="btn btn-danger" type="submit">Delete</button>
~~~

~~~html
# Icon (optional)
<twig:Button variant="info" icon="bi bi-info-circle-full"/>
<twig:Button variant="success" label="Ok" icon="bi bi-icheck"/>

# HTML
<button class="btn btn-info" type="button">
    <span class="bi bi-info-circle"></span>
</button>
<button class="btn btn-success" type="button">
    <span class="me-1 bi bi-check"></span>
    Ok
</button>
~~~

~~~html
# Passing additional properties (optional)
<twig:Button variant="success" icon="bi bi-check" label="Ok" class="btn-lg"/>

# HTML
<button class="btn btn-success btn-lg" type="button">
    <span class="me-1 bi bi-check"></span>
    Ok
</button>
~~~
