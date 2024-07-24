# List all the comands
php artisan | grep dusk

# Fixing errores in sail:
https://laravel.com/docs/11.x/sail#laravel-dusk

In app container add selenium as depends_on

selenium:
        image: 'selenium/standalone-chrome'
        extra_hosts:
        - 'host.docker.internal:host-gateway'
        volumes:
            - '/dev/shm:/dev/shm'
        networks:
            - sail


#  Execute the tests in SAIL
sail dusk
