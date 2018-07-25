=== Google Authenticator Hide For Non-Users ===
Contributors: scott.deluzio
Tags: Google Authenticator, two factor authentication, 2fa
Requires at least: 4.5
Tested up to: 4.9.7
Stable tag: 1.0
License: GNU Version 2 or Any Later Version

Hides the Google Authenticator form field on login if user does not require 2FA.

== Description ==
The [Google Authenticator](https://wordpress.org/plugins/google-authenticator/) plugin adds a third form field for a Google Authenticator code on the WordPress login page. This is a great way to login to your site securely as it forces users who have Two-Factor Authentication (2FA) enabled to enter their Google Authenticator code in order to login.

The downside is that users who are not using 2FA to login to your site (customers, casual visitors, etc.) will likely be confused about what to enter into that field.

This plugin will hide the Google Authenticator field when the login page is first displayed. It then listens to the Username or Email Address field. Once a username or email address has been entered who requires the use of the Google Authenticator code, the Google Authenticator field will be displayed.

If the user goes back and changes the username or email address to another user who does not require the Google Authenticator code, the field will be hidden again.

This plugin does not have any settings. Just activate it and you are all set!

This plugin requires that you are using the [Google Authenticator](https://wordpress.org/plugins/google-authenticator/) plugin by Henrik Schack.

== Installation ==
1. Make sure you have the [Google Authenticator](https://wordpress.org/plugins/google-authenticator/) plugin by Henrik Schack installed and active on your site.
2. Install and activate this plugin.

== Frequently Asked Questions ==
= Will this plugin work with other 2FA or Google Authenticator compatible plugins? =
No, this plugin was only designed to work with the [Google Authenticator](https://wordpress.org/plugins/google-authenticator/) plugin by Henrik Schack.

= Are there any settings? =
No, just install and activate this plugin and it will work without any additional settings.

= The plugin does not seem to be working, what is wrong? =
This plugin requires AJAX on your site to be working properly. Here are a few things to check:

* Make sure that the /wp-admin/admin-ajax.php file exists on your site.
* Right click on your login page and select Inspect Element. If you notice an X in a red circle, there may be errors that are preventing this plugin from loading correctly. This could be from another plugin, or something else. Correct those errors to get this plugin working.
* Your browser must have JavaScript enabled. Most browsers have it enabled by default, but if yours does not then this plugin likely will not work for you.
* You might have another login theme plugin enabled that is interfering with this plugin.

== Changelog ==
= 1.0 =
* Initial release

== Upgrade Notice ==
= 1.0 =
* Initial release