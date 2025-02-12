# Dropdowns

Provide toggleable and contextual overlays for displaying lists of links and more.
See [Bootstrap](https://getbootstrap.com/docs/5.3/components/alerts/) documentation for further information.

![Example](dropdown-example.png "A full example of an dropdown") * Icon is styled by Bootstrap Icons.

~~~php
# PHP
# Dropdown items are required (greater than one item)
$dropdownItems = [];
$dropdownItems[] = new DropdownHeader(label: 'Header');
$dropdownItems[] = new DropdownItem(label: 'Current link', link: '#', icon: 'bi bi-1-circle', isCurrent: true);
$dropdownItems[] = new DropdownItem(label: 'Link', link: '#', icon: 'bi bi-2-circle');
$dropdownItems[] = new DropdownItem(label: 'Link with target', link: '#', target: '_blank', icon: 'bi bi-2-circle');
$dropdownItems[] = new DropdownDivider();
$dropdownItems[] = new DropdownItem(label: 'Link without icon', link: '#');
$dropdownItems[] = new DropdownText(text: 'Plain text');
~~~

~~~html
# Twig
<twig:Dropdown items="{{ dropdown_items }}" label="Dropdown left aligned" icon="bi bi-check-square"/>
~~~

~~~html
# HTML
<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle show" type="button" data-bs-toggle="dropdown" aria-expanded="true">
        <span class="bi bi-check-square me-2" aria-hidden="true"></span>
        Dropdown left aligned
    </button>
    <ul class="dropdown-menu">
        <li>
            <h6 class="dropdown-header">Header</h6>
        </li>
        <li>
            <a class="dropdown-item active" href="#" target="_self" aria-current="true">
                <span class="bi bi-1-circle me-2" aria-hidden="true"></span>
                Current link
            </a>
        </li>
        <li>
            <a class="dropdown-item" href="#" target="_self">
                <span class="bi bi-2-circle me-2" aria-hidden="true"></span>
                Link
            </a>
        </li>
        <li>
            <a class="dropdown-item" href="#" target="_blank">
                <span class="bi bi-2-circle me-2" aria-hidden="true"></span>
                Link with target
            </a>
        </li>
        <li>
            <hr class="dropdown-divider"></li>
        <li>
            <a class="dropdown-item" href="#" target="_self">Link without icon</a></li>
        <li>
            <span class="dropdown-item-text">Plain text</span>
        </li>
    </ul>
</div>
~~~

~~~html
# Variant (optional, default: secondary)
<twig:Dropdown variant="primary"/>
<twig:Dropdown variant="secondary"/>
<twig:Dropdown variant="info"/>
<twig:Dropdown variant="success"/>
<twig:Dropdown variant="warning"/>
<twig:Dropdown variant="danger"/>
<twig:Dropdown variant="light"/>
<twig:Dropdown variant="dark"/>
~~~

Info: [Available variants](variants.md)

~~~html
# Label (optional)
<twig:Dropdown items="{{ dropdown_items }}" label="Lorem ipsum"/>

# HTML
<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle show" type="button" data-bs-toggle="dropdown" aria-expanded="true">
        Lorem ipsum
    </button>
    <ul class="dropdown-menu">
    ...
    </ul>
</div>
~~~

~~~html
# Icon (optional)
<twig:Dropdown items="{{ dropdown_items }}" icon="bi bi-star-fill"/>

# HTML
<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">        
        <span class="bi bi-star-fill " aria-hidden="true"></span>
    </button>
    <ul class="dropdown-menu">
    ...
    </ul>
</div>
~~~

~~~html
# DropUp (optional)
<twig:Dropdown items="{{ dropdown_items }}" :isDropUp="true"/>

# HTML
<div class="dropdown dropup">
    <button class="btn btn-secondary dropdown-toggle show" type="button" data-bs-toggle="dropdown" aria-expanded="true"></button>
    <ul class="dropdown-menu">
    ...
    </ul>
</div>
~~~

~~~html
# Right aligned menu (optional)
<twig:Dropdown items="{{ dropdown_items }}" :isRightAligned="true"/>

# HTML
<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle show" type="button" data-bs-toggle="dropdown" aria-expanded="true"></button>
    <ul class="dropdown-menu dropdown-menu-end">
    ...
    </ul>
</div>
~~~
