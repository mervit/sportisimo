import 'materialize-css/dist/js/materialize';
import netteForms from 'nette-forms';

import '../sass/app.scss';

window.Nette = netteForms;

netteForms.initOnLoad();

document.addEventListener('DOMContentLoaded', function() {

    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems, {});

    var sidenavToggler = document.getElementById('sidenav-toggler');
    sidenavToggler.addEventListener('click', function(){

        document.body.classList.toggle('sidenav-open');
        if(window.innerWidth < 993) {
            var instance = M.Sidenav.getInstance(document.getElementById('sidenav-left'));
            instance.close();
        }

    });

});