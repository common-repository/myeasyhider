=== myEASYhider ===
Contributors: camaleo
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=CVTUG224XFA7U
Tags: myeasy, myeasywp, hide, hider, dashboard, update, admin, administration, plugin, plugins, wordpress
Requires at least: 2.8
Tested up to: 3.3.*
Stable tag: 1.2
License: GPLv2 or later

Easily hide parts of your administration page.

== Description ==
myEASYhider let's you remove almost any item from the Administration pages.

Check out the [myEASYbackup for WordPress video](http://www.youtube.com/watch?v=raXH2QiVv60):

http://www.youtube.com/watch?v=raXH2QiVv60&hd=1

This plugin relies only on core WordPress capabilities. It was created to hide items to users independently from their assigned role as it let's you decide who will or will not see the items based on his user name.

You can choose the items to remove, for example the Tools and the Plugins menu, from a list of predefined items.
Additionally you can hide any other element on the admin page. By using the "myEASYhider ID searcher" simply move the cursor over the page elements to know their IDs.

Initially created for a marketing agency I worked, this plugin was needed to fix a bug we found were WordPress &ndash; under unknown circustances &ndash; keeps asking to update its version to 2.9.2 while reporting that version 2.9.2 is installed.
Moreover the agency needed to give "limited capabilities" to customers having administration privileges; Customers in fact, needs to be independent when its time to add a new user.
At the same time, the agency wanted to avoid their customers "playing around" with the installed plugins, themes, tools and settings to reduce as much as they can urgent (and un-needed!) support requests.

Now available to everyone willing to keep the Administration pages for their customers as "simple" as possible.

Also available for professional users, the PRO version has the following additional features:

* Customize the header and footer in the admin pages with your logo, colors and your Company information
* Hide parts pending on the user role
* Replace the WordPress logo with any other image in the login page

NEW in version 1.1.2
* Hide the Personal Options section in the users settings page, useful if you want to force users to have the Admin Menu Bar in the dashboard
* Hide the "Plugin Updates" and "Comments awaiting moderation" in the admin bar

NEW in version 1.1 (PRO)
* Make the site available to registered users only - useful before publishing the site or while doing maintenance
* Hide submenu items, for example you can let users edit pages but not add new ones!
* Hide the "Plugin Updates" and "Comments awaiting moderation" in the admin bar for each role

<a href="http://myeasywp.com/plugins/myeasyhider/" title="Get myEASYhider PRO">Get myEASYhider PRO</a>
If you are a legitimate myEASYhider PRO customer, [ask for your free upgrade](http://myeasywp.com/automatic-update-request/).

Related Links:

* <a href="http://myeasywp.com/" title="myEASYwp: WordPress plugins created to make your life easier">myEASYwp plugin series homepage</a>
* To stay tuned and get live news about what's going on at myeasywp.com follow me on <a href="http://twitter.com/camaleo" target="_blank" title="myEASY live news">Twitter</a>
* Subscribe to the <a href="http://eepurl.com/bt9rD" target="_blank" title="myEASY newsletter">myeasywp.com newsletter</a>
* myEASYhider is the perfect companion to <a href="http://myeasywp.com/plugins/myeasywebally/" target="_blank">myEASYwebally</a> and <a href="http://myeasywp.com/plugins/myeasybackup/" target="_blank">myEASYbackup</a>, two other plugins in the myEASY serie.


== Installation ==

This section describes how to install the plugin and get it working.

1. Upload the full directory into your `wp-content/plugins` directory
1. Activate the plugin through the 'Plugins' menu in the WordPress Administration page
1. Open the plugin tools page, which is located under `Settings -> myEASYhider` and let the plugin work for you.


== Frequently Asked Questions ==
= If I need help with this plugin, where can I get support? =
For an updated list of FAQ, please check <a href="http://myeasywp.com/faq/">the FAQ page</a> &ndash; if there is a FAQ you will find there.
If you cannot find an answer there please submit your request <a href="https://myeasywp.zendesk.com/">on the support site</a>.

= How can I customize the administration page look? =
<a href="http://myeasywp.com/plugins/myeasyhider/" title="Visit the myEASYhider PRO page">myEASYhider PRO</a> let you customize the administration page header and footer.


== Screenshots ==

1. The myEASYhider interface allows you to easily define which parts of the administration page hide. Some options shown on the screen shot are only available in the [PRO version](http://myeasywp.com/plugins/myeasyhider/).
2. Please support further development by buying the [PRO version](http://myeasywp.com/plugins/myeasyhider/).


== Changelog ==
Starting with version 1.0.7 the changelog shows also the modifications made to the PRO version.

= 1.2 (14 May 2012) =
Now fully compatible with the new services server.

= 1.1.2 (17 February 2012) =
Fixed:
* Custom items were still shown, even if properly set.
* The custom icon was not shown on the admin bar (PRO).

Added:
* Ability to hide the "Plugin Updates" and "Comments awaiting moderation" items in the admin bar - the PRO version allow to customize these settings for each role.

= 1.1.1 (21 January 2012) =
Fixed:
* The plugin folder name is now automatically discovered: this fix is only needed for the PRO version.

= 1.1 (8 January 2012) =
Now fully compatible with WordPress 3.3.1

Fixed:
* Some minor bugs.

Added:
* Hide the Personal Options section in the users settings page, useful if you want to force users to have the Admin Menu Bar in the dashboard
* All CSS and JS code is now supplied both as full source code and minified for better performances.

Added (PRO version):
* Hide the entire site to unregistered users.
* Ability to hide submenu items (requires WordPress 3.2 or later).

= 1.0.8.1 (24 July 2011) =
Replaced few lines of a Creative Commons licensed code used to handle the mailing list subscription as per kind request from wordpress.org

= 1.0.8 (23 July 2011) =
All the images and javascript code is now loaded from the same server where the plugin is installed.
Last year I tought it might be useful to have the myeasy common images and code loaded from a CDN to avoid having to update all the plugins in the series each time an image changes and to load pages faster; so I moved all the common items to a CDN.
Today I received a kind email from wordpress.org letting me know that "there a potential malicious intent issue here as you {me} could change the files to embed malicious code and nobody would be the wiser" and asking me to change the code.
I promptly reacted to show everyone that I am 101% in bona fide and here is a new version.

= 1.0.7.2 (14 December 2010) =
Fixed:
* Issue with the users drop-down menu.

Added:
* Translation for the users roles names.

= 1.0.7.1 (13 December 2010) =
Fixed:
* Long delay in building the settings page under certain conditions.

= 1.0.7 (10 December 2010) =
Fixed:
* Common images to all the myEASY series plugins are now served by a [Content Delivery Network](http://is.gd/hUAEb): pages will load much faster and with no interruptions.
* (PRO version) Header and footer gradient colors are now correctly shown also on Safari and Chrome. Opera does not support gradient, then it uses the background-bottom color.

Added:
* The myEASYhider "ID searcher", an useful tool when you need to find out the ID of an element you want to hide.

Added (PRO version):
* Ability to customize the WordPress logo in the login page.
* You can now change the size of the custom image in the admin panel.
* Hide parts of the screen to every user with a specific role.

= 1.0.6 (13 November 2010) =
Changed:
* Changed the <a href="http://eepurl.com/bt8f1" target="_blank">newsletter provider</a> as the previous one is going to close his service by the end of 2010.

= 1.0.5 (2 September 2010) =
Fixed:
* Changed the option name used to show/hide the plugin credits to avoid duplicates when using more than one plugin in the myEASY series.

Added:
* Tool to remove ALL the plugin settings as it happened one user hided himself and was not able to administer his blog anymore. For usage instructions please see the /wp-content/plugins/myeasyhider/myeasyhider-reset file.

= 1.0.4 (23 August 2010) =
Added:
* Ability to customize what each user will be able to see.

Fixed:
* WordPress 3 compatibility: header and footer background color is now working.

= 1.0.3 (unpublished) =
Fixed:
* The entire code is executed only when its called from the administration pages.

= 1.0.2 (15 May 2010) =
Fixed:
* Automatically sanitize the custom items; now it is not possible to enter spaces and carriage returns anymore.

= 1.0.1 (12 May 2010) =
Fixed:
* Refreshing the settings page by clicking on the url field and then on the go button does not loose the "What will be hidden" values anymore.

= 1.0.0 (9 May 2010) =
The first release.


== Upgrade Notice ==

= 1.0.0 =
This is the first release.
