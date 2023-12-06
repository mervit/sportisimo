import 'materialize-css/sass/materialize.scss';
import 'materialize-css/dist/js/materialize';
import netteForms from 'nette-forms';

import '../sass/app.sass';

window.Nette = netteForms;

netteForms.initOnLoad();