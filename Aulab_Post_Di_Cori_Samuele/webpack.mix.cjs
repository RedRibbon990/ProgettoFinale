const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .postCss('resources/css/app.css', 'public/css', [
       // Configurazioni PostCSS se necessarie
   ])
   .babelConfig({
      presets: ['@babel/preset-env']
   })
   .options({
       processCssUrls: false,
   });
