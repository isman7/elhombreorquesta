# elHombreOrquesta - A personal Wordpress Theme

A personal Wordpress Theme, build from scratch, in order to learn a little bit of web development :smiley: 

## Development

As the theme is in continous development, I will drop some notes here about how to develop it!

### Download dependencies

Clone the repo:

```bash
git clone git@github.com:isman7/elhombreorquesta.git
```

The theme is using PHP `composer` package manager to handle all the dependencies, use:

```bash
$ cd elhombreorquesta/
$ composer install
```

To create a `/elhombreorquesta/vendor` folder to host the vendor CSS, JS and PHP. 

###  Setup environment

The theme uses a `docker-compose.yml` file to setup a development environment using Docker Compose utility, as follows:

```bash
$ cd ..
$ docker-compose up -d 
```

This will bring a consistent Wordpress install in a Docker image, is consistent 
as it is using a docker volume to handle the database.
The blog will came up at `http://localhost:8000`, you will have to configure a default
and set the theme manually (automatic WIP). 

To shutdown the wordpress, you must run at the root of the repo:

```bash
$ docker-compose down
```