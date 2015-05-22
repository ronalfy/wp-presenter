# ACF/Advanced Custom Fields oEmbed Field Type

Adds a 'oEmbed' field type for the [Advanced Custom Fields](http://wordpress.org/extend/plugins/advanced-custom-fields/) WordPress plugin.

**With the news that ACF V5 includes a built-in oEmbed field type, we're discontinuing further development of this plugin. The plugin will remain online for legacy V4 support to those that haven’t upgraded, but only essential updates will be released.**

-----------------------

### Overview

Requires the Advanced Custom Fields plugin. Output can be selected as HTML embed, URL, or data object. Includes settings for preview and output resolution and will accept any provider registered in WordPress. Now listed in the [WordPress plugins repository](http://wordpress.org/plugins/advanced-custom-fields-oembed-field/).

### Compatibility

This add-on will work with:

* Advanced Custom Fields version 4 and up
* Repeater Field

### Installation

This add-on can be treated as both a WP plugin and a theme include.

**Install as Plugin**

1. Install from within WordPress by searching for 'Advanced Custom Fields oEmbed Field'.

1. Copy the 'acf-oembed' folder into your plugins folder
2. Activate the plugin via the Plugins admin page

**Include within theme**

1.	Copy the 'acf-oembed' folder into your theme folder (can use sub folders). You can place the folder anywhere inside the 'wp-content' directory
2.	Edit your functions.php file and add the code below (Make sure the path is correct to include the acf-oembed.php file)

```php
include_once('acf-oembed/acf-oembed.php');
```

### More Information

Please read the readme.txt file for more information
