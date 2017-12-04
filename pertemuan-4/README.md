# Pertemuan 4
## Phalcon

### Tampilan Menggunakan Admin LTE

- pecahkan setiap bagian dari tag html nya ke berbagai file ekstensi .volt ( ex: Header.volt atau footer.volt)

- lalu satukan di satu file index menggunkan `{% include "Layouts/namafile"%}`

- Setelah itu rubah cara memanggil setiap linknya 
    - link css cara memanggilnya :
    `{{ stylesheet_link("lokasi srcnya tadi") }}`
    ex : 
    ```html
    ```

    - script JS nya :
    `{{ javascript_include("lokasi srcnya tadi")}}`


### Untuk membuat cache nya otomatis terhapus pada folder cache 
- buka file `config.php` , lalu tambahkan :
    ```php
    'settings' => [
            'development' => TRUE, 
        ]
    ```

    letakan di paling bawah 

    ```php
    'application' => [
            'appDir'         => APP_PATH . '/',
            'controllersDir' => APP_PATH . '/controllers/',
            'modelsDir'      => APP_PATH . '/models/',
            'migrationsDir'  => APP_PATH . '/migrations/',
            'viewsDir'       => APP_PATH . '/views/',
            'pluginsDir'     => APP_PATH . '/plugins/',
            'libraryDir'     => APP_PATH . '/library/',
            'cacheDir'       => BASE_PATH . '/cache/',

            // This allows the baseUri to be understand project paths that are not in the root directory
            // of the webpspace.  This will break if the public/index.php entry point is moved or
            // possibly if the web server rewrite rules are changed. This can also be set to a static path.
            'baseUri'        => preg_replace('/public([\/\\\\])index.php$/', '', $_SERVER["PHP_SELF"]),
        ],
        'settings' => [
            'development' => TRUE, 
        ]

    ```

- lalu masuk ke file `services.php` , di bawah `$volt = new VoltEngine($view, $this);` dan tambahkan : 
    ```php
    if($config->setting->development == false) {
        $volt->setOptions([
            'compiledPath' => $config->application->cacheDir,
            'compiledSeparator' => '_',
            'compiledAlways' => true
        ]);
    }
    ```
    