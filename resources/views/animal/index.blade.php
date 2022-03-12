<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
        crossorigin="anonymous">
    </script>

    <!--bootstrap-->
    <!--https://getbootstrap.com/docs/5.1/getting-started/introduction/-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>

    <!--datatables-->
    <!--https://datatables.net/download/index-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.css" />
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>

    <!--toastr.js-->
    <!--https://cdnjs.com/libraries/toastr.js/latest-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Laravel 8 con AJAX</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Animales</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Mantenimiento
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Propietarios</a></li>
                            <li><a class="dropdown-item" href="#">Medicos</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Citas</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
                    role="tab" aria-controls="home" aria-selected="true">Lista de animales</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                    type="button" role="tab" aria-controls="profile" aria-selected="false">Nuevo animal</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <h3>Lista animal</h3>

                <table id="tabla-animal" class="table table-hover">
                    <thead>
                        <td>ID</td>
                        <td>NOMBRE</td>
                        <td>ESPECIE</td>
                        <td>GENERO</td>
                        <td>ACCIONES</td>
                    </thead>
                </table>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <h3>Nuevo animal</h3>

                <form id="registro-animal">
                    @csrf
                    <div class="form-group">
                        <label for="">Nombre</label>
                        <input type="text" name="txtNombre" id="txtNombre" class="form-control"
                            aria-describedby="emailHelp">
                    </div>

                    <div class="form-group">
                        <label for="">Especie</label>
                        <select id="selEspecie" name="selEspecie" class="form-control">
                            <option value="gato">Gato</option>
                            <option value="perro">perro</option>
                            <option value="ave">Ave</option>
                            <option value="otros">Otros</option>
                        </select>
                    </div>

                    <div class="custom-control custom-radio">
                        <input type="radio" id="rbGeneroMacho" name="rbGenero" value="macho"
                            class="custom-control-input">
                        <label for="" class="custom-control-label">Macho</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="rbGeneroHembra" name="rbGenero" value="macho"
                            class="custom-control-input">
                        <label for="" class="custom-control-label">Hembra</label>
                    </div>

                    <button type="submit" class="btn btn-primary">Registrar</button>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ¿Desea eliminar el registro seleccionado?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="btnEliminar" name="btnEliminar" class="btn btn-danger">Eliminar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            var tablaAnimal = $('#tabla-animal').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('animal.index') }}",
                },
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'nombre'
                    },
                    {
                        data: 'especie'
                    },
                    {
                        data: 'genero'
                    },
                    {
                        data: 'action',
                        orderable: false
                    },
                ]
            });
        });
    </script>

    <script>
        $('#registro-animal').submit(function(e) {
            e.preventDefault();

            var nombre = $('#txtNombre').val();
            var especie = $('#selEspecie').val();
            var genero = $("input [name='rbGenero']:checked").val();
            var _token = $("input[name=_token]").val();

            $.ajax({
                url: "{{ route('animal.registrar') }}",
                type: "POST",
                data: {
                    nombre: nombre,
                    especie: especie,
                    genero: genero,
                    _token: _token
                },
                success: function(response) {
                    if (response) {
                        $('#registro-animal')[0].reset();
                        toastr.success('El registro se ingreso correctamente', 'nuevo registro', {
                            timeOut: 3000
                        });
                        $('#tabla-animal').DataTable().ajax.reload();
                    }
                }
            });
        });
    </script>

    <script>
        var ani_id;

        $(document).on('click', '.delete', function() {
            ani_id = $(this).attr('id');

            $('#confirmModal').modal('show');
        });

        $('#btnEliminar').click(function() {
            $.ajax({
                url: "animal/eliminar/"+ani_id,
                beforeSend: function() {
                    $('#btnEliminar').text('Eliminando...');
                },
                success:function(data) {
                    setTimeout(function () {
                        $('#confirmModal').modal('hide');
                        toastr.warning('El registro fue eliminado correctamente', 'eliminar registro', {
                            timeOut: 3000
                        });
                        $('#tabla-animal').DataTable().ajax.reload();
                    }, 2000);
                    $('#btnEliminar').text('Eliminar');
                }
            });
        });

    </script>

</body>

</html>
