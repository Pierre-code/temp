// Javascript
require('./heater.js');

// SCSS
require("../sass/app.scss");

// =============================================================================
// Require all scss files
// =============================================================================
require('../sass/0-basics/0-variables.scss');
require('../sass/0-basics/1-init.scss');
require('../sass/0-basics/2-fonts.scss');
require('../sass/0-basics/3-small-elements.scss');
require('../sass/1-navs/footer.scss');
require('../sass/1-navs/menu.scss');
require('../sass/1-navs/reassurances.scss');
// require('../sass/2-modules/xxx.scss');
// require('../sass/3-pages/xxx.scss');

// =============================================================================
// Require all js files
// =============================================================================
require('./partials/basics.js');

// =============================================================================
// Require dependencies
// =============================================================================
const $ = require('jquery');
// require popper.js ?
require('bootstrap');