import {getClientes} from "./api.js";

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
      </tr>
    `
  });
};

const formulario = document.getElementById('registrar');
formulario.addEventListener("submit", newCliente)

function newCliente(e){
  const  id_constructora = document.querySelector('#constructora').value;
  const nombre_constructora  = document.querySelector('#constructora').value;
  const nit_constructora = document.querySelector('#nit').value;
  const nombre_representante = document.querySelector('#representante').value;
  const email_contacto = document.querySelector('#email').value;
  const telefono_contacto = document.querySelector('#telefono').value;

  const registro = {
    id_constructora ,
    nombre_constructora ,
    nit_constructora , 
    nombre_representante , 
    email_contacto , 
    telefono_contacto
  }
  console.log(registro);
}

