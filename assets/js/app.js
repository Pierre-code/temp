// SCSS
require("../sass/app.scss");

/// =============================================================================
// REQURE ALL SCSS FILES
//
// L'ordre est important, merci de ne rien modifier sans l'accord des responsables front
// =============================================================================

// Bases
require('../sass/bases/_init.scss');
require('../sass/bases/_variables.scss');
require('../sass/bases/_mixins.scss');
require('../sass/bases/_fonts.scss');
require('../sass/bases/_small-elements.scss');

// Components
require('../sass/components/forms.scss');

// Layout elements
require('../sass/layout-elements/footer.scss');
require('../sass/layout-elements/menu.scss');
require('../sass/layout-elements/sidebars.scss');
require('../sass/layout-elements/reassurances.scss');

require('../sass/1-navs/cards.scss');
require('../sass/1-navs/alerts.scss');
require('../sass/3-pages/user_ship_page.scss');


// Pages
require('../sass/pages/home.scss');

// =============================================================================
// Require dependencies
// =============================================================================
const $ = require('jquery');
// require popper.js ?
require('bootstrap');
var unicons = require("unicons");

// =============================================================================
// Require all js files
// =============================================================================
require('./partials/basics.js');
require('./heater.js');
require('./planets.js');
