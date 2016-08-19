# export-builder

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

This is where your description should go. Try and limit it to a paragraph or two, and maybe throw in a mention of what
PSRs you support to avoid any confusion with users and contributors.

## Install

Via Composer

``` bash
$ composer require inteleon/export-builder
```

## Usage

``` php

new ReportBuilder())
->title('Random data')
->text('Period: Big bang - Framtiden')

->addColumn('första', 47.5, null)
->addColumn('andra',  47.5, null)
->addColumn('tredje', 47.5, '5678')
->addColumn('fjärde', 47.5, '1234')

->numAmountColumns(2)
->content($content)
->addAccountingOrder(true)

->filename('report_test')
->exporter('pdf')
->render();
    
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email :author_email instead of using the issue tracker.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/inteleon/export-builder.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/inteleon/export-builder/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/inteleon/export-builder.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/inteleon/export-builder.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/inteleon/export-builder.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/inteleon/export-builder
[link-travis]: https://travis-ci.org/inteleon/export-builder
[link-scrutinizer]: https://scrutinizer-ci.com/g/inteleon/export-builder/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/inteleon/export-builder
[link-downloads]: https://packagist.org/packages/inteleon/export-builder
[link-author]: https://github.com/:author_username
[link-contributors]: ../../contributors
