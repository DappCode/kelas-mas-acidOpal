# Pertemuan 2
# Phalcon

## Installasi Phalcon DEVTOOLS   

> Install phalcon-devtools Menggunakan Git Source

- download atau clone terlebih dahulu repository devtools nya 
    > `git clone https://github.com/phalcon/phalcon-devtools.git`

- Link file `phalcon.php` yang berada di repository tadi ke `/usr/bin/phalcon(repository baru)`
    > `ln -s /opt/phalcon-devtools/phalcon.php /usr/local/bin/phalcon`

- lalu rubah `permission` repositorynya 
    >`chmod +x /usr/local/bin/phalcon`

- coba ketikan `phalcon` di `terminal` maka akan keluar 
    ```bash
    Phalcon DevTools (1.3.4)
 
    Available commands:
    commands (alias of: list, enumerate)
    controller (alias of: create-controller)
    model (alias of: create-model)
    all-models (alias of: create-all-models)
    project (alias of: create-project)
    scaffold
    migration
    webtools

    ```
- maka anda sudah berhasil menginstall `phalcon-devtools`

####  jika tidak keluar seperti yang di atas, langkah selanjutnya adalah :
- masuk ke fila `.bashrc` atau jika anda pengguna zsh maka masuk ke `.zshrc`, untuk perbedaan dan pengertian nya anda bisa browsing di internet

- setelah masuk ke file `.bashrc` atau `.zshrc` di akhir anda tambahkan perintah berikut :
    > `alias phalcon="lokasi anda menympan file phalcon.php tadi" ( saya menyarankan anda meletakkannya di folder opt ) `

- setelah itu keluar dari teminal dan bukan kembali
- lalu ketikan perintah `phalcon` kembali

### jika tidak bisa lagi, maka cara terakhir ketiakn perintah di bawah ini :

```bash
sudo ln -s /etc/php/7.0/mods-available/phalcon.ini /etc/php/7.0/cli/conf.d/20-phalcon.ini 
```

