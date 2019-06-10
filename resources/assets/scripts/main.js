// import external dependencies
import 'jquery';

// Require/Import vendors
require('../../../node_modules/flickity/dist/flickity.pkgd');

// Import everything from autoload
import './autoload/**/*'

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import aboutUs from './routes/about';
import { carousels } from './components/carousels';

// Require Components
require('./components/auto-padding');
require('./components/nav');
require('./components/cookie');
require('./components/filter');
require('./components/resellers');
require('./components/carousels');

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
  carousels.init();
  $('.resellers-table').resellersTable();
});
