    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Psychologist</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Psychologist</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <form action="consumoApi.php" method="GET">
  <div class="mb-3">
    <label for="nombre_psicologas" class="form-label">Nombre Psicologa</label>
    <input type="text" class="form-control" id="nombre_psicologas" name="nombre_psicologas">
  </div>
  <div class="mb-3">
    <label for="edad_psicologas" class="form-label">Edad</label>
    <input type="number" class="form-control" id="edad_psicologas" name="edad_psicologas">
  </div>
  <div class="mb-3">
  <label for="especialidad" class="form-label">Especialidad</label>
    <input type="text" class="form-control" id="especialidad" name="especialidad">
  </div>
  <div class="mb-3">
  <label for="cargo" class="form-label">Cargo</label>
    <input type="text" class="form-control" id="cargo" name="cargo">
  </div>
  <input type="submit" class="btn btn-primary" value="Enviar">
</form>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>