import {getPais,newPais,deletePais} from "./api.js";

addEventListener('DOMContentLoaded',()=>{
  cargaPais();
});

async function cargaPais(){
  const pais = await getPais();
  console.log(pais);
  const tablePais = document.querySelector("#datosPais");

  pais.forEach(element => {
    const {idPais , nombrePais} = element;
    tablePais.innerHTML+= `
      <tr>
        <th scope="row">${idPais}</th>
        <td>${nombrePais}</td>
        <td><button class="btn btn-outline-danger delete" id="${idPais}">Eliminar</button></td>
      </tr>
    `
  });
};

const formulario = document.getElementById('registrarPais');
formulario.addEventListener("submit", newPaises);


function newPaises(e){
  e.preventDefault();
  const idPais = document.querySelector('#id').value;
  const nombrePais  = document.querySelector('#pais').value;

  const registro = {
    idPais ,
    nombrePais 
  }
  console.log(registro);

  if(validation(registro)){
    alert("Todos los datos son obligatorios");
  }return newPais (registro);
}

function validation(Objeto){
  return !Object.values(Objeto).every(element => element !== '')
}

const eliminar = document.querySelector('#datosPais');
eliminar.addEventListener('click',borrar);

function borrar (e){
  if(e.target.classList.contains('delete')){
    console.log(e.target);
    const idPais = e.target.getAttribute('id');
    console.log(idPais);

    const confir = confirm("Desea eliminarlo");
    if(confir){
      deletePais(idPais);
    };
  }
};