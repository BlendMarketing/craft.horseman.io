const path = require("path");
const webpack = require("webpack");
const HtmlWebpackPlugin = require("html-webpack-plugin");
const ExtractTextPlugin = require("extract-text-webpack-plugin");

module.exports = require("./webpack.base.js")({
    loaders: [
        {
            test: /\.s?css$/,
            loader: ExtractTextPlugin.extract("style", ["raw", "sass"]),
        }
    ],

    output: {
        path: path.join(__dirname, "public/bundle"),
        publicPath: "/bundle/",
        filename: "[name].[hash].js",
        sourceMapFilename: "[file].map",
    },

    devtool: "cheap-module-source-map",
    plugins: [
        // Run webpack in production mode.
        // figure out the conflicts between this and dev server later.
        new webpack.DefinePlugin({
            "process.env": {
                // This has effect on the react lib size
                "NODE_ENV": JSON.stringify("production")
            }
        }),
        new webpack.optimize.DedupePlugin(),
        new webpack.optimize.UglifyJsPlugin({
            compress: {
                warnings: false
            }
        }),
        new HtmlWebpackPlugin({
            template: path.join(__dirname, "templates/layouts/default.html"),
            filename: path.join(__dirname, "templates/layouts/default.html"),
            inject: "body",
        }),
        new ExtractTextPlugin("[contentHash].css"),
    ],
});
