# TWIG SERVICE

This service is used to manage twig template language.

Inside `TwigService.php` you can change the Twig configuration.

You can use it by dependency injection inside controller.

```php
class MyController
{
    private ITwigService $twig;

    public function __construct(ITwigService $twig)
    {
        $this->twig = $twig;
    }
}
```

## Functions and Filters

You can create custom functions and filters for Twig, you just need to write one more class inside the `Functions` or `Filters` directory and add in `AppExtension.php` constants.

Twig manual - Functions: https://twig.symfony.com/doc/3.x/advanced.html#functions  
Twig manual - Filters: https://twig.symfony.com/doc/3.x/advanced.html#filters
