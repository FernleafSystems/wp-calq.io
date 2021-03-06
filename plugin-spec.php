<?php
return "---
properties:
  version: '1.0.1'
  slug_parent: 'icwp'
  slug_plugin: 'calqio'
  text_domain: 'wp-calqio'
  base_permissions: 'manage_options'
  wpms_network_admin_only: true
  logging_enabled: false
  autoupdate: 'yes' #yes/block/pass

requirements:
  php: '5.3.0'
  wordpress: '3.5.0'

paths:
  source: 'src'
  assets: 'assets'
  temp: 'tmp'
  languages: 'languages'
  views: 'views'

includes:
  admin:
    css:
      - global-plugin
  plugin_admin:
    css:
      - bootstrap-wpadmin
      - bootstrap-wpadmin-fixes
      - plugin
  frontend:
    css:

menu:
  show: true
  top_level: true # to-do is allow for non-top-level menu items.
  do_submenu_fix: true
  title: 'Calq.io'
  callback: 'onDisplayTopMenu'
  icon_image: 'icontrolwp_16x16.png'
  has_submenu: true # to-do is allow for non-top-level menu items.

labels: #the keys below must correspond exactly for the 'all_plugins' filter
  Name: 'Calq.io For WordPress'
  Description: 'Easily Integrate Calq.io Analytics Into Your WordPress Sites'
  Title: 'Calq.io'
  Author: 'iControlWP'
  AuthorName: 'iControlWP'
  PluginURI: 'http://icwp.io/home'
  AuthorURI: 'http://icwp.io/home'
  icon_url_16x16: 'icontrolwp_16x16.png'
  icon_url_32x32: 'icontrolwp_32x32.png'

# This is on the plugins.php page with the option to remove or add custom links.
action_links:
  remove:
  add:
    -
      name: 'Dashboard'
      url_method_name: 'getPluginUrl_AdminMainPage'
";