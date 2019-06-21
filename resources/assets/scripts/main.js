// import external dependencies
import 'jquery';

// Require/Import vendors
require('../../../node_modules/flickity/dist/flickity.pkgd');
require('./vendor/flickity-fullscreen');
require('./vendor/jquery.txtTruncate');


// Import everything from autoload
import './autoload/**/*'


// import local dependencies/utils
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import aboutUs from './routes/about';
import { sliders } from './components/sliders';
require('./util/plusItem');
require('./util/crossPlatform');
require('./util/autoPadding');
require('./util/ellipsis');


// Require Components
require('./components/nav');
require('./components/cookie');
require('./components/filter');
require('./components/picker');
require('./components/resellers');
require('./components/video');
require('./components/instagram');
require('./components/newsletter');
require('./components/category');
require('./components/cart');

/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
  // Home page
  home,
  // About Us page, note the change from about-us to aboutUs.
  aboutUs,
});

// Load Events
jQuery(document).ready(() => {
  routes.loadEvents();
  sliders.init();
  $('.js-plus-item').plusItem();
  $('.resellers-table').resellersTable();
  $('body').autoPadding({
    source:  $('.js-header'),
  });
});
