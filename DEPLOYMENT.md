##### Выполнение установки начинается с запуска нового сервера с дистрибутива ОС.


1. На экране настройки оставить без изменений, нажать "Continue".
2. В разделе **Network & Hostname** указать настройки в соответствии с инструкциями интернет-провайдера. **Host Name** оставить по умолчанию.
3. В разделее **Installation Destination** на выбранном для системы диске для пункта **Storage Configuration** выбрать пункт **Custom**.
4. В следующем разделе **MANUAL PARTITIONINING** в выпадающем списке выбрать вариант **Standart Partition**, затем нажать _Click here to create them automatically_.(После **Done** подтвердить предложенный вариант разметки нажав **Accept changes**)
5. В разделе **Software Selection** выбрать вариант **Minimal install**.
6. В разделе **ROOT PASSWORD** задать пароль для учетной записи суперадминистратора.
7. В разделе **TIME & DATE** установить актуальный часовой пояс, **Network Time** оставить без изменений.
8. Нажать **Begin installation**, по завершении установки нажать **Reboot**.
9. После перезагрузки зайти под пользователем root.
10. Отключить и убрать из автозагрузки firewalld следующими командами:
    - systemctl stop firewalld.service
    - systemctl disable firewalld.service
11. Установить php командой **dnf install -y php**
12. Установить nginx командой **dnf install -y nginx**
13. Включить и добавить в автозагрузку  php-fpm и nginx следующими командами
    - systemctl start php-fpm
    - systemctl enable php-fpm
    - systemctl start nginx
    - systemctl enable nginx
14. Создать папку /var/www/htdocs/ и выдать nginx права для неё командой **chown -R nginx:nginx /var/www/htdocs/**.
15. Заменить конфигурационный файл **/etc/nginx/nginx.conf** аналогичным файлом в корне репозитория.
16. В папку **/etc/nginx/conf.d/** добавить файл **task.local**
17. В папку /var/www/htdocs добавить файлы index.php, number.php, number.txt из папки htdocs в репозитории.
18. Открыть редактирование cron командой crontab -e. Добавить запись __* * * * * /usr/bin/php /var/www/htdocs/number.php__.
