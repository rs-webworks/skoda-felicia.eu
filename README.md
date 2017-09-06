Skoda-Felicia.eu website
=======

A project on Symfony for Felicia club comunity.

Instalation:
---

Installation for development is like on any Symfony project:


1. git clone this repository
2. run `composer install` and fill required settings for DB connection as prompted
3. run `bower install`
4. set chmod `0777` on `/var` directory recursively
5. run command `php bin/console assets:install` to install assets of bundles
6. register SCSS watcher with arguments:
    - command: `--no-cache --update $FileName$:$ProjectFileDir$/web/assets/css/$FileNameWithoutExtension$.css`
    - refresh paths: `$ProjectFileDir$/web/assets/css/$FileNameWithoutExtension$.css:$ProjectFileDir$/web/assets/css/$FileNameWithoutExtension$.css.map`
7. run migrations to create database: `php bin/console doctrine:migrations:migrate`
8. run doctrine fixtures to load test data: `php app/console doctrine:fixtures:load`

Deployment:
---

1. Fill the correct settings into the `config_prod.yml`
2. Generate sitemaps with `php app/console presta:sitemap:dump`
3. Run YUI Compressor to compress the CSS to minified versions