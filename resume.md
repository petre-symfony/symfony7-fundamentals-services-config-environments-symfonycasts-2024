2.2 bin/console config:dump twig - Here, you can see the date format configuration for your application.
2.3 composer require knplabs/knp-time-bundle
 bin/console debug:container time
 bin/console debug:autowiring time
 bin/console debug:twig - twig filters and functions including the ones added by bundles
3.1 bin/console debug:autowiring http - check to see if our application already has an HTTP client to help us execute some API
 composer require symfony/http-client
4.1 bin/console debug:autowiring cache
4.2 
 bin/console cache:pool:list - This is the list of available pools in our application
 bin/console cache:pool:clear cache.app -  To clear the cache.app pool
5.1 bin/console config:dump framework cache - see the configuration that's responsible for the cache service only
6.1 bin/console debug:autowiring - shows us a list of the services we can autowire in our code
 bin/console debug:container - gives us a huge list of services, and any Service ID that happens to be a class or interface name is autowirable
6.2 named autowiring - - where our service container looks at the variable name and its typehint to inject the correct service
 bin/console cache:pool:clear iss_location_pool - clears the cache for this exact pool without affecting the other pools
8.2 bin/console cache:clear --env=prod - This can be helpful when you need to run a command in a specific environment that's different from the one you're currently working in
10.1 bin/console debug:container --parameters - services aren't the only things in our container. It also holds parameters
11.1 
 parameters:
  iss_location_cache_ttl: 5 - congig/services.yaml
 $this->getParameter('iss_location_cache') - fetch parameters from the container
11.3 #[Autowire(param: 'iss_location_cache_ttl')]
11.4 default_lifetime: '%iss_location_cache_ttl%' - cache.yaml config file
11.5 bind:
      $issLocationCacheTtl: '%iss_location_cache_ttl%' - in config/services.yaml
12.1 autowire a non-autowireable service
13.1 %env(ISS_LOCATION_CACHE_TTL)% syntax - needed for create different values of the same parameter in dev or prod environment for example
13.2 iss_location_cache_ttl: '%env(int:ISS_LOCATION_CACHE_TTL)%' typecast environment variable. They are string by default
14.1 iss location on every page but without being passing it from every controller
 bin/console make:twig-extension - create a twig extension for that
14.4 twig extension work because of autoconfigure: true in config/services.yaml
14.5 rendering the data in every page
