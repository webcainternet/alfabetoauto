EXTENSION NAME
==================================
Filters Pro v1.0.8

APPLICATION
==================================
OpenCart 1.5.1.3 - 1.5.4.1

AUTHOR
==================================
Adam Nicholson
www.adamnicholson.co.uk
adam-nicholson@live.co.uk

INSTALLATION
==================================
UPGRADING FROM AN OLDER VERSION:
1. Copy the full contents of the 'Upload' folder to the root directory of your website
2. Uninstall, then re-Install the "Attribute & Prices Filter Pro" module
5. Click Edit next to "Attribute & Prices Filter Pro" and reconfigure


AUTOMATIC INSTALL WITH VQMOD
1. If you have not already, download & install vQmod using the instructions here: http://code.google.com/p/vqmod/wiki/Install_OpenCart
2. Copy the full contents of the 'Upload' folder to the root directory of your website
3. Enable permissions by going to Admin > System > Users > User Groups > Edit and check the tickbox for 'module/an_filters' under 'Access Permission' and 'Modify Permission'
4. In OpenCart go to Admin > Extensions > Modules and click Install next to "Attribute & Prices Filter Pro"
5. Click Edit next to "Attribute & Prices Filter Pro" and setup as you like

MANUAL INSTALL WITHOUT VQMOD
1. Follow the directions given in Upload/vqmod/xml/vqmod_an_filters.xml
2. Copy the 'admin' and 'catalog' folders from within the 'Upload' folder to the root directory of your website
3. Enable permissions by going to Admin > System > Users > User Groups > Edit and check the tickbox for 'module/an_filters' under 'Access Permission' and 'Modify Permission'
4. In OpenCart go to Admin > Extensions > Modules and click Install next to "Attribute & Prices Filter Pro"
5. Click Edit next to "Attribute & Prices Filter Pro" and setup as you like

TROUBLESHOOTING
==================================
- For all issues, first try clearing your browser cache, restart your browser, and delete the contents of OpenCart's cache folder (/system/cache/)
- If you are having issues with price filters and are using a custom currency, try re-saving your store settings (Admin > System > Settings > Edit > Save)
- Sometimes conflicts with other extensions can prevent this extension working. Try changing your OpenCart to the default theme and disabling all other extensions - then turn them back on 1 at a time to find the conflict
- If you still are having issues, contact me by email at adam-nicholson@live.co.uk

CHANGELOG
==================================
[25.03.2012] [v1.0.1]
- Added: vQmod install

[27.03.2012] [v1.0.2]
- Added: AJAX functionality
- Added: Major performance improvements

[12.04.2012] [v1.0.3]
- Added: Price slider
- Added: Options to enable/disable each filter (attributes/prices/manufacturers)
- Added: Ability to sort attribute options
- Added: Manufacturer filtering
- Added: Support for multi-selection of attributes & manufacturers
- Added: Support for multi-languages
- Added: Debugging messages
- Fixed: 'Table does not exist' issues

[22.04.2012] [v1.0.4]
- Fixed: Manufacturers will only appear in the filter if they are applicable to any products in that category
- Fixed: Conflict when multiple attributes and a manufacturer are selected
- Fixed: Issue when sorting attributes with unique characters in their names
- Fixed: MySQL charset error when saving module options on a store with multiple languages
- Fixed: Issue with taxes not being added on properly when filtering by price
- Fixed: Rounded up the maximum value in the price slider to match options in the price bands
- Fixed: Price slider wasn't working properly on v1.5.1.3

[24.04.2012] [v1.0.5]
- Added: The ability to choose the size of the price steps in the price bands filter
- Added: Hide attributes & attribute-values from the filter by setting their sort-order to -1
- Added: Optional maximum-height & scrollbar to check-box lists
- Added: Optional collapse/expand buttons for check-box lists
- Fixed: Issue when sorting attributes
- Fixed: Entire module will be hidden if there are no products in the category

[19.07.2012] [v1.0.6]
- Added: Ability to set multiple values per-product for each attribute [BETA]
- Added: Quick "Hide all" and "Show all" links to the module admin
- Added: Option to set new attribute value sort orders to -1 by default
- Added: Option to collapse options by default
- Added: Option to enter your own label for the manufacturers selector
- Fixed: Price slider broke when users entered a value bigger than the max in the "price to" field

[29.07.2012] [v1.0.7]
- Fixed: Added error handling for some admin settings that would cause MySQL errors
- Fixed: Stopped allowing larger 'price from' values than 'price to' in the slider input boxes
- Fixed: AJAX functionality wasn't working in some cases where users were using SEO urls

[22.08.2012] [v1.0.8]
- Added: OpenCart 1.5.4.1 support
- Fixed: Option label not appearing in the extension admin on some stores
- Fixed: 'Products with duplicate attributes' error message was always appearing
- Fixed: MySQL index error on some stores




==================================
This module is sold as-is, and has been built to work with the listed OpenCart versions without any other custom extensions/themes. If you have another extension/theme which conflicts with this extension, it is your responsibility to fix it yourself, however I may provide advice.