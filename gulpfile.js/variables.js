var args = require('yargs').argv;

/**
 * ---------------------------------------------------------------------------------------------
 * Global settings
 * ---------------------------------------------------------------------------------------------
 */

const DEFAULT_DEMO = 'saas';
const AVAILABLE_DEMOS = ['saas', 'modern', 'creative'];

var FOLDER_PATHS = {
    baseSrc: "resources/", // source files
    baseDist: "public/", // build files
    baseAssets: "resources/", // base assets
};

const selectedDemo = (args['demo'] ? (AVAILABLE_DEMOS.indexOf(args['demo']) >= 0 ? args['demo'] : null) : null) ? args['demo'] : DEFAULT_DEMO;

function getSrcFolderPath() {
    return FOLDER_PATHS.baseSrc + selectedDemo + "/";
}

function getDistFolderPath() {
    return FOLDER_PATHS.baseDist + "/";
}

function getDistAssetFolderPath() {
    return getDistFolderPath(selectedDemo);
}

module.exports = {
    getSelectedDemo: function () {
        return selectedDemo
    },
    getBaseSrcPath: function () {
        return FOLDER_PATHS.baseSrc
    },
    getBaseDistPath: function () {
        return FOLDER_PATHS.baseDist
    },
    getBaseAssetsPath: function () {
        return FOLDER_PATHS.baseAssets
    },
    getSrcPath: getSrcFolderPath,
    getDistPath: getDistFolderPath,
    getDistAssetsPath: getDistAssetFolderPath
}
