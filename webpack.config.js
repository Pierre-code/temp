var Encore = require('@symfony/webpack-encore');
Encore
// the project directory where all compiled assets will be stored
  .setOutputPath('public/build/')
  // the public path used by the web server to access the previous directory
  .setPublicPath('/build')
  // will create public/build/app.js and public/build/app.css
  .addEntry('app', './assets/js/app.js')
  // keeping all css in one single app.css file, compiled, minified, hard to read
  // but good Encore practice would be to add new entry for each new css file that we want
  // allow legacy applications to use $/jQuery as a global variable
  .autoProvidejQuery()
  // enable source maps during development
  .enableSourceMaps(!Encore.isProduction())
  // empty the outputPath dir before each build
  .cleanupOutputBeforeBuild()
  // show OS notifications when builds finish/fail
  .enableBuildNotifications()
  // allow sass/scss files to be processed
  .enableSassLoader()
  .enablePostCssLoader()
// Automatically get his config in postcss.config.js file at root
;
// export the final configuration
module.exports = Encore.getWebpackConfig();