# coregenix-config

Coregenix config provides the configuration parameters for a coregenix environment.

In addition to a general configuration file, individual configurations can be changed by creating an environment file.

This library requires a constant **BASE_DIR**. Here you must specify the directory where the vendor directory exists.

`define('BASE_DIR', __DIR__);`

Create a .env file in a directory. Enter here your variables that you want to call. Here is an example:

`BASE_DIR="/var/webroot/project-root"`
`CACHE_DIR="${BASE_DIR}/cache"`
`TMP_DIR="${BASE_DIR}/tmp"`

Now load the library:

`require_once BASE_DIR.'/vendor/autoload.php';`

You can now retrieve these files by typing:

`echo cgrosswardt\coregenix\config::get('CACHE_DIR');`

If you have created another file (e.g. .database), you can also load the value from it:

`echo cgrosswardt\coregenix\config::get('NAME', '.database');`