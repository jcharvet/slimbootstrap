# SlimBootstrap

Bootstrap for a basic PHP application using Slim, Pimple, Twig, and Eloquent

 - Copy `config/config.php.example` to `config/config.php` and supply values
 - Routing defined in `routes` directory - files inherit `$app` (Slim instance) and `$c`
   (Pimple container) when included into `public/index.php`
 - Resources/services in Pimple DI container defined in `include/services.php`
 - `composer.json` instructs Composer to build classmap from `include/`, `lib/` and `models/`


https://www.codeship.io/projects/7a767060-6d61-0131-3ba8-5a1c2409103b/status
