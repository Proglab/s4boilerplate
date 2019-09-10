@ECHO OFF
TITLE My System Info

ECHO ============================
ECHO CS fixer
ECHO ============================
call .\vendor\bin\php-cs-fixer.bat fix
PAUSE

ECHO ============================
ECHO PHP Code Sniffer
ECHO ============================
call .\vendor\bin\phpcs.bat
PAUSE

ECHO ============================
ECHO phpstan
ECHO ============================
ECHO ==========level 1===========
call .\vendor\bin\phpstan.bat analyse .\src\Controller .\src\Entity .\src\Repository .\src\Security --level 1
PAUSE

ECHO ==========level 2===========
call .\vendor\bin\phpstan.bat analyse .\src\Controller .\src\Entity .\src\Repository .\src\Security --level 2
PAUSE

ECHO ==========level 3===========
call .\vendor\bin\phpstan.bat analyse .\src\Controller .\src\Entity .\src\Repository .\src\Security --level 3
PAUSE

ECHO ==========level 4===========
call .\vendor\bin\phpstan.bat analyse .\src\Controller .\src\Entity .\src\Repository .\src\Security --level 4
PAUSE

ECHO ==========level 5===========
call .\vendor\bin\phpstan.bat analyse .\src\Controller .\src\Entity .\src\Repository .\src\Security --level 5
PAUSE

ECHO ==========level 6===========
call .\vendor\bin\phpstan.bat analyse .\src\Controller .\src\Entity .\src\Repository .\src\Security --level 6
PAUSE

ECHO ==========level 7===========
call .\vendor\bin\phpstan.bat analyse .\src\Controller .\src\Entity .\src\Repository .\src\Security --level 7
PAUSE

ECHO ============================
ECHO migration
ECHO ============================
php bin/console doctrine:migrations:migrate

ECHO ============================
ECHO Codecept
ECHO ============================
call .\vendor\bin\codecept.bat run --coverage --coverage-html
PAUSE

ECHO ============================
ECHO cache clear
ECHO ============================
php bin/console cache:clear
PAUSE

ECHO ============================
ECHO traductions
ECHO ============================
php bin/console translation:update --dump-messages --force fr
php bin/console translation:update --dump-messages --force nl
PAUSE

ECHO ============================
ECHO run server
ECHO ============================
php bin/console server:run --docroot=public