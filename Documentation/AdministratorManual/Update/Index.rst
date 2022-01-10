.. include:: ../../Includes.txt

Updating
========

If you update EXT:schooldirectory to a newer version, please read this section carefully!

Update to Version 5.0.0
-----------------------

We have removed TYPO3 9 compatibility.

As ViewHelper widgets are deprecated since TYPO3 10, we have completely reworked the Ajax Search Widget. Further we
are using the the Paginator API. So please update following Fluid Templates:

* Partials/School/List.html
* Partials/School/Search.html
* Templates/District/Search.html
* Templates/School/List.html
* Templates/School/Search.html

We have completely rewritten the JavaScript. If you have a modified version, please update to your needs.

Update to Version 4.0.3
-----------------------

We have changed some method arguments, please flush cache in InstallTool

Update to Version 4.0.0
-----------------------

We have remove TYPO3 8 compatibility.
We have added TYPO3 10 compatibility.
Please execute the schooldirectory UpgradeWizards in Installtool.
