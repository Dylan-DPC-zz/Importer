<a href="https://packagist.org/packages/dpc/importer"><img src="https://poser.pugx.org/dpc/importer/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/dpc/importer"><img src="https://poser.pugx.org/dpc/importer/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/dpc/importer"><img src="https://poser.pugx.org/dpc/importer/license.svg" alt="License"></a>

# Laravel Importer

## Requirements: 
* PHP 7 
* Laravel 5.x


## Why?

This package allows you to import data from another database locally.  

The entire seeding process is run in a transaction by default


## How? 

### Installation: 

Use composer to install the package: 

```
composer require dpc/importer
```

Install the service provider in your config file (config/app.php)

```
'providers' => [
    ....
    Dpc\Importer\Providers\ImporterServiceProvider::class,
];
```

Publish the vendor files by running: 

```
php artisan vendor:publish
```
This will create an `importer.php` config file in config directory
 
### Initialization: 

Make sure you have created a new database connection for your temporary database (from where you want to import the data) and it contains the required data. 

You need to set up the connection name along with the array of the seeders in the config file. The array will determine the order in which the seeders run. 

An example of the config file: 

```
return [
    'connection' => 'temp',

    'seeds' => [
        \App\Seeds\UserSeeder::class,
        \App\Seeds\PostSeeder::class,
    ]
];
```

### Creating The Seeders: 

Create your own Seeder class that extends `Dpc\Importer\AbstractSeed`. 

The Seeder class should implement these 2 methods: 

 `getData()`: This function is responsible for fetching the data from the database into the seeder. This function does not return the data but an instance of the seeder. The data is available in `$this->data`
 
 `seed()` : This function is called after data is loaded into the class property. Define your seeding process here. 
 
 `prepareData()` : This is an optional function that is called before the data is seeded. Can be used to
     

The connection is injected into the seeds so you can use `$this->manager->table(<tableName>)` to access the data in the temporary database.


The entire seeding operation is wrapped inside a transaction. 

### Running The Seeds:

To run the seeds:      
```
php artisan importer:import
```

### Lastly.... 

Do star this repo. It means a lot to the author (oh wait.. that's me :P )

# What's Next? 

* Data Chunking 
* Flexibility to queue the seeders 
* Option to run using a cron job 

# Wanna Contribute?

Not fussy about standards so just drop in a PR. 

If you find any issues or want to make future proposals, create an issue here. 

# Wanna contact me? 

  * Twitter: <a href="https://twitter.com/DPC_22"> @DPC_22 </a> 
  * Email: dylan.dpc@gmail.com
