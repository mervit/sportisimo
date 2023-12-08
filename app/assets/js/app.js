import 'materialize-css/dist/js/materialize';
import netteForms from 'nette-forms';

import '../sass/app.scss';

window.Nette = netteForms;

netteForms.initOnLoad();

document.addEventListener('DOMContentLoaded', function() {

    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems, {});

    var addItemElement = document.getElementById('itemAddForm');
    var addModal = M.Modal.init(addItemElement, {});

    var editItemElement = document.getElementById('itemEditForm');
    var editModal = M.Modal.init(editItemElement, {});

    var editItemElements = document.getElementsByClassName('itemEdit');
    for (var i = 0; i < editItemElements.length; i++) {
        editItemElements[i].addEventListener('click', function(){

            var data = this.dataset;

            var form = document.getElementById('itemEditForm').getElementsByTagName('form')[0];

            form.querySelectorAll('[name=name]').item(0).value = data.name;
            form.querySelectorAll('[name=id]').item(0).value = data.id;

            editModal.open();

        });
    }


    var sidenavToggler = document.getElementById('sidenav-toggler');
    sidenavToggler.addEventListener('click', function(){

        document.body.classList.toggle('sidenav-open');
        if(window.innerWidth < 993) {
            var instance = M.Sidenav.getInstance(document.getElementById('sidenav-left'));
            instance.close();
        }

    });

});