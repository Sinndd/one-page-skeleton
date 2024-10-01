const Encore = require('@symfony/webpack-encore'); // Import de Encore
const webpack = require('webpack'); // Import de Webpack

Encore
    .setOutputPath('public/build/')
    .setPublicPath('/build')
    
    .addEntry('app', './assets/app.js')

    .splitEntryChunks()
    .enableSingleRuntimeChunk()

    .cleanupOutputBeforeBuild()
    .enableBuildNotifications()
    .enableSourceMaps(!Encore.isProduction())
    .enableVersioning(Encore.isProduction())

    .configureBabel((config) => {
        config.plugins.push('@babel/plugin-syntax-dynamic-import');
    })

    .configureBabelPresetEnv((config) => {
        config.useBuiltIns = 'usage';
        config.corejs = '3.23';
    })

    .enablePostCssLoader((options) => {
        options.postcssOptions = {
            plugins: {
                tailwindcss: {},
                autoprefixer: {},
            },
        };
    })

    .addPlugin(new webpack.DefinePlugin({
        '__VUE_OPTIONS_API__': JSON.stringify(false),
        '__VUE_PROD_DEVTOOLS__': JSON.stringify(false),
    }))

    .enableVueLoader(() => {}, { version: 3 });

module.exports = Encore.getWebpackConfig();
