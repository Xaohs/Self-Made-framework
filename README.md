# Self-Made-framework

Attempting to make my own framework. Every request gets sent to /src/index.html.
Index.html will then redirect the request to whichever controller you're asking for (ie localhost/user/login = src/controllers/userController.php login method) and select the correct src/views

Required Dependencies: Redbean (https://github.com/gabordemooij/redbean.git), Symfony (https://github.com/symfony/polyfill-ctype.git), Twig (https://github.com/twigphp/Twig.git)
