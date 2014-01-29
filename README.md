# PHP coding dojo project

## Setup

To install the project:

    php composer.phar create-project matthiasnoback/php-coding-dojo [path] *

You will have an empty ``src/`` directory and a ``phpunit.xml.dist`` that is configured to run all the PHPUnit tests
names ``*Test.php`` in the directories ``src/*/Tests`` (and their subdirectories). When you use this configuration the
Composer autoloader will be initialized automatically to make sure that every namespaced class inside ``src/`` can be
auto-loaded from within the test cases.

### Configure PHPStorm to run the tests

- Choose ``Run``, ``Edit configurations...`` and remove any existing configuration.
- Select ``Defaults - PHPUnit``, put a check before ``Use alternative configuration file`` and select
  ``phpunit.xml.dist`` from this project.
- Click the button to the right of this field. In the dialog that appears select ``Use custom loader`` and select the
  file ``vendor/autoload.php`` inside your project. This will make sure PHPStorm uses the bundled version of PHPUnit.

## Run the unit tests

To run the unit tests, use PHPStorm:

- All tests in a testcase: ``Ctrl + Shift + F10`` when the cursor is *not* inside a method.
- One test: ``Ctrl + Shift + F10`` when the cursor is inside a method.
- ``Shift + F10`` for subsequent runs.

When you first run the tests, PHPStorm might ask you to supply a PHP interpreter.

Or you can run the tests from the command-line:

    php vendor/bin/phpunit

## PHPUnit cheatsheet

You can use my [PHPUnit cheatsheet](https://github.com/matthiasnoback/workshop-unit-testing/blob/master/cheatsheet.md)
as a quick reference for PHPUnit usage.
