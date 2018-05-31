# Custom Laravel PHP Framework

[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)

### Prerequisites

* [Composer](https://getcomposer.org/download/)
* [Node.js](https://nodejs.org/en/download/)
* [Vagrant](https://www.vagrantup.com/downloads.html)
* [VirtualBox](https://www.virtualbox.org/wiki/Downloads)

### Quick Start

* Clone the project `git clone git@github.com:remimetral/laravel.git`
* Run `composer install` to launch your environment
* Run `npm install` to set up the dependencies
* Next, run `vagrant up` and access your project at [http://homestead.test](http://homestead.test)

> Note: Remember, you will still need to add an `/etc/hosts` file entry for `homestead.test` or the domain of your choice. You can change the server alias or domain name in `Homestead.yaml` file, don't forget also to update your BrowserSync proxy in `webpack.mix.js` file.

### Virtual Machine

In order to access your virtual machine `vagrant ssh` and to run `php artisan` commands inside it, just move to code directory `cd code`.

### Database & MySQL

To create an SQL database into your environment and link it to your app

* Access the monitor `mysql -u [username] -p;` (will prompt for password)
* Create a new database `create database [database];`

> Note: Replace `[username]` and `[database]` by the data of your choice in `.env` file.

Next in order to run SQL commands on your database you have to select it `use [database];`.
You can also directly access your database from the virtual machine `mysql -u [username] -p [database]` (will prompt for password).

Other SQL commands can be retrieve here [https://gist.github.com/hofmannsven](https://gist.github.com/hofmannsven/9164408).

### Module Bundler

Webpack is used through Laravel Mix for defining basic build steps for your application.

Head over to your configuration layer `webpack.mix.js`

```js
let mix = require('laravel-mix');

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .browserSync('homestead.test');
```

Now, from the command line, you may run `npm run watch` to watch your files for changes, then recompile and reload your browser.

> Note: You won't find a `webpack.config.js` file in your project root. By default, Laravel defers to the config file from this repo. However, should you need to configure it, you may copy the file to your project root, and then update your `package.json` NPM scripts accordingly: `cp -r node_modules/laravel-mix/setup/webpack.config.js ./`.

### Admin Panel

Voyager is used as an admin for your Laravel app. Whatever you want your app to do on the front-end is completely up to you.
You are in control of your application and you can use Voyager to make your life easier by adding data, editing users, creating menus, and many other administrative tasks.

You can install voyager either with or without dummy data.
The dummy data will include 1 admin account (if no users already exists), 1 demo page, 4 demo posts, 2 categories and 7 settings.

To install Voyager without dummy simply run

```bash
php artisan voyager:install
```

If you prefer installing it with dummy run

```bash
php artisan voyager:install --with-dummy
```

If you did go ahead with the dummy data, a user should have been created for you with the following login credentials

* **email:** `admin@admin.com`   
* **password:** `password`

> Note: A dummy user is **only** created if there are no current users in your database.

If you did not go with the dummy user, you may wish to assign admin privileges to an existing user.

This can easily be done by running this command

```bash
php artisan voyager:admin your@email.com
```

If you did not install the dummy data and you wish to create a new admin user you can pass the `--create` flag, like so

```bash
php artisan voyager:admin your@email.com --create
```

And you will be prompted for the user's name and password.

You can now access your admin panel at [http://homestead.test/admin](http://homestead.test/admin).

> Troubleshooting: **Missing storage symlink**. If you see this error message you need to delete `public/storage` and run `php artisan storage:link` from inside the virtual machine.
