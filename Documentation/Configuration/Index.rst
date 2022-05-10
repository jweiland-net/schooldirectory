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


.. _pidOfSearchPage:

pidOfSearchPage
---------------

Example: plugin.tx_schooldirectory.settings.pidOfSearchPage = 21

If you're using the DropDowns to filter school records in frontend you can define another page
shere to show the filtered school records. If empty we will show them on current page.


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

Here you can configure width and height for images in list view.


.. _show:

show
----

Default: 240c for width and 180c for height

Example: plugin.tx_schooldirectory.settings.show.image.width = 300c

Here you can configure width and height for images in detail view.


.. _glossar:

glossary
--------

**mergeNumbers**

Example: plugin.tx_schooldirectory.settings.glossary.mergeNumbers = 1

Merge school titles starting with numbers to `0-9` in glossary.

**showAllLink**

Example: plugin.tx_schooldirectory.settings.glossary.showAllLink = 1

Prepend an additional button in front of the glossary to show all school records again.


.. _pageBrowser:

pageBrowser
-----------

You can fine tuning the page browser

Example: plugin.tx_schooldirectory.settings.pageBrowser.itemsPerPage = 15

**itemsPerPage**

Reduce result of school records to this value for a page

