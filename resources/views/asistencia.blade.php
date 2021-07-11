@extends('layout/main')


@section('contenido-main')

<!--PARA QUE SALGA-->
<div class="container">
    <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item">

            <h5>Coonsulta de Asistencia


                <!-- Large modal Boton Agregar Asistencias -->

                <button onclick="" type="button" class="btn btn-success" data-toggle="modal"
                    data-target=".bd-example-modal-lg">

                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-person-plus" viewBox="0 0 16 16">
                        <path
                            d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                        <path fill-rule="evenodd"
                            d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                    </svg>
                    Agregar Asistencia

                </button>

            </h5>
        </li>


    </ul>



</div>

<!--PARA QUE SALGA-->




<!--Table-->
<div class="container">

    <table id="example" class="table table-hover table-bordered ">
        <thead class="thead-dark">
            <tr>

                <th>Asistencia</th>
                <th>Docente</th>
                <th>Alumno</th>
                <th>Opciones</th>




            </tr>
        </thead>

        <tbody>




            @foreach ($selecasistencia as $item)


            <tr>
                <td>{{ $item->ID_ASISTENCIA }} </td>

                <td>{{ $item->DOCENTE_NOMBRE}} {{ $item->DOCENTE_AP_PAT}} {{ $item->DOCENTE_AP_MAT}} </td>
                <td>
                    {{ $item->ALUMNO_NOMBRE}} {{ $item->ALUMNO_APELLIDO_PAT }} {{ $item->ALUMNO_APELLIDO_MAT }}
                </td>




                <td>
                    <center>
                        <a type="button" class="btn btn-primary "
                            href="{{ route('update.mostasistencia_modificar',$item->ID_ASISTENCIA) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path
                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                <path fill-rule="evenodd"
                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                            </svg>
                            Editar</a>

                        <a type="button" class="btn btn-danger"
                            href="{{ route('delete.asistencia_eliminar',$item->ID_ASISTENCIA) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-trash" viewBox="0 0 16 16">
                                <path
                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                <path fill-rule="evenodd"
                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                            </svg>
                            Eliminar</a>
                        <button type="button" class="btn btn-dark">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                                <path
                                    d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z" />
                            </svg>
                            Ver</button>
                    </center>

                </td>


            </tr>

            @endforeach
        </tbody>
    </table>

</div>
<!--FIN TABLE-->





<!--Cuadroa  salir Agregar Asistencia-->

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Agregar Asistencia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('insert.agregar-asistencia') }}" method="POST">
                @csrf


                <div class="row>">
                    <div class="col-sm">


                        <div class="form-group">
                            <label for="exampleFormControlInput1">ID:</label>
                            <input type="text" name="ID_ASISTENCIA" class="form-control form-control-sm"
                                pattern="[A-Zz-a]{1,30}" maxlength="30" placeholder="ID"
                                value="{{ old('ID_ASISTENCIA') }}" required>
                            {!! $errors->first('ID_ASISTENCIA','<span class="alert-danger">:message</span><br>')
                            !!}

                        </div>



                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Nombre Grupo:</label>
                            <select name="ASISTENCIA_ID_GRUPO_NOMBRE" class="form-control form-control-sm"
                                id="exampleFormControlSelect1">



                                <?php foreach ($selecgrupo as $item)  {?>

                                <option>

                                    <?php  echo $item->	ID_GRUPO_NOMBRE; 
                                        
                                            
                                        ?>
                                    </>

                                    <?php
                                   

                                            }//cierro el foreach
                                            ?>


                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Docentes:</label>
                            <select name="ASISTENCIA_ID_DOCENTE" class="form-control form-control-sm"
                                id="exampleFormControlSelect1">


                                <?php foreach ($selecdocente as $item)  {?>

                                <option value={{ $item->ID_DOCENTE}}>

                                    <?php  echo $item->	DOCENTE_NOMBRE," ", $item->	DOCENTE_AP_PAT," ", $item->	DOCENTE_AP_MAT ; 
                                        
                                            
                                        ?>
                                    </>

                                    <?php
                                   

                                            }//cierro el foreach
                                            ?>

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Alumno:</label>
                            <select name="ASISTENCIA_ID_ALUMNO" class="form-control form-control-sm"
                                id="exampleFormControlSelect1">

                                <?php foreach ($selecalum as $item)  {?>

                                <option value={{ $item->ID_ALUMNO}}>

                                    <?php  echo $item->	ALUMNO_NOMBRE," ", $item->	ALUMNO_APELLIDO_MAT," ", $item->ALUMNO_APELLIDO_PAT ; 
                                        
                                            
                                        ?>
                                    </>

                                    <?php
                                   

                                            }//cierro el foreach
                                            ?>

                            </select>
                        </div>

                        <div class="form-group ">
                            <label for="exampleFormControlInput1 ">Fecha de
                                Nacimiento:</label>

                            <input name="ASISTENCIA_FECHA" class="form-control form-control-sm" type="date"
                                value="2011-08-19" id="example-date-input">

                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Asistencia Clase:</label>
                            <input type="text" name="ASISTENCIA_CLASE" pattern="[a-zZ-A]{1,30}" maxlength="30"
                                class="form-control form-control-sm" placeholder="Asistencia Clase"
                                value="{{ old('	ASISTENCIA_CLASEE') }}" required>
                            {!! $errors->first('ASISTENCIA_CLASE','<span class="alert-danger">:message</span><br>')
                            !!}


                        </div>




                    </div>


                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success">Agregar</button>

                </div>
            </form>

        </div>
    </div>

</div>


<!--FINAL  CUADRO SALIDA AGREGAR Asistencia-->


@endsection