# BackEnd 

### Features

- Registration
- Login
- Logout
- Booklist
- Users can add ,show ,delete book from their library. 


### Build With
- PHP using Laravel.

### Getting started
Make sure to have docker installed on the computer.
1. Clone the repo
``` bash
https://github.com/AlessioChen/book-library.git
```
2. Lauch these commands to inizialize docker.
```
 cd Laravel-blog/backend
 docker run --rm -v $(pwd):/app composer install
```
3. Create e `.env` file using a different port than where the API runs, you can find an example in `.env.example`
4. Start the server 
```
 vendor/bin/sail sail up 
```

### Usage 
- in the api.php you can find the definition of all routes, and with command: ``` sail artisan route:list  ``` you can see all of them. 


### Acknowledgements

- [Laravel](https://laravel.com/)
- [Laravel Sanctum](https://laravel.com/docs/9.x/sanctum)
- [Docker](https://www.docker.com/)

