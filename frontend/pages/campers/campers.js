import {getCamper,newCamper,deleteCamper} from "./api.js";

addEventListener('DOMContentLoaded',()=>{
  cargaCamper();
});

async function cargaCamper(){
  const camper = await getCamper();
  console.log(camper);
  const tableDepartamento = document.querySelector("#datosCamper");

  camper.forEach(element => {
    const {idCamper , region , nombre , apellido , fechaNac} = element;
    tableDepartamento.innerHTML+= `
      <tr>
        <th scope="row">${idCamper}</th>
        <td>${region}</td>
        <td>${nombre}</td>
        <td>${apellido}</td>
        <td>${fechaNac}</td>
        <td><button class="btn btn-outline-danger delete" id="${idCamper}">Eliminar</button></td>
      </tr>
    `
  });
};

const formulario = document.getElementById('registrarCamper');
formulario.addEventListener("submit", newCampers);


function newCampers(e){
  e.preventDefault();
  const idCamper = document.querySelector('#id').value;
  const region = document.querySelector('#region').value;
  const nombre  = document.querySelector('#nombre').value;
  const apellido  = document.querySelector('#apellido').value;
  const fechaNac  = document.querySelector('#fecha').value;

  const registro = {
    idCamper ,
    region,
    nombre,
    apellido,
    fechaNac
  }
  console.log(registro);

  if(validation(registro)){
    alert("Todos los datos son obligatorios");
  }return newCamper (registro);
}

function validation(Objeto){
  return !Object.values(Objeto).every(element => element !== '')
}

const eliminar = document.querySelector('#datosCamper');
eliminar.addEventListener('click',borrar);

function borrar (e){
  if(e.target.classList.contains('delete')){
    console.log(e.target);
    const idCamper = e.target.getAttribute('id');
    console.log(idCamper);

    const confir = confirm("Desea eliminarlo");
    if(confir){
      deleteCamper(idCamper);
    };
  }
};