..  include:: /Includes.rst.txt


..  _configuration:

=============
Configuration
=============

..  tip::

    You must configure the extension maps2 first to run this extension correctly.

    `Maps2 Documentation <https://docs.typo3.org/p/jweiland/maps2/master/en-us/>`_


View
====

view.templateRootPaths
----------------------

Default: Value from Constants *EXT:schooldirectory/Resources/Private/Templates/*

You can override our Templates with your own SitePackage extension. We prefer
to change this value in TS Constants.

view.partialRootPaths
---------------------

Default: Value from Constants *EXT:schooldirectory/Resources/Private/Partials/*

You can override our Partials with your own SitePackage extension. We prefer
to change this value in TS Constants.

view.layoutsRootPaths
---------------------

Default: Value from Constants *EXT:schooldirectory/Resources/Layouts/Templates/*

You can override our Layouts with your own SitePackage extension. We prefer
to change this value in TS Constants.


Persistence
===========

persistence.storagePid
----------------------

Set this value to a Storage Folder (PID) where you have stored the records.

Example: `plugin.tx_schooldirectory.settings.pidOfMaps2Plugin = 21,45,3234`


Settings
========

settings.pidOfMaps2Plugin
-------------------------

Default: 0

Example: `plugin.tx_schooldirectory.settings.pidOfMaps2Plugin = 12`

Define the page UID where the EXT:maps2 plugin is located to show an address
on a map.

setting.pidOfDetailPage
-----------------------

Default: 0

Example: `plugin.tx_schooldirectory.settings.pidOfDetailPage = 84`

Often it is useful to move the detail view onto a separate page for
design/layout reasons.

setting.pidOfSearchPage
-----------------------

Default: 0

Example: `plugin.tx_schooldirectory.settings.pidOfSearchPage = 86`

Define the page UID where you have inserted the search plugin of
`schooldirectory`.

settings.list.image.*
---------------------

Here you can define the width and height of images in list view.

Example:

..  code-block:: typoscript

    settings {
      list {
        width = 50c
        height = 50c
        minWidth = 50
        maxWidth = 50
        minHeight = 50
        maxHeight = 50
      }
    }

settings.show.image.*
---------------------

Here you can define the width and height of images in show view.

Example:

Example:

..  code-block:: typoscript

    settings {
      show {
        width = 240c
        height = 180c
      }
    }

settings.glossary.mergeNumbers
------------------------------

Default: 1

Example: `plugin.tx_schooldirectory.settings.glossary.mergeNumbers = 0`

Merge record titles starting with numbers to `0-9` in glossary.

settings.glossary.showAllLink
-----------------------------

Default: 1

Example: `plugin.tx_schooldirectory.settings.glossary.showAllLink = 0`

Prepend an additional button in front of the glossary to show all records again.

settings.pageBrowser.itemsPerPage
---------------------------------

Default: 15

Example: `plugin.tx_schooldirectory.settings.pageBrowser.itemsPerPage = 20`

Reduce result of records to this value for a page
