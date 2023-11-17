## TPA - DDS - G21 - UTN FRBA
(Anexo de listado de Incidentes para TPA)
- Gabriel Rodriguez
- Lara Nuñez
- Nicolas Gonzalez
- Lucia Idañez

## Pasos Previos

1. Instalar XAMP (versión recomendada -> [XAMP 7.4.19](https://sourceforge.net/projects/xampp/files/XAMPP%20Windows/7.4.19/))
2. Instalar Composer (Gestor de Dependencias)
3. Ingresar a la carpeta de XAMP e ir a **htdocs**
4. Abrir la consola de preferencia y clonar el repositorio
5. Ejecutar el comando:
    ```
    composer install
    ```
5. Copiar y pegar el archivo **.env.example** con el nombre **.env** o ejecutar en la linea de comando (hace lo mismo):
    ```
    cp .env.example .env
    ```
7. En su navegador, escriba la ruta:
    ```
    http://localhost/tpa-dds-21/public/
    ```
   Y debería ver la pantalla de Laravel
8. Para ir moviendose por las rutas debe entrar al archivo **routes/web.php** y probar las rutas disponibles
## Para más información
Pasos de [primer proyecto laravel](https://laravel.com/docs/9.x/installation#your-first-laravel-project)
    
