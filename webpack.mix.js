const mix = require('laravel-mix');

// 既存の設定
mix.js('resources/js/app.js', 'public/js')
  .sass('resources/sass/app.scss', 'public/css');

// ソースマップを生成する
mix.sourceMaps();
