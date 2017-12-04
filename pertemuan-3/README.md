# Pertemuan 3
## Phalcon

### CRUD PHALCON

- Downlaod Thema Admin LTE, lalu letakkan di di folder localhost anda `(/var/www/html)`

- lalu create project `Phalcon` anda 
    > `phalcon create-project "nama-project"`

- setelah itu ketikan perintah `sudo a2enmod rewrite`

- lalu setting di file `apache2.conf` anda
    - masuk ke file `apache2.conf` = 
    ```bash
    sudo nano /etc/apache2/apache2.conf
    ```
    - lalu cari 
    ```bash
    <Directory /var/www/>
        Options Indexes FollowSymLinks
        AllowOverride all
        Require all granted
    </Directory>
    ```
- dan ganti `AllowOverride none` menjadi `AllowOverride all`

- terakhir restart apache2 
    - cara I = `service apache2 restart`
    - cara II = `/etc/init.d/apache2 restart`

- Jika permissions error maka buka terlebih dahulu permissions dari projectnya
```bash
sudo chmod -R 777 "project-Name"
```
