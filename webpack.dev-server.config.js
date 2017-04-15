var webpack = require("webpack");
var path = require("path");

module.exports = require("./webpack.base.js")({
    devtool: "eval",
    loaders: [
        {
            test: /\.s?css$/,
            loaders: ["style", "raw", "sass?sourceMap"]
        },
    ],
    output: {
        path: path.join(__dirname, "public/bundle"),
        filename: "[name].bundle.js",
        publicPath: "http://webpack:8080/",
        sourceMapFilename: "[file].map",
    },
    devServer: {
        publicPath: "/",
        plugins: [],
        devtool: "eval",
        debug: true,
        host: "webpack",
        port: 8080,
        watchOptions: {
            poll: 1000,
        },
    },
});
