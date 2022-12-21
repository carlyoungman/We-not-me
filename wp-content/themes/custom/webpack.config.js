const webpack = require('webpack');
const path = require('path');
const libDir = __dirname + '/assets/javascript/lib';
const nodeDir = __dirname + '/node_modules';
const seviceDir = __dirname + '/assets/javascript/services';
const pluginDir = __dirname + '/assets/javascript/plugins';

module.exports = {
  mode: 'development',
  resolve: {
    alias: {
      slick: nodeDir + '/slick-carousel/slick/slick.js',
      instafeed: nodeDir + '/instafeed.js/instafeed.js',
      scollMagic:
        nodeDir + '/scrollmagic/scrollmagic/uncompressed/ScrollMagic.js',
      gsap: libDir + '/gsap/all.js',
      cookie: nodeDir + '/jquery.cookie/jquery.cookie.js',
      fullPage: nodeDir + '/fullpage.js/dist/fullpage.min.js',
      extensions: nodeDir + '/fullpage.js/dist/fullpage.extensions.min.js',
      inview: nodeDir + '/jquery-inview/jquery.inview.js'
    }
  },
  output: {
    filename: 'app.bundle.js'
  },
  module: {
    // rules: [
    //   {
    //     enforce: "pre",
    //     test: /\.(js|jsx)$/,
    //     exclude: /node_modules/,
    //     use: "eslint-loader"
    //   },
    //   {
    //     test: /\.js$/,
    //     exclude: /node_modules/,
    //     use: {
    //       loader: "babel-loader",
    //       options: {
    //         presets: ["env"]
    //       }
    //     }
    //   }
    // ]
  },
  plugins: [
    new webpack.ProvidePlugin({
      $: 'jquery',
      jQuery: 'jquery'
    })
  ]
};
