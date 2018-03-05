const Encore = require('@symfony/webpack-encore');
const path = require('path');

Encore
// the project directory where all compiled assets will be stored
    .setOutputPath('web/build/')

    // the public path used by the web server to access the previous directory
    .setPublicPath('/build')

    .enableReactPreset()

    // will create web/build/app.js and web/build/app.css
    .addEntry('app', ['babel-polyfill', 'whatwg-fetch', './assets/js/app.js'])
    .addEntry('styles', './assets/scss/styles.scss')

    // allow sass/scss files to be processed
    .enableSassLoader()

    .enableSourceMaps(!Encore.isProduction())

    // empty the outputPath dir before each build
    .cleanupOutputBeforeBuild()

    // show OS notifications when builds finish/fail
    .enableBuildNotifications()

// create hashed filenames (e.g. app.abc123.css)
// .enableVersioning()
;

// export the final configuration
module.exports = Encore.getWebpackConfig();

// Add absolute imports support.
module.exports.resolve.modules = [path.resolve('./assets/js'), 'node_modules'];
