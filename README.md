# MVCLite

MVCLite is a very lightweight MVC project made in few hours.
The main purpose being for small projects that doesn't require a whole framework to be set up.

## .htaccess

```
DirectoryIndex public/index.php

RewriteEngine On

RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f

RewriteRule ^(.+)$ public/index.php/$1 [L]
```

## Improvements

Feel free to improve it so it's more secure/handly for what you need to do. You can, for example, add an ORM like vlucas/spot2.
