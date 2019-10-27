// SCSS
require("../sass/app.scss");

// =============================================================================
// Require all scss files
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

require('../sass/components/cards.scss');
require('../sass/components/alerts.scss');


// Pages
require('../sass/pages/user_ship_page.scss');
require('../sass/pages/home.scss');
require('../sass/pages/ship_edit.scss');
require('../sass/pages/integration-maquette.scss');

// =============================================================================
// Require dependencies
// =============================================================================
const $ = require('jquery');
// require popper.js ?
require('bootstrap');

// =============================================================================
// Require all js files
// =============================================================================
require('./heater.js');
require('./planets.js');
require('./javascript.js');
