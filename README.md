# Pimcore Project - Shahid Beheshti University 

This skeleton should be used by experienced Pimcore developers for starting a new project from the ground up. 
If you are new to Pimcore, it's better to start with our demo package, listed below 😉

## Reports

read these reports to understand concepts (persian language):
<br>
[Report 1](https://github.com/modos/sbu-pimcore/blob/main/%DA%AF%D8%B2%D8%A7%D8%B1%D8%B4%20%D9%BE%DB%8C%D8%B4%D8%B1%D9%81%D8%AA%20%D9%BE%D8%B1%D9%88%DA%98%D9%87%20%DA%A9%D8%A7%D8%B1%D8%B4%D9%86%D8%A7%D8%B3%DB%8C.pdf)
<br>
[Report 2](https://github.com/modos/sbu-pimcore/blob/main/%DA%AF%D8%B2%D8%A7%D8%B1%D8%B4%20%D9%BE%D8%A7%DB%8C%D8%A7%D9%86%DB%8C.pdf)
<br>
[Youtube Videos](https://www.youtube.com/playlist?list=PLOSpOyvXnOFfneCOHPcKihHInAJ_csSP_)

## Getting started
```bash
COMPOSER_MEMORY_LIMIT=-1 composer create-project pimcore/skeleton my-project
cd ./my-project
./vendor/bin/pimcore-install
```

- Point your virtual host to `my-project/public` 
- Open https://your-host/admin in your browser
- Done! 😎

## Docker

You can also use Docker to setup a new Pimcore Installation.
You don't need to have a PHP environment with composer installed.

### Prerequisits

* Your user must be allowed to run docker commands (directly or via sudo).
* You must have docker-compose installed.
* Your user must be allowed to change file permissions (directly or via sudo).

### Follow these steps
1. Initialize the skeleton project using the `pimcore/pimcore` image
``docker run -u `id -u`:`id -g` --rm -v `pwd`:/var/www/html pimcore/pimcore:PHP8.1-fpm composer create-project pimcore/skeleton my-project``

2. Go to your new project
`cd my-project/`

3. Part of the new project is a docker compose file
    * Run `` echo `id -u`:`id -g` `` to retrieve your local user and group id
    * Open the `docker-compose.yml` file in an editor, uncomment all the `user: '1000:1000'` lines and update the ids if necessary
    * Start the needed services with `docker-compose up -d`

4. Install pimcore and initialize the DB
    `docker-compose exec php-fpm vendor/bin/pimcore-install --mysql-host-socket=db --mysql-username=pimcore --mysql-password=pimcore --mysql-database=pimcore`
    * When asked for admin user and password: Choose freely
    * This can take a while, up to 20 minutes
    
5. :heavy_check_mark: DONE - You can now visit your pimcore instance:
    * The frontend: <http://localhost>
    * The admin interface, using the credentials you have chosen above:
      <http://localhost/admin>

## Other demo/skeleton packages
- [Pimcore Basic Demo](https://github.com/pimcore/demo)
