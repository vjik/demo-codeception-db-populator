@ECHO OFF
SETLOCAL

rem Set environment variables
FOR /F "tokens=*" %%i IN ('type  %~dp0.env') DO SET %%i

rem Create dumps directory if not exist
IF NOT EXIST "%~dp0%DUMPS_DIR%" mkdir "%~dp0%DUMPS_DIR%"

rem Recreate test database
mysql -u%DB_USERNAME% -p%DB_PASSWORD% -e "DROP DATABASE IF EXISTS %DB_NAME%"
mysql -u%DB_USERNAME% -p%DB_PASSWORD% -e "CREATE DATABASE %DB_NAME%"

rem Run migrations
CALL %~dp0../yii migrate/up --no-interaction

rem Dump all tables
mysqldump -u%DB_USERNAME% -p%DB_PASSWORD% %DB_NAME% > %~dp0%DUMPS_DIR%/all.sql

rem Dump author table
mysqldump -u%DB_USERNAME% -p%DB_PASSWORD% %DB_NAME% author > %~dp0%DUMPS_DIR%/author.sql

rem Dump category table
mysqldump -u%DB_USERNAME% -p%DB_PASSWORD% %DB_NAME% category > %~dp0%DUMPS_DIR%/category.sql

rem Dump post table
mysqldump -u%DB_USERNAME% -p%DB_PASSWORD% %DB_NAME% post > %~dp0%DUMPS_DIR%/post.sql

ENDLOCAL
