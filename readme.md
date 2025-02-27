**NOTE**: This project is archived. I have began a re-implementation here: https://github.com/NickToony/gameserver-service2

Game Server Service
===================

<img src="https://github.com/NickToony/gameserver-service/blob/master/screenshots/screenshot-dashboard.png" width="40%"/>
<img src="https://github.com/NickToony/gameserver-service/blob/master/screenshots/screenshot-manage.png" width="42%"/>

About
-----
This is a simple project combining Laravel and Bootstrap to provide a game server list service. It provides a responsive front-end for managing games and servers, while providing a JSON service for clients to access.

**Note**: This project is my first venture into Laravel and Bootstrap. It is far from perfect.

Dependencies
----

**For usage**

 - Laravel v4.2 ([http://laravel.com/](http://laravel.com/))
 - Twitter Bootstrap v3.3.2 ([http://getbootstrap.com/](http://getbootstrap.com/))
 - **Others:** MySQL (alternative DB can be set), jQuery, PHP, Blade

**For installation purposes**

 - Composer
 - Bower

Installation
------------
These instructions are not complete. They should be updated soon.

 1. Clone the repository, set webserver root to /public, etc . Instructions vary depending on your server setup.
 2. Run the following commands to setup dependencies for Laravel and Bootstrap
 	- `composer update`
	- `bower update`
	- `php artisan migrate`
 3. This will install laravel, bootstrap and jQuery, and then create the database.

Planned Features
------------
- Have server's meta data displayed on front-end server list
- Better statistic tracking, including uptime and such
- Graphical view of statistics
- Better documentation! For both the project code, and API access.

