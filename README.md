# Laravel AOP Example



This is an example of the usage of the package [Laravel-Aspect](https://github.com/ytake/Laravel-Aspect) with a custom Aspect example.

The constraint for this package (Laravel-Aspect) is that it only affects classes that are instantiated using the Laravel Application Container.



## The example

The example here is for a Order example affected by an aspet responsible for the output of the total value by a tax procedure.

The Custom Aspect example is at the directory: `app/CustomAspect/`. This pieces o the aspect are related to the aspect module `app/Modules/AcmeModule.php`. The classes that this aspect module works on must be listed at its attribute `classes` and the correspondent annotation `app/CustomAspect/Annotations/Acme.php` must be placed at the affected class's method.



## Docker Container

This command will start the dockerized environment:

```shell
docker-compose up -d
```



## Tests

Raw machine:

```shell
./vendor/bin/phpunit tests --filter OrderTest
```

Dockerized:

```shell
docker-compose exec php bash -c "vendor/bin/phpunit tests --filter OrderTest"
```



