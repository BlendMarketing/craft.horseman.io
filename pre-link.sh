SHARED=/var/www/craft.horseman.io/shared

ln -s $SHARED/vendor ./ &&
ln -s $SHARED/storage ./craft/storage &&

composer install --no-dev --no-interaction --no-progress &&

sudo npm prune --production --progress=false &&
sudo npm install --production --progress=false
