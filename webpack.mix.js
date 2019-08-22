let mix = require('laravel-mix');

mix.setPublicPath('dist');

mix.js('src/js/app.js', 'dist/').sass('src/scss/app.scss', 'dist/');

mix.webpackConfig({ node: { fs: 'empty', net: 'empty', tls: 'empty' }})
