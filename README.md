# [Database Populator for Codeception DB Module](https://github.com/vjik/codeception-db-populator) Demo Project

[![Build status](https://github.com/vjik/codeception-db-populator/workflows/build/badge.svg)](https://github.com/vjik/codeception-db-populator/actions?query=workflow%3Abuild)
[![Powered by Yii3](https://img.shields.io/badge/Powered_by-Yii3-green.svg?style=flat)](https://www.yiiframework.com/yii3-progress)
[![License](https://poser.pugx.org/vjik/codeception-db-populator/license)](/LICENSE)

## Requirements

- PHP 8.0 or higher.
- MySQL databasee.

MySQL configuration:

- host: `127.0.0.1`
- name: `dbpopulator`
- user: `root`
- password: `root`

> Note: you can change MySQL configuration in `./.env` file that contain environment variables.

## Console commands

Author:

- `./yii author/create <name>` 
- `./yii author/delete <id>`

Category:

- `./yii category/create <name>` 
- `./yii category/delete <id>`

Post:

- `./yii post/create <name> [-a|--author <authorId>] [-c|--category <categoryId>]` 
- `./yii post/delete <id>` 

## Creating dumps for tests

Windows:

```shell
./tests/make-dumps.bat
```

## Testing

Require MySQL database with configuration:

- host: `127.0.0.1`
- name: `dbpopulator_test`
- user: `root`
- password: `root`

Require environment variable `APP_ENV` with value `test`.

To run tests:

```shell
./vendor/bin/codecept run
```

> Note: in Windows you can run script `./tests/run.bat` that sets environment variable `APP_ENV` and run codeception.

## License

The Codeception Database Populator Demo Project is free software. It is released under the terms of the BSD License. Please see [`LICENSE`](./LICENSE.md) for more information.
