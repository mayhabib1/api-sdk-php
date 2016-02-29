---
title: PHP SDK for l10n
layout: api
---

# PHP SDK

Qordoba’s PHP SDK offers platform-specific features that make the Qordoba implementation much simpler. The SDKs are open-source, and can be forked at the links below. Once forked, you can integrate our API into your application.



### Get the SDK

Download the PHP API SDK from [GitHub](https://github.com/Qordobacode/api-sdk-php).

Feel free to clone the repo: `git clone git@github.com:Qordobacode/api-sdk-php.git`.


### Introduction

The SDKs allow you to integrate the API with your build process without worrying about low-level API details. You will need to provide credentials and configuration values as constructor parameters for the controllers.

The code uses the PHP library [UniRest](https://github.com/Mashape/unirest-php). The reference to this library is already added as a composer dependency in the `composer.json` file (you will need internet access to resolve this dependency).


###How to install:

* Open a new `PHP 5.3+` project and copy all of the files in the SDK into the project directory
* Use `composer` to install the dependencies. The can usually be done through the context menu command `Install (dev)`.

###How to use:


Import classes from your file in your code where needed.

**Example:**

           `use QordobaLib\Controllers\QordobaController;`



### Bug reports
Have a bug? Please create an issue [here](https://github.com/Qordobacode/api-sdk-php/issues) on GitHub! 




### License
The MIT License (MIT)

