// import external dependencies
import 'jquery';

// Import everything from autoload
import './autoload/**/*'


// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import aboutUs from './routes/about';

// Require Components
// window.stokpress = require('./util/helper');
// require('./components/helper');
// require('./util/helper');
require('./components/auto-padding');
require('./components/nav');
require('./components/filter');
require('./components/resellers');
require('./components/video');

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
  $('.resellers-table').resellersTable();
});
