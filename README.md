# Symfony PHP Quiz

## Tasks to complete
- Create a new branch off of `main`
- Create a simple blog site with the following pages:
  - Login / registration page, we will only authenticate by email, no passwords necessary (we are very trusting)
  - Create / update post
  - List all posts and optionally filter by a user (include the number of comments per post)
  - View post with the ability to comment
  - A report page showing the users with the most posts and the users with the most comments
- Site requirements
  - Only owners can modify posts
  - All users can comment on posts
  - Do not use FOS User Bundle or any bundled authentication system, keep this part as simple as possible
  - Assume the database is huge and contains LOTS of posts and comments
- Create several console commands for managing the site and gather statistics
  - Create a new user
  - Return total posts by user's email
  - Return total comments by user's email
  - List all posts, with option to limit the results
- Write unit tests
- Test and lint all code (see [Application Instructions](#application-instructions))

## Submission
Please push your working branch upstream, so it can be reviewed and evaluated.

# Application Instructions

## Setup
1. Install [Docker Engine](https://docs.docker.com/engine/install/)
2. Clone this repository 
4. ```docker compose up```
5. The application should now be available at http://localhost:8002

## Debugging
- Make sure **var** and **vendor** have read/write/execute permission (777) for everyone (composer can't install if vendor can't be written to)
- Send any questions to Jim Furnier (jim@dreamworldpartners.com)

## Running tests
You can run tests with the following command:
```shell
docker exec -it symfony-dwp-app bin/phpunit
```

## Linting
You can execute the [Psalm](https://psalm.dev/) linter with the following command (or docker below):
```shell
docker exec -it symfony-dwp-app bin/psalm
```

## Application commands
Connect to MySQL
```shell
mysql -P 33067 -u app -ppassword --protocol=TCP symfony_starter
```
Run a Symfony Console Command
```shell
docker exec -it symfony-dwp-app bin/console <myCommand>
```

## More reading materials
- https://symfony.com/
- https://symfony.com/doc/5.4/index.html
- https://symfony.com/doc/5.4/controller.html
- https://symfony.com/doc/5.4/doctrine.html
