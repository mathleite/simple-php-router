# HIGHLIGHT FOLDERS
highligth_alias="alias ls=\"ls --color=auto\""

# RUN ALL DATABASE MIGRATIONS
migration_alias="alias migrate=\"php /var/www/html/database/migrations/index.php\""

# WRITE ALIAS INSIDE ~/.bashrc FILE
echo $highligth_alias > ~/.bashrc
echo $migration_alias  >> ~/.bashrc

exec bash -l