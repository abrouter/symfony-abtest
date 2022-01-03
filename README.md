# ABRouter Symfony A/B Tests | Split Tests

ABRouter AB Test :construction_worker_woman: is a simple package for base library to run A/B tests via [ABRouter](https://abrouter.com) with Symfony.
You can find base PHP library in https://github.com/abrouter/abrouter-php-client

# What is the ABRouter service ?

[ABRouter](https://abrouter.com) is the service to manage experiments(A/B split tests). The service provides easy to manage dashboard to keep experiments under control.
There you can create experiments, branches and set a percentage for every branch. Then, when you're running an ab-test on PHP you will receive a perfect branch-wise response that following the rules, that you set up.

Can be also used as a feature flag or feature toggle.
Available for free.

## Prepare your first A/B test
Besides of the installing this package you need to have an account on [ABRouter](https://abrouter.com). Your token and experiment id will be also there.
Feel free to read step by step instruction [Impelementing A/B tests on Laravel](https://abrouter.com/en/laravel-ab-tests)

## :package: Install
Via composer

``` bash
$ composer require abrouter/symfony-abtest
```

## Register the bundle
Register bundle

```
// config/bundles.php
return [
    // [...]
    Abrouter\SymfonyClient\AbrouterClientBundle::class => ['all' => true],
];
```

### Configure ABRouter client:

Put your ABRouter token in /config/packages/abrouter_client.yaml. You can find this token in [ABRouter dashboard](https://abrouter.com/en/board).

```yaml
abrouter_client:
  token:                'YOUR_TOKEN'
  host:                 'https://abrouter.com'
```


## :rocket: Usage

```php
use Abrouter\Client\Client;

class ExampleController
{
    public function __invoke(Client $client)
    {
        $buttonColorExperimentId = 'D1D06000-0000-0000-00005030';
        return new Response(json_encode([
            'button_color' => $client
                ->experiments()
                ->run('USER_ID', $buttonColorExperimentId),
        ]));
    }
}
```

You can create an experiment and get your token and id of experiment on [ABRouter](https://abrouter.com) or just read the [docs](https://abrouter.com/en/docs).


## Example
You can get an dockerized usage example by the following link: (https://github.com/abrouter/symfony-abtest-example)

## :wrench: Contributing

Please feel free to fork and sending Pull Requests. This project follows [Semantic Versioning 2](http://semver.org) and [PSR-2](http://www.php-fig.org/psr/psr-2/).

## :page_facing_up: License

GPL3. Please see [License File](LICENSE) for more information.