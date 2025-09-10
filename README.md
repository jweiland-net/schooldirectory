# TYPO3 Extension `schooldirectory`

[![Packagist][packagist-logo-stable]][extension-packagist-url]
[![Latest Stable Version][extension-build-shield]][extension-ter-url]
[![Total Downloads][extension-downloads-badge]][extension-packagist-url]
[![Monthly Downloads][extension-monthly-downloads]][extension-packagist-url]
[![TYPO3 13.4][TYPO3-shield]][TYPO3-13-url]

![Build Status](https://github.com/jweiland-net/schooldirectory/actions/workflows/ci.yml/badge.svg)

schooldirectory is a TYPO3 CMS extension that helps manage and display schools
for a city. It allows you to link schools to specific addresses and categorize
them by type.

## 1 Features

* Create and manage school records
* Assign schools to specific addresses (which school is responsible for which address?)
* Categorize schools by type (e.g., elementary, secondary)

## 2 Usage

### 2.1 Installation

#### Installation using Composer

The recommended way to install the extension is using Composer.

Run the following command within your Composer based TYPO3 project:

```
composer require jweiland/schooldirectory
```

#### Installation as extension from TYPO3 Extension Repository (TER)

Download and install `schooldirectory` with the extension manager module.

### 2.2 Minimal setup

1) Include the static TypoScript of the extension.
2) Create type, district and holder records on a sysfolder.
3) Create school record and assign type, district and holder records to it.
4) Create a plugin on a page and select at least the sysfolder as startingpoint.

## 3 Support

Free Support is available via [GitHub Issue Tracker](https://github.com/jweiland-net/schooldirectory/issues).

For commercial support, please contact us at [support@jweiland.net](support@jweiland.net).

<!-- MARKDOWN LINKS & IMAGES -->

[extension-build-shield]: https://poser.pugx.org/jweiland/schooldirectory/v/stable.svg?style=for-the-badge

[extension-downloads-badge]: https://poser.pugx.org/jweiland/schooldirectory/d/total.svg?style=for-the-badge

[extension-monthly-downloads]: https://poser.pugx.org/jweiland/schooldirectory/d/monthly?style=for-the-badge

[extension-ter-url]: https://extensions.typo3.org/extension/schooldirectory/

[extension-packagist-url]: https://packagist.org/packages/jweiland/schooldirectory/

[packagist-logo-stable]: https://img.shields.io/badge/--grey.svg?style=for-the-badge&logo=packagist&logoColor=white

[TYPO3-13-url]: https://get.typo3.org/version/13

[TYPO3-shield]: https://img.shields.io/badge/TYPO3-13.4-green.svg?style=for-the-badge&logo=typo3
