@extends('layouts.admin.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tableau de bord Administrateur</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
              <li class="breadcrumb-item active">Tableau de bord</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <p>Session 2022</p>

                  <p><h2>Ouvert</h2></p>
                  <small>{{date("Y-m-d")}}</small>
              </div>
              <div class="icon">
                <i class="ion ion-refresh"></i>
              </div>
              <a href="#" class="small-box-footer">30 J elle sera fermée <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <p>Message du FBI</p>
                <!--<h3>53<sup style="font-size: 20px">%</sup></h3>-->
                <p><h2>Admis</h2></p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">2.1% à la remise de bourse <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <p>Total Candidat</p>

                <p><h2>{{$nmb->count()}}</h2></p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">1.3% que l'année dernière<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <p>Liste des moyennes</p>

                <p><h2>Candidats</h2></p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="/admins/listemoyenne" class="small-box-footer">Voir liste<i class="fas fa-arrow-circle-right"></i>
             </a>
            </div>
          </div>
          <!-- ./col -->
        </div>
      </div><!-- /.container-fluid -->
    </section><br><br>
    <!-- /.content -->

    <!-- main information for etudiant-->
    <div class="container">
        <h2>Programme Immersion Communautaire</h2>
        <p>La liste des participants ayant confirmé leurs inscriptions</p>            
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Nom & Prénom</th>
                <th>Adresse mail</th>
                <th>Téléphone</th>
                <th>Profession</th>
                <th>Organisation ou Entreprise</th>
            </tr>
            </thead>
            <tbody>
            @foreach($immersions as $doc)
                <tr>
                    <td>{{$doc->name}}</td>
                    <td>{{$doc->email}}</td>
                    <td>{{$doc->phone}}</td>
                    <td>{{$doc->profession}}</td>
                    <td>{{$doc->organisation}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!--/.main information for etudiant-->
    <br><br><br>
    <!-- actualité et tchat-->

    <main>
        <div class="b-example-divider"></div>

        <div class="container px-4 py-5" id="custom-cards">
            <h2 class="pb-2 border-bottom">Evernement important</h2>

            <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
            @foreach($galleries as $gallery)
            <div class="col">
                <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg img-fluid" style="background-image: url('/storage/{{$gallery->image}}');">
                <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1" style="background-color: rgba(0, 0, 0, 0.6)">
                    <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">{{$gallery->titre}}</h2>
                    <ul class="d-flex list-unstyled mt-auto">
                    <li class="me-auto">
                        <img src="{{asset('assets/img/LOGO_PROGRAMME_BOURSES-removebg-preview.png')}}" alt="Bootstrap" width="32" height="32" class="rounded-circle border border-white">
                    </li>
                    <li class="d-flex align-items-center me-3">
                        <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#geo-fill"/></svg>
                        <small>{{$gallery->category}}</small>
                    </li>
                    <li class="d-flex align-items-center">
                        <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#calendar3"/></svg>
                        <small>
                          <a href="{{ asset('/storage/'.$gallery->image)}}">
                            Voir
                          </a>
                        </small>
                    </li>
                    </ul>
                </div>
                </div>
            </div>
            @endforeach
            </div>
            <div class="d-flex justify-content-center">{{$galleries->links()}}</div>
        </div>

        <div class="b-example-divider"></div>
    </main>
</div>
  <!-- /.content-wrapper -->
@endsection
