..  include:: /Includes.rst.txt


..  _upgrade:

=======
Upgrade
=======

If you update EXT:schooldirectory to a newer version, please read this section carefully!

Update to Version 8.0.0
=======================

This release brings full TYPO3 v13 compatibility and modernizes the extension
structure. Deprecated APIs are removed, and a migration wizard eases the update
from older plugin types.

Features
--------
- **TYPO3 v13 LTS support**
- Introduced `SiteSets` configuration for improved deployment consistency
- Moved all extension icons to `Resources/Public/Icons/`

Changes
-------

- Replaced all deprecated TYPO3 core API calls with updated alternatives
- Converted `list_type` plugin registration to a custom `CType`
- Restructured internal logic to align with TYPO3 13 best practices

Migrations
----------

- Added a backend **Upgrade Wizard** to automatically migrate `list_type`
plugins to the new `CType` configuration

Deprecation/Removal
-------------------

- Removed all usage of deprecated API calls no longer available in TYPO3 13

Upgrade Notes
-------------

- Ensure the Upgrade Wizard is executed after installation
- Review and test any custom Fluid templates or TypoScript overrides using
the old `list_type`

Update to Version 7.0.0
=======================

- Initial compatibility update for TYPO3 v12 LTS.
- Full support for TYPO3 v12 core
- Cleaned up legacy code to align with TYPO3 12 API

Update to Version 6.0.0
=======================

We have added TYPO3 11 compatibility.

We have moved Schooldirectory.js from TypoScript to f:asset VH.
Please update your own partials to load that file with f:asset.

Update to Version 5.0.0
=======================

We have removed TYPO3 9 compatibility.

As ViewHelper widgets are deprecated since TYPO3 10, we have completely reworked the Ajax Search Widget. Further we
are using the the Paginator API. So please update following Fluid Templates:

*   Partials/School/List.html
*   Partials/School/Search.html
*   Templates/District/Search.html
*   Templates/School/List.html
*   Templates/School/Search.html

We have completely rewritten the JavaScript. If you have a modified version, please update to your needs.

Update to Version 4.0.3
=======================

We have changed some method arguments, please flush cache in InstallTool

Update to Version 4.0.0
=======================

We have remove TYPO3 8 compatibility.
We have added TYPO3 10 compatibility.
Please execute the schooldirectory UpgradeWizards in Installtool.
