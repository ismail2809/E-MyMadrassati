@extends('layout.master')
@section('title','Inscription')
@section('content') 

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Inscriptions</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Inscriptions</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
   
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Nouvelle inscription</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <form>

          <div class="card-body">
            <div class="row">  

              <div class="col-md-2">
                <div class="form-group">
                  <label>Numéro d'inscription</label>
                  <input type="text" class="form-control" name="" placeholder="Entrer ...">
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <label>Prénom</label>
                  <input type="text" class="form-control" name="" placeholder="Entrer ...">
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <label>Nom</label>
                  <input type="text" class="form-control" name="" placeholder="Entrer ...">
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" name="" placeholder="Entrer ...">
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <label>Sexe</label>
                  <select class="form-control select2" style="width: 100%;" name="">
                    <option>Masculin</option>
                    <option>Feminin</option> 
                  </select>
                </div> 
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <label>Date de naissance</label>
                  <input type="date" class="form-control" name="">
                </div>
              </div> 

              <div class="col-md-2">
                <div class="form-group">
                  <label>Lieu</label>
                  <input type="text" class="form-control" name="" placeholder="Entrer ...">
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <label>Père (Tuteur)</label>
                  <input type="text" class="form-control" name="" placeholder="Entrer ...">
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <label>Tél</label>
                  <input type="text" class="form-control" name="" placeholder="Entrer ...">
                </div>
              </div>  

              <div class="col-md-2">
                <div class="form-group">
                  <label>Profession</label>
                  <input type="text" class="form-control" name="" placeholder="Entrer ...">
                </div>
              </div> 

              <div class="col-md-2">
                <div class="form-group">
                  <label>Classe</label>
                  <select class="form-control select2" style="width: 100%;" name="">
                    <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
                </div> 
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <label>Année</label>
                  <select class="form-control select2" style="width: 100%;" name="">
                    <option selected="selected">2019/2020</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
                </div> 
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <label>Modalité</label>
                  <select class="form-control select2" style="width: 100%;" name="">
                    <option>Mensuelle</option>
                    <option>Trimestriel</option>
                    <option>Annuelle</option> 
                  </select>
                </div> 
              </div> 
            
            </div>
            <!-- /.row -->       
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="reset" class="btn btn-default float-right">Annuler</button>
            <button type="submit" class="btn btn-info">Enregister</button>
          </div>
            
          </form>
        </div>
        <!-- /.card -->

      </div>
      </section>
@endsection