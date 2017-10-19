# export-builder

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Total Downloads][ico-downloads]][link-downloads]


## Install

Via Composer

``` bash
$ composer require inteleon/export-builder
```

## Usage

``` php

(new ReportBuilder())
->title('Random data')
->text('Period: Big bang - Future')

->addColumn('first', 47.5, null)
->addColumn('second',  47.5, null)
->addColumn('third', 47.5, '5678', true)
->addColumn('fourth', 47.5, '1234', false)

->numAmountColumns(2)
->data($data)
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
