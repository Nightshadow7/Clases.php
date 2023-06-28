import {getClientes,newCliente,deleteCliente} from "./api.js";

addEventListener('DOMContentLoaded',()=>{
  cargaClientes();
});

async function cargaClientes(){
  const clientes = await getClientes();
  console.log(clientes);
  const tableClientes = document.querySelector("#datosClientes");

  clientes.forEach(element => {
    const {id_constructora , nombre_constructora , nit_constructora , nombre_representante , email_contacto , telefono_contacto} = element;
    tableClientes.innerHTML+= `
      <tr>
        <th scope="row">${id_constructora}</th>
        <td>${nombre_constructora}</td>
        <td>${nit_constructora}</td>
        <td>${nombre_representante}</td>
        <td>${email_contacto}</td>
        <td>${telefono_contacto}</td>
        <td><button class="btn btn-danger delete" id="${id_constructora}">Eliminar</button></td>
      </tr>
    `
  });
};

const formulario = document.getElementById('registrar');
formulario.addEventListener("submit", newClientes);



function newClientes(e){
  e.preventDefault();
  const id_constructora = document.querySelector('#id').value;
  const nombre_constructora  = document.querySelector('#constructora').value;
  const nit_constructora = document.querySelector('#nit').value;
  const nombre_representante = document.querySelector('#persona').value;
  const email_contacto = document.querySelector('#email').value;
  const telefono_contacto = document.querySelector('#number').value;

  const registro = {
    id_constructora ,
    nombre_constructora ,
    nit_constructora , 
    nombre_representante , 
    email_contacto , 
    telefono_contacto
  }
  console.log(registro);

  if(validation(registro)){
    alert("Todos los datos son obligatorios");
  }return newCliente (registro);
}

function validation(Objeto){
  return !Object.values(Objeto).every(element => element !== '')
}

const eliminar = document.querySelector('#datosClientes');
eliminar.addEventListener('click',borrar);

function borrar (e){
  if(e.target.classList.contains('delete')){
    console.log(e.target);
    const idCliente = e.target.getAttribute('id');
    console.log(idCliente);

    const confir = confirm("Desea eliminarlo");
    if(confir){
      deleteCliente(idCliente);
    };
  }
};