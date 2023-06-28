import {getDepartamento,newDepartamento,deleteDepartamento} from "./api.js";

addEventListener('DOMContentLoaded',()=>{
  cargaDepartamento();
});

async function cargaDepartamento(){
  const departamento = await getDepartamento();
  console.log(departamento);
  const tableDepartamento = document.querySelector("#datosDepartamento");

  departamento.forEach(element => {
    const {idDep , pais , nombreDep} = element;
    tableDepartamento.innerHTML+= `
      <tr>
        <th scope="row">${idDep}</th>
        <td>${pais}</td>
        <td>${nombreDep}</td>
        <td><button class="btn btn-outline-danger delete" id="${idDep}">Eliminar</button></td>
      </tr>
    `
  });
};

const formulario = document.getElementById('registrarDepartamento');
formulario.addEventListener("submit", newDepartamentos);


function newDepartamentos(e){
  e.preventDefault();
  const idDep = document.querySelector('#id').value;
  const pais = document.querySelector('#pais').value;
  const nombreDep  = document.querySelector('#nombre').value;

  const registro = {
    idDep ,
    pais,
    nombreDep
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