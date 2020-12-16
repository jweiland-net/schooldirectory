.. include:: ../Includes.txt


.. _configuration:

=============
Configuration
=============

Target group: **Developers, Integrators**

How to configure the extension. Try to make it easy to configure the extension.
Give a minimal example or a typical example.


Minimal Example
===============

- It is necessary to include static template `Schooldirectory (schooldirectory)`

We prefer to set a Storage PID with help of TypoScript Constants:

.. code-block:: none

   plugin.tx_schooldirectory.persistence {
      # Define Storage PID where school records are located
      storagePid = 4
   }

.. _configuration-typoscript:

TypoScript Setup Reference
==========================

.. _pidOfDetailPage:

pidOfDetailPage
---------------

Example: plugin.tx_schooldirectory.settings.pidOfDetailPage = 4

If you want, you can change the links in project listing to link to another page UID.
By default the detail view uses current page.


.. _pidOfMaps2Plugin:

pidOfMaps2Plugin
----------------

Example: plugin.tx_schooldirectory.settings.pidOfMaps2Plugin = 5

If you have assigned a maps2 POI record to a school record you should link the map to
a page where the maps2 plugin is located.


.. _list:

list
----

Default: 50c for width and height

Example: plugin.tx_schooldirectory.settings.list.image.width = 150c

Currently not implemented in Template, but if you want, you can use this
setting to show one or more images with a defined width and height.


.. _pageBrowser:

pageBrowser
-----------

You can fine tuning the page browser

Example: plugin.tx_schooldirectory.settings.pageBrowser.itemsPerPage = 15
Example: plugin.tx_schooldirectory.settings.pageBrowser.insertAbove = 1
Example: plugin.tx_schooldirectory.settings.pageBrowser.insertBelow = 0
Example: plugin.tx_schooldirectory.settings.pageBrowser.maximumNumberOfLinks = 5

**itemsPerPage**

Reduce result of school records to this value for a page

**insertAbove**

Insert page browser above list of school records

**insertBelow**

Insert page browser below list of school records. I remember a bug in TYPO3 CMS. So I can not guarantee
that this option will work.

**maximumNumberOfLinks**

If you have many school records it makes sense to reduce the amount of pages in page browser to a fixed maximum
value. Instead of 1, 2, 3, 4, 5, 6, 7, 8 you will get 1, 2, 3...8, 9 if you have configured this option to 5.
