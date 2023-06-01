const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const CssMinimizerPlugin = require("css-minimizer-webpack-plugin");
const TerserPlugin = require("terser-webpack-plugin");


const path = require('path');

module.exports = {

  // for CSS extract
  plugins: [new MiniCssExtractPlugin(
      {
        filename: "[name].css",
        chunkFilename: "[id].css",
      }
  )],

  // for css Minify  
  optimization: {
    minimizer: [
      new CssMinimizerPlugin(),
      new TerserPlugin()
    ],
    minimize: true,
  },

 // project init   
  entry: './src/index.js',
  
  // project output
  output: {
    filename: 'bundle.js',
    path: path.resolve(__dirname, 'dist'),
  },
  mode: 'development',
  module: {
    rules: [
        {
        test: /\.(s(a|c)ss)$/,
        use: [
            MiniCssExtractPlugin.loader,
            "css-loader",
            "sass-loader",
        ],
        
        },
        {
          test: /\.(png|jpe?g|gif)$/i,
          loader: 'file-loader',
          options: {
            outputPath: 'images',
          },
        },
        {
          test: '/\.(js|jsx)$/',
          exclude: /(node_modules|bower_components)/,
          use: {
            loader: 'babel-loader',
            options: {
              presets: ['@babel/preset-env']
            }
          }
        }
    ],
  },
};