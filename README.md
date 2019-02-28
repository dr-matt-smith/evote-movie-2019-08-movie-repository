# evote-movie-2019-08-movie-repository

Part of the progressive Movie Voting website project at:
https://github.com/dr-matt-smith/evote-movie-2019

The project has been refactored as follows:

- new file `composer.json` creatred, to declare that PHP classes in the namespace `Mattsmithdev` are located in directory `/src`:

    ```json
      {
        "autoload": {
          "psr-4": {
            "Mattsmithdev\\":"src"
          }
        }
      }
    ```

- the Composer tool was used to generate a `/vendor` directory containing autoloader `/vendor/autoload.php`, by running the following at the comand line:

    ```bash
        composer dump-autoload
    ```

- Front Controller `/public/index.php` is refactored to read and execute the autoloaded as its first action:

    ```php
      <?php
      require_once __DIR__ . '/../vendor/autoload.php';
      require_once __DIR__ . '/../src/controllerFunctions.php';
    
      ... as before
    ```

- in directory `/src` a new PHP class named `MovieRepository.php` was created, creating an array `$movies` which is returned through method `findAll()`:

    ```php
        namespace Mattsmithdev;

        class MovieRepository
        {
            private $movies = [];

            public function __construct()
            {
                $this->movies[] = [
                    'id' => 1,
                    'title' => 'Jaws',
                    'price' => 10.00
                ];

                $this->movies[] = [
                    'id' => 2,
                    'title' => 'Aliene',
                    'price' => 19.99
                ];

                $this->movies[] = [
                    'id' => 3,
                    'title' => 'Shrek',
                    'price' => 10.00
                ];
            }

            public function findAll()
            {
                return $this->movies;
            }
        }
    ```

- in the `/src/controllerFunctions.php` function `listAction()` uses an instance of `MovieRepository` to get the array of movies to then pass to view output script `/templates/list.php`:

    ```php
        function listAction()
        {
            $movieRepository = new \Mattsmithdev\MovieRepository();
            $movies = $movieRepository->findAll();

            $pageTitle = 'list';
            $listPageStyle = 'current_page';
            require_once __DIR__ . '/../templates/list.php';
        }
    ```
