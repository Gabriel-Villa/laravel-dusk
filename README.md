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


# Execute the tests in SAIL
sail dusk

# Execute specific test
sail dusk --filter=testRegisterPage

# Execute specific class
sail dusk tests/Browser/RegisterTest.php

# Create new test
php artisan dusk:make Register

# Create new page
php artisan dusk:page LoginPage

# When you run a test and it fail, the browser take a screenshot and save it in the screenshots directory 

# Pages folder inside Browser

# Metodos interesantes:
->screenshot('before-filling-form') -> Crea un screenshot automaticamente

->storeConsoleLog('console-log') -> Obtener logs de la en php consola del navegador

->dump() -> Regresa el html

->pause(1000) -> Espera 1 segundo y sigue con la ejecución, util para transiciones, animaciones, AJAX, etc

->whenAvailable -> Esperar 5 segunds por default a que un elemento este disponible

->click() -> Da click en un boton, puede ser clase o id , entre otros
->click('.login-page .container div > button');
->clickLink('Create Playlist') -> Click a link 

->clear('email');

->check('terms');
->uncheck('terms');

$browser->script('document.documentElement.scrollTop = 0');
$browser->script([
    'document.body.scrollTop = 0',
    'document.documentElement.scrollTop = 0',
]);
 
->pressAndWaitFor('Save', 1);

# Extra documentation
https://blog.logrocket.com/laravel-dusk-browser-testing-and-automation/
