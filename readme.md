# Seg2Entry for Craft

Simple Craft plugin which grabs the entries for each segment.

## Usage

#### As a Function
`{{ seg2entry(1) }}` Returns the first segment's entry's title  
`{{ seg2entry(2).getLink() }}` Returns the second segment's entry's link    

_Notes:_
- If segment is not an entry, the plugin will return false. This will allow you to run conditionals to check whether the segment is an entry or not.
- All entry params are available.

#### As a Global
The plugin returns a global variable: "seg2entry" - it's an array of all the segment entries. You can use it to loop through for breadcrumbs (provided your pages are a structure, that is).

## Examples
#### Breadcrumbs
    <ul>
        {% for page in seg2entry if page is iterable %}
            <li>{{ page.getLink() }}</li>
        {% endfor %}
    </ul>

#### Segment / Entry Conditional
    {% if seg2entry(x) %}
    
#### Sub Pages Parent Reference
    <strong>{{ seg2entry(1) }}</strong>
    <h1>{{ entry.title }}</h1>