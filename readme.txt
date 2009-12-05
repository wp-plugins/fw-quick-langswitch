=== Plugin Name ===
Contributors: Fairweb (Myriam Faulkner)
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=10240456
Tags: localize, localization, language switch, language, flags
Requires at least: 2.6
Tested up to: 2.9
Stable tag: '/trunk'

Display flags to switch languages. This plugin only uses the locale files from wordress or buddypress and eventually your theme.

== Description ==

Display flags to switch languages. This plugin only uses the locale files from wordress or buddypress and eventually your theme for user to have the interface in his language.

When the user clicks on a flag, he is sent a cookie mentionning the language to use which will be destroyed when leaving his browser or updated when he clicks on another flag.

It does not provide content localization features.

I made this plugin as I needed my users to be able to switch from one language to another while viewing the full blog content which did not need to be localized. I had localized my theme and uploaded as many .mo language files as needed in my theme and wordpress languages directory.
I have used this plugin on Buddypress as well.

== Installation ==

1. Upload the `fw-quick-langswitch` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Duplicate the `fw-quick-langswitch/fwqls-flags` folder in your `wp-content` directory and delete flags you don't need. Add the flags you need and name them after the .mo files you are using in wp-content/languages and eventually your theme.
You then should have a `wp-content/fwqls-flags` containing all your flags named like, for example `fr_FR.png` and `it_IT.png`. If you do not create this directory, the default plugin flags will be loaded.
4. Place `<?php if (function_exists("fwqls_display_flags")) { fwqls_display_flags(); } ?>` in your template where you want the flags to appear.

== Frequently Asked Questions ==

= What will be the default language when the user first arrives on the home page ? =

This will be the default language you mentionned in your wp-config file.

= The flag icons I need are not available in the `fw-quick-langswitch/fwqls-flags` directory. Where can I find other flags ? =

You can find other flags on http://www.famfamfam.com/lab/icons/flags/. Don't forget to rename them after full Wordpress locales (ie : fr_FR.gif)

= Does this plugin allow content translation ? =

No, this plugin only uses the .mo files loaded in your wp-content/languages and eventually your buddypress and theme directories.

== Screenshots ==

No screenshot available.

== Changelog ==

= 1.0 =
* First plugin release