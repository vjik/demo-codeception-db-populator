@ECHO OFF
SETLOCAL

SET APP_ENV=test

%~dp0../vendor/bin/codecept run %*

ENDLOCAL
