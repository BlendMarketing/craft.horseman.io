if [ ! -f ./package.json ]; then
    sudo npm init
fi

composer require vlucas/phpdotenv

wget http://craftcms.com/latest.tar.gz?accept_license=yes -O craft.tgz
tar -xvzf craft.tgz

rm -rf ./craft/templates
mv ./craft/config ./

cp ./tmp/.gitignore ./
cp ./tmp/index.php ./public/
cp ./tmp/general.php ./config/
cp ./tmp/db.php ./config/

rm ./**/htaccess \
    ./**/web.config \
    ./craft.tgz \
    ./readme.txt

rm -rf ./tmp .git

echo ""
echo "*************************************"
echo "*    CraftCMS install completed.    *"
echo "*************************************"
echo "Please configure the database connection in"
echo "\`.env\`. Then use your browser to navigate"
echo "to \`/admin\` to setup craft."
echo ""
echo "Once completed run \`./node_modules/.bin/webpack-dev-server --config webpack.dev-server.config.js --inline --hot\` to start the webpack dev server."
echo ""
