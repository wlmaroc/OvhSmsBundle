# WlmarocOVHBundle: OVH SDK integration in Symfony

This bundle integrates [OVH's offical PHP SDK](https://github.com/ovh/php-ovh) in [the Symfony framework](http://symfony.com).

## Installation

Use [Composer](http://getcomposer.org) to install the bundle:

`composer require wlmaroc/ovh-sms-bundle`

Then, update your `app/config/AppKernel.php` file:

```php
    public function registerBundles()
    {
        $bundles = array(
            // ...
            new Wlmaroc\OvhSmsBundle\WlmarocOvhSmsBundle(),
            // ...
        );

        return $bundles;
    }
```

Configure the bundle in `app/config/config.yml`:

```yaml
wlmaroc_ovh:
    endpoint_name:      "%ovh_endpoint_name%"
    application_key:    "%ovh_application_key%"
    application_secret: "%ovh_application_secret%"
    consumer_key:       "%ovh_consumer_key%"
```

Finally, update your `app/config/parameters.yml` file to store your OVH API credentials:

```yaml
parameters:
    # ...
    ovh_endpoint_name:      "ovh-eu"
    ovh_application_key:    "MyOvhApplicationKey"
    ovh_application_secret: "MyOvhApplicationSecret"
    ovh_consumer_key:       "MyOvhConsumerKey"
```

## Usage

The bundle automatically registers a `ovh` service in the Dependency Injection Container. That service is
an instance of `\Ovh\Api`.

Example usage in a controller:

```php
// ...

    public function smsAction()
    {
        // Send a SMS
        $this
            ->get('ovh')
            ->post(
                sprintf('/sms/%s/users/%s/jobs', 'my-service-name', 'my-login'),
                [
                    'message' => 'Si tu veux me parler, envoie-moi un... fax !',
                    'receivers' => '+33612345678',
                    'sender' => 'my-login',
                ]
            )
        ;

        // ...
    }

// ...
}
```

## Credits

Created by [Web Logiciel Maroc] (http://wlmaroc.com).
