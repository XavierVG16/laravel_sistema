<template>
            <main class="main">
            <!-- Breadcrumb -->
             <section class="content-header">
      <h1>
        Modulo
        <small>de Categoria</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Categoria</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Listado Categorias</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
                <div class="pull-right">
      
            <button type="button" class="btn btn-primary btn-secondary" @click="abrirModal('categoria','registrar')">
              <i class="fa fa-edit"></i> Registrar</button>
          </div>
          <br><br>
                 
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div>
                                    <tr>
                                        <th>
                                    <select class="form-control " v-model="criterio">
                                    <option value="nombre">Nombre</option>
                                      <option value="descripcion">Descripción</option>
                                    </select>
                                    </th>
                                    <th>
                                    <input type="text" v-model="buscar" @keyup.enter="listarCategoria(1,buscar,criterio)" class="form-control" placeholder="Texto a buscar">
                                    </th>
                                    <th>
                                    <button type="submit" @click="listarCategoria(1,buscar,criterio)" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>

                                    </th>
                                        </tr>                                    
                                </div>
                            </div>
                        </div>
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Opciones</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="categoria in arrayCategoria" :key="categoria.id">
                                    <template v-if="categoria.id">

                                    <td>
                                        <button type="button" @click="abrirModal('categoria','actualizar',categoria)" class="btn btn-primary btn-sm" title="Editar">
                                          <i class="fa fa-pencil"></i>
                                        </button> &nbsp;
                                        
                                        <template v-if="categoria.condicion">
                                            <button type="button" class="btn btn-warning btn-sm" title="Desactivar" @click="desactivarCategoria(categoria.id)">
                                                <i class="fa  fa-times"></i>
                                            </button> &nbsp;
                                        </template>
                                        <template v-else>
                                            <button type="button" class="btn btn-info btn-sm" title="Activar" @click="activarCategoria(categoria.id)">
                                                <i class="fa fa-check"></i>
                                            </button> &nbsp;
                                        </template>
                                         <button type="button" class="btn btn-danger btn-sm" title="Eliminar" @click="eliminarCategoria(categoria.id)">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                    </td>
                                    <td v-text="categoria.nombre"></td>
                                    <td v-text="categoria.descripcion"></td>
                                    <td>
                                        <div v-if="categoria.condicion">
                                            <span class="badge badge-success">Activo</span>
                                        </div>
                                        <div v-else>
                                            <span class="badge badge-danger">Desactivado</span>
                                        </div>
                                        
                                    </td>
                                     </template>
                                        <template v-else>
                                            <td> <h2>No se encontro la informacion</h2></td>
                                        </template>
                                </tr>                                
                            </tbody>
                        </table>
                        <nav>
                            <ul class="pagination">
                                <li class="page-item" v-if="pagination.current_page > 1">
                                    <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page - 1,buscar,criterio)">Ant</a>
                                </li>
                                <li class="page-item" v-for="page in pagesNumber" :key="page" :class="[page == isActived ? 'active' : '']">
                                    <a class="page-link" href="#" @click.prevent="cambiarPagina(page,buscar,criterio)" v-text="page"></a>
                                </li>
                                <li class="page-item" v-if="pagination.current_page < pagination.last_page">
                                    <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page + 1,buscar,criterio)">Sig</a>
                                </li>
                            </ul>
                        </nav>
                   
  
            
            <!--Inicio del modal agregar/actualizar-->
         
            
        
        <!-- /.modal -->
   
            <!--Fin del modal-->

            </div>
        <!-- /.box-body -->
        <div class="box-footer">
      
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
       <div class="modal modal-primary" tabindex="-1" :class="{'mostrar' : modal}">
                <div class="modal-dialog " role="document">
                    <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            
                            <button type="button" class="close" data-dismiss="modal" @click="cerrarModal()" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"  v-text="tituloModal"></h4>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Nombre</label>
                                    <div class="col-md-9">
                                        <input type="text" v-model="nombre" class="form-control" placeholder="Nombre de categoría">
                                        
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="email-input">Descripción</label>
                                    <div class="col-md-9">
                                        <input type="email" v-model="descripcion" class="form-control" placeholder="Ingrese descripción">
                                    </div>
                                </div>
                                <div v-show="errorCategoria" class="form-group row div-error">
                                    <div class="text-center text-error">
                                        <div v-for="error in errorMostrarMsjCategoria" :key="error" v-text="error">

                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline pull-left" @click="cerrarModal()">Cerrar</button>
                            <button type="button" v-if="tipoAccion==1"  class="btn btn-outline" @click="registrarCategoria()">Guardar</button>
                            <button type="button" v-if="tipoAccion==2"  class="btn btn-outline" @click="actualizarCategoria()">Actualizar</button>
                        </div>
                                    </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>

        </main>
</template>

<script>
    export default {
        data (){
            return {
                categoria_id: 0,
                nombre : '',
                descripcion : '',
                arrayCategoria : [],
                modal : 0,
                tituloModal : '',
                tipoAccion : 0,
                errorCategoria : 0,
                errorMostrarMsjCategoria : [],
                pagination : {
                    'total' : 0,
                    'current_page' : 0,
                    'per_page' : 0,
                    'last_page' : 0,
                    'from' : 0,
                    'to' : 0,
                },
                offset : 3,
                criterio : 'nombre',
                buscar : ''
            }
        },
        computed:{
            isActived: function(){
                return this.pagination.current_page;
            },
            //Calcula los elementos de la paginación
            pagesNumber: function() {
                if(!this.pagination.to) {
                    return [];
                }
                
                var from = this.pagination.current_page - this.offset; 
                if(from < 1) {
                    from = 1;
                }

                var to = from + (this.offset * 2); 
                if(to >= this.pagination.last_page){
                    to = this.pagination.last_page;
                }  

                var pagesArray = [];
                while(from <= to) {
                    pagesArray.push(from);
                    from++;
                }
                return pagesArray;             

            }
        },
        methods : {
          async  listarCategoria (page,buscar,criterio){
                let me=this;
                var url= '/categoria?page=' + page + '&buscar='+ buscar + '&criterio='+ criterio;
               await axios.get(url).then(function (response) {
                    var respuesta= response.data;
                    me.arrayCategoria = respuesta.categorias.data;
                    me.pagination= respuesta.pagination;
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            cambiarPagina(page,buscar,criterio){
                let me = this;
                //Actualiza la página actual
                me.pagination.current_page = page;
                //Envia la petición para visualizar la data de esa página
                me.listarCategoria(page,buscar,criterio);
            },
           async registrarCategoria(){
                if (this.validarCategoria()){
                    return;
                }
                
                let me = this;

               await axios.post('/categoria/',{
                    'nombre': this.nombre,
                    'descripcion': this.descripcion
                }).then(function (response) {
                    me.cerrarModal();
                    Swal.fire(
                            'Guardado!',
                            'El registro ha sido guardado con éxito.',
                            'success'
                          )
                    me.listarCategoria(1,'','nombre');
                }).catch(function (error) {
                    console.log(error);
                });
            },
           async actualizarCategoria(){
               if (this.validarCategoria()){
                    return;
                }
                
                let me = this;

                await axios.put('/categoria/actualizar',{
                    'nombre': this.nombre,
                    'descripcion': this.descripcion,
                    'id': this.categoria_id
                }).then(function (response) {
                    me.cerrarModal();
                    Swal.fire(
                            'Actualizado!',
                            'El registro ha sido actualizado con éxito.',
                            'success'
                          )
                    me.listarCategoria(1,'','nombre');
                }).catch(function (error) {
                    console.log(error);
                }); 
            },
             eliminarCategoria(id){
        Swal.fire({
            title: 'Esta seguro de eliminar esta categoría?',
            text: "Se elimnara toda la informacion",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Aceptar'
          }).then((result) => {
              
            if (result.value) {
              //Send Request to server
                let me = this;

                    axios.put('/categoria',{
                    'id': id})
                  .then((response)=> {
                          Swal.fire(
                            'Eliminado!',
                            'El registro ha sido eliminado con éxito.',
                            'success'
                          )
                    me.listarCategoria(1,'','nombre');
  
                  }).catch(() => {
                      Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Algo salio mas!',
                        footer: '<a href>Actualizar</a>'
                      })
                  })
              }
  
          })
        
            },
             desactivarCategoria(id){
          
          Swal.fire({
            title: 'Esta seguro de desactivar esta categoría?',
             text: "No podra utilizar esta informacion",

            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Aceptar'
          }).then((result) => {
              
            if (result.value) {
              //Send Request to server
               
                  let me = this;

                    axios.put('/categoria/desactivar',{
                        'id': id
                    }).then((response)=> {
                          Swal.fire(
                            'Desactivado!',
                            'El registro ha sido desactivado con éxito.',
                            'success'
                          )
                    me.listarCategoria(1,'','nombre');
  
                  }).catch(() => {
                      Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Algo salio mas!',
                        footer: '<a href>Actualizar</a>'
                      })
                  })
              }
  
          })
                
        
            },
            activarCategoria(id){
                Swal.fire({
            title: 'Esta seguro de activar esta categoría?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Aceptar'
          }).then((result) => {
              
            if (result.value) {
                    let me = this;

                    axios.put('/categoria/activar',{
                        'id': id
                    }).then((response)=> {
                          Swal.fire(
                            'Activado!',
                            'El registro ha sido activado con éxito.',
                            'success'
                          )
                    me.listarCategoria(1,'','nombre');
  
                  }).catch(() => {
                      Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Algo salio mas!',
                        footer: '<a href>Actualizar</a>'
                      })
                  })
              }
  
          })
                
            },
            validarCategoria(){
                this.errorCategoria=0;
                this.errorMostrarMsjCategoria =[];

                if (!this.nombre) this.errorMostrarMsjCategoria.push("El nombre de la categoría no puede estar vacío.");

                if (this.errorMostrarMsjCategoria.length) this.errorCategoria = 1;

                return this.errorCategoria;
            },
            cerrarModal(){
                this.modal=0;
                this.tituloModal='';
                this.nombre='';
                this.descripcion='';
            },
            abrirModal(modelo, accion, data = []){
                switch(modelo){
                    case "categoria":
                    {
                        switch(accion){
                            case 'registrar':
                            {
                                this.modal = 1;
                                this.tituloModal = 'Registrar Categoría';
                                this.nombre= '';
                                this.descripcion = '';
                                this.tipoAccion = 1;
                                break;
                            }
                            case 'actualizar':
                            {
                                //console.log(data);
                                this.modal=1;
                                this.tituloModal='Actualizar categoría';
                                this.tipoAccion=2;
                                this.categoria_id=data['id'];
                                this.nombre = data['nombre'];
                                this.descripcion= data['descripcion'];
                                break;
                            }
                        }
                    }
                }
            }
        },
        mounted() {
            this.listarCategoria(1,this.buscar,this.criterio);
        }
    }
</script>
