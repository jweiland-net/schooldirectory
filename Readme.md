# TYPO3 Extension `schooldirectory`

![Build Status](https://github.com/jweiland-net/schooldirectory/workflows/CI/badge.svg)

schooldirectory is an extension for TYPO3 CMS. It is useful to manage and display
schools for a city.

## 1 Features

* Create school records
* Assign schools to addresses. Which school is responsible for which address?
* Differ school records by their type

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
