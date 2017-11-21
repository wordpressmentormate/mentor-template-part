# Template Part Arguments

An alternative to native Wordpress function `get_template_part` that allows passing of arbitrary arguments to the template partial.

## How to use

There are two template functions exposed by the plugin - `get_template_part_args` and `get_template_part_vars`. The former is used in place of `get_template_part`, i.e. to pass the arguments and the latter is used to retrieve them in the template partial. 

Here's an example:

```php
// Anywhere in your theme templates
get_template_part_args( 'template', 'part', [ 'example_argument' => true ] ); 
```

```php
// in template-part.php

// define defaults
$defaults = [
	'example_argument' => false,
];

// combine defaults with passed args
$args = wp_parse_args( get_template_part_vars( $this ), $defaults );
