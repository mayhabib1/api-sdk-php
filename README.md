QordobaLib
=================
Qordoba’s Java SDK offers platform-specific features that make the Qordoba implementation much simpler. The SDKs are open-source, and can be forked at the links below. Once forked, you can integrate our API into your application.

How To Configure:
=================
The code might need to be configured with your API credentials. To do that,
provide the credentials and configuration values as a constructor parameters for the controllers

How To Build: 
=============
The code uses a PHP library namely UniRest. The reference to this
library is already added as a composer dependency in the  composer.json
file. Therefore, you will need internet access to resolve this dependency.

How To Use:
===========
For using this SDK do the following:

    1. Open a new PHP >= 5.3 project and copy the  PHP files in the project
       directory.
    2. Use composer to install the dependencies. Usually this can be done through a 
       context menu command "Instal (dev)".
    3. Import classes from your file in your code where needed for example,
           use QordobaLib\Controllers\QordobaController;
   
        
    4. You can now instantiate controllers and call the respective methods.
