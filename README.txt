# Description

St. list based on the given task.

## Installation

1. Download and install [xampp](https://sourceforge.net/projects/xampp/).

2. Download [St. list](https://github.com/Aporrhia/st_list) project.

3. Extract project into ...\xampp\htdocs folder.

4. Start XAMPP Control Panel.

5. Run Apache and MySQL modules in XAMPP Control Panel.

6. In browser go to [http://localhost/phpmyadmin
](http://localhost/phpmyadmin).

7. Create two (2) databases ```web1db``` and ```web2db```.

8. Import **web1db.sql** file into ```web1db``` database.

9. Import **web2db.sql** file into ```web2db``` database.

10. In browser go to the [http://localhost/web1/public.html](http://localhost/web1/public.html).
## Usage

On the main page (```public.html```) it is possible to filter data and search persons by their first name or last name.

On the admin page (```admin.html```) it is possible to add new entries to the database. As well as transfer data from ```web1db``` to web2db```.

And by going back to the main page data will be automatically updated.

## License

[MIT](https://choosealicense.com/licenses/mit/)
