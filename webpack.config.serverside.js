const Encore = require('@symfony/webpack-encore');
const path = require('path');

Encore
    // directory where all compiled assets will be stored
    .setOutputPath('app/Resources/webpack/')
    // what's the public path to this directory (relative to your project's document root dir)
    .setPublicPath('/')
    // empty the outputPath dir before each build
    .cleanupOutputBeforeBuild()
    // will output as app/Resources/webpack/server-bundle.js
    .addEntry('server-bundle', ['babel-polyfill', './assets/js/app.js'])

// export the final configuration
module.exports = Encore.getWebpackConfig();

// Add absolute imports support.
module.exports.resolve.modules = [path.resolve('./assets/js'), 'node_modules'];
