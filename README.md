<p align="center">
    <img src="https://media.tenor.com/toe_1Cwb1lwAAAAd/%D0%BA%D0%BE%D1%82%D0%B8%D0%BA-%D0%B5%D1%81%D1%82-%D0%BA%D0%BE%D1%82%D0%B8%D0%BA.gif" height="200px" alt="cat eat">
    <h1 align="center">Yii2 Project Template</h1>
</p>

 [Yii2](https://www.yiiframework.com/) project

Структура каталогов
-------------------

    config/             Файлы конфигурации
    database/
        migrations/     Миграции. Создают структуру базы данных
        seeders/        Сидеры. Создают базовое содержимое базы данных
    docker/             Nginx, Php конфигурации & Docekrfile
    mail/               Файлы представлений для e-mail
    public/             Входной скрипт. Папка доступная из сети.
        assets/         Опубликованные файлы ассетов
    resources/          Ресурсы приложения
        assets/                  css, js, ts файлы ассетов
            <controller|widget-name>/
                css/
                js/
                ts/
        layouts/                 Макеты предсталений
        views/                   MVC представления для контроллеров
            <controller-name>/     controller name, соответствующий классу контроллера
    runtime/                    Генерируемые файлы, логи
    src/                        Исходный код приложения
        Asset/                  Классы ассетов
        Command/                Console commands.
        Component/              Компоненты приложения 
        Controller/             MVC классы контроллеров
        Model/                  MVC модели
            <model-name>/       model name, соответствующий классу модели
                forms/
                search/
    tests/              Contains various tests for the basic application
    vendor/             Contains dependent 3rd-party packages
    widgets/                    Представления для виджетов
        <widget-name>/          widget name, соответствующий классу виджета


Требования
------------

PHP 7.4.


Инсталляция
------------
~~~
git clone https://gitflic.ru/project/vortexv/...

composer update

composer dump-autoload
~~~


Конфигурирование
-------------

### Database

Edit the file `config/db.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
```

**NOTES:**
- Yii won't create the database for you, this has to be done manually before you can access it.
- Check and edit the other files in the `config/` directory to customize your application as required.
- Refer to the README in the `tests` directory for information specific to basic application tests.


TESTING
-------

Tests are located in `tests` directory. They are developed with [Codeception PHP Testing Framework](https://codeception.com/).
By default, there are 3 test suites:

- `unit`
- `functional`
- `acceptance`

Tests can be executed by running

```
vendor/bin/codecept run
```

The command above will execute unit and functional tests. Unit tests are testing the system components, while functional
tests are for testing user interaction. Acceptance tests are disabled by default as they require additional setup since
they perform testing in real browser.

### Code coverage support

By default, code coverage is disabled in `codeception.yml` configuration file, you should uncomment needed rows to be able
to collect code coverage. You can run your tests and collect coverage with the following command:

```
#collect coverage for all tests
vendor/bin/codecept run --coverage --coverage-html --coverage-xml

#collect coverage only for unit tests
vendor/bin/codecept run unit --coverage --coverage-html --coverage-xml

#collect coverage for unit and functional tests
vendor/bin/codecept run functional,unit --coverage --coverage-html --coverage-xml
```

You can see code coverage output under the `tests/_output` directory.
