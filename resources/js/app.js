import './bootstrap';   //cuando se pone un punto y slash quiere decir que queremos traer algo de la carpeta resoruces js y cuando no se pone el slash el compilador interpreta que quieres traer algo de la carpeta node modules
// import './sweetalert2';
import Alpine from 'alpinejs';
// import Swal from 'sweetalert2';

window.Alpine = Alpine;

Alpine.start();
// window.Swal = Swal;

// window.Swal = require('sweetalert2')  //con window. agregas una constantes o quieres decir a lareavle mix que es una constante
