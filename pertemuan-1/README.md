# Pertemuan 1
## Phalcon
> Phalcon adalah framework PHP tercepat

    
- Memiliki Template Enginenya yaitu Volt

## Instalasi Phalcon

### Step

1. Install LAMP-stack (Apache2, Mysql, Php 7)

2. Installasi Phalcon Ubuntu 16.04
    ```bash
    sudo apt-add-repository ppa:phalcon/stable
    
    sudo apt-get update
    
    sudo apt-get install php7.0-phalcon
    
    sudo apt-get install -y gcc make re2c libpcre3-dev php7.0-dev build-essential php7.0-zip
    ```

3. Aktifkan Extensi Phalcon
    ```bash
    sudo apt-get install gcc make autoconf libc-dev pkg-config
    
    git clone --depth=1 git://github.com/phalcon/cphalcon.git
    
    cd cphalcon/build
    
    sudo PATH=/opt/sp/php7.0/bin:$PATH ./install

    ```

4. Tambahkan Extensi Phalcon Ke Apache

    ```bash
    sudo bash -c "echo extension=phalcon.so > /etc/php7.0/conf.d/phalcon.ini"
    
    sudo service php7.0-fpm restart
    atau
    service apache2 restart

    ```

5. Cek Di PHP info
