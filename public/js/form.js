
const base_url = document.querySelector('meta[name="base_url"]').getAttribute('content');
const token = document.querySelector('meta[name="csrf-token"]').content;


const btn_get = document.querySelector("#btn_get");
const btn_insert = document.querySelector("#btn_insert");
const btn_update = document.querySelector("#btn_update");
const sele_get = document.querySelector("#id_book");
const btn_delete = document.querySelector("#btn_delete");

const postInsert = document.querySelector("#insert");
const putUpdate = document.querySelector("#update");

const deleteDelete = document.querySelector("#delete");



document.addEventListener('DOMContentLoaded', () =>{

    btn_insert.addEventListener('click', e =>{
        procesar('insertData', null);
    });

    /**
     * Metodo para obtener todos los registros de la tabla
     */
    btn_get.addEventListener('click', e => {
        const headers = {
            'X-Requested-With': 'XMLHttpRequest',
        }
        fetchAction('/libros/todos', 'get', null,  headers, 'getAllTable');
    });

    /**
     * Metodo para enviar los datos del formulario y guardar un nuevo registro
     */
    postInsert.addEventListener('submit', e => {
        e.preventDefault();
        const form = new FormData(postInsert);
        fetchAction('/libros/guardar', 'post', form, {}, 'insert');
    });

    /**
     * Metodo para obtener el nombre de los librros
     */
    btn_update.addEventListener('click', e => {
        const headers = {
            'X-Requested-With': 'XMLHttpRequest',
        }
        procesar('updateData', null);
        fetchAction('/libros/todos', 'get', null,  headers, 'getAllSelect');
    });

    /**
     * Metodo para obtener el nombre y id de los libros
     */
    btn_delete.addEventListener('click', e => {
        const headers = {
            'X-Requested-With': 'XMLHttpRequest',
        }
        procesar('deleteData', null);
        fetchAction('/libros/todos', 'get', null,  headers, 'getAllSelectDelete');
    });

    /**
     * Metodo para obtener el nombre y id de los libros
     */
    sele_get.addEventListener('change', e => {
        const headers = {
            'X-Requested-With': 'XMLHttpRequest',
        }
        fetchAction(`/libros/buscar/${e.target.value}`, 'get', null, headers, 'getAllInput');
    });

    /**
     * Metodo para borrar un libro de la base
     */
    deleteDelete.addEventListener('click', e => {
        const idBook = document.querySelector("#id_delete");        
        const headers = {
            'X-CSRF-TOKEN': token
        }
        fetchAction(`/libros/borrar/${idBook.value}`, 'delete', null, headers, 'delete');
        idBook.remove(idBook.selectedIndex);
    })

    /**
     * Metodo para actualizar los datos de un libro
     */
    putUpdate.addEventListener('submit', e => {
        e.preventDefault();
        const idBook = document.querySelector("#id_book").value;
        const nombre = document.querySelector('#update input[name="nombre"]').value;
        const descri = document.querySelector('#update textarea[name="descripcion"]').value;
        const codigo = document.querySelector('#update input[name="codigo"]').value;

        const form = JSON.stringify({
            "_token": token, 
            id: idBook, 
            nombre: nombre,
            descripcion: descri,
            codigo: codigo
        });
        const headers = {
            'Content-Type': 'application/json; charset=UTF-8'
        }
        fetchAction(`/libros/actualizar`, 'put', form, headers, 'update');
    });

    let fetchAction = (url, method, form, headers, action) => {
        fetch(`${base_url}${url}`, {
            method: method, 
            body: form,
            headers : headers
        })  
        .then(res => res.json())
        .then(data => {
            if(data.data){
                procesar(action, data);
            } 
        });
    }

    let procesar = (type, data)=> {
        switch(type){
            case 'getAllTable':
                document.querySelector('.table').classList.remove('hide');
                document.querySelector('#insert').classList.add('hide');
                document.querySelector('#update').classList.add('hide');
                document.querySelector('.delete-group').classList.add('hide');

                const getInfo = document.querySelector('#getInfo');
                let info = '';
                data.books.forEach(element => {
                    info += `<tr>
                        <td>${element.nombre}</td>
                        <td>${element.descripcion}</td>
                        <td>${element.codigo}</td>
                    </tr>`;
                });
                getInfo.innerHTML = info;
            break;
            case 'insertData':
                document.querySelector('.table').classList.add('hide');
                document.querySelector('#insert').classList.remove('hide');
                document.querySelector('#update').classList.add('hide');
                document.querySelector('.delete-group').classList.add('hide');
            break;
            case 'getAllSelect':
                const getInfoNames = document.querySelector('#id_book');
                let infoNames = '<option selected disabled>Selecione opcion</option>';
                data.books.forEach(element => {
                    infoNames += `<option value="${element.id}">${element.nombre}</option>`;
                });
                getInfoNames.innerHTML = infoNames;
            break;
            case 'getAllInput':
                document.querySelector('#update input[name="nombre"]').value = data.books.nombre;
                document.querySelector('#update textarea[name="descripcion"]').value = data.books.descripcion;
                document.querySelector('#update input[name="codigo"]').value = data.books.codigo;
            break;
            case 'getAllSelectDelete':
                const a = document.querySelector('#id_delete');
                let b = '';
                data.books.forEach(element => {
                    b += `<option value="${element.id}">${element.nombre}</option>`;
                });
                a.innerHTML = b;
            break;
            case 'updateData':
                document.querySelector('.table').classList.add('hide');
                document.querySelector('#insert').classList.add('hide');
                document.querySelector('#update').classList.remove('hide');
                document.querySelector('.delete-group').classList.add('hide');
            break;
            case 'deleteData':
                document.querySelector('.table').classList.add('hide');
                document.querySelector('#insert').classList.add('hide');
                document.querySelector('#update').classList.add('hide');
                document.querySelector('.delete-group').classList.remove('hide');
            break;
        }
        
    };

})

