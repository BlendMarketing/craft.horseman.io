SHARED=/var/www/craft.horseman.io/shared

ln -s $SHARED/vendor ./ &&

chmod +x post-composer-cmds.sh &&
composer install --no-dev --no-interaction --no-progress &&

sudo npm prune --production --progress=false &&
sudo npm install --production --progress=false
