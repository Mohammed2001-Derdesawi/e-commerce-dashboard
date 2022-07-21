const dotenvExpand = require('dotenv-expand');
dotenvExpand(require('dotenv').config({ path: '../../.env'/*, debug: true*/}));

const mix = require('laravel-mix');
require('laravel-mix-merge-manifest');

mix.setPublicPath('../../public').mergeManifest();

<<<<<<<< HEAD:Modules/User/webpack.mix.js
mix.js(__dirname + '/Resources/assets/js/app.js', 'js/user.js')
    .sass( __dirname + '/Resources/assets/sass/app.scss', 'css/user.css');
========
mix.js(__dirname + '/Resources/assets/js/app.js', 'js/order.js')
    .sass( __dirname + '/Resources/assets/sass/app.scss', 'css/order.css');
>>>>>>>> refs/remotes/origin/main:Modules/Order/webpack.mix.js

if (mix.inProduction()) {
    mix.version();
}
