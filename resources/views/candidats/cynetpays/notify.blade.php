@extends('layouts.candidat.app')
@section('content')
    <style>
        .pointer:hover{
            cursor: pointer;
        }
    </style>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tableau de bord CANDIDAT</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('candidat') }}">Home</a></li>
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
                  @if($date1 == $date2)

                    <p><h2>Fermé</h2></p>
                    <small>{{date("Y-m-d")}}</small>
                  @else
                    <p><h2>Ouvert</h2></p>
                    <small>{{date("Y-m-d")}}</small>
                  @endif
              </div>
              <div class="icon">
                <i class="ion ion-refresh"></i>
              </div>
              <a href="#" class="small-box-footer">{{$difference}} elle sera fermée <i class="fas fa-arrow-circle-right"></i></a>
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

                <div class="col-lg-3 col-6 pointer" onclick="checkout()">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <p>Frais de Dossier</p>

                            <p><h2>Non Soldé</h2></p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="##" class="small-box-footer">Faites votre paiement<i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

          <!-- ./col -->
        </div>
      </div><!-- /.container-fluid -->
    </section><br><br>
    <!-- /.content -->

    <!-- main information for etudiant-->
    <section class="content">
      <div class="container-fluid">
        <section  class="table table-bordered table-striped table-sm table-xs table-md table-lg">
            <table class="table table-bordered table-striped table-sm table-xs table-md table-lg">
                <tr>
                    <thead>
                        <h1>
                            Nom & listes des dossiers
                        </h1>
                    </thead>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Âge</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Etabl actuel</th>
                    <th>Diplôme</th>
                    <th>Etabl destination</th>
                    <th>Filière</th>
                    <th>Pays</th>
                    <th>Action</th>
                </tr>


                <tr>
                    <td>{{$infocandidat->id}}</td>
                    <td>{{$infocandidat->nom}}</td>
                    <td>{{$infocandidat->prenom}}</td>
                    <td>{{$infocandidat->age}}</td>
                    <td>{{Auth::user()->email}}</td>
                    <td>{{$infocandidat->phone}}</td>
                    <td>{{$infocandidat->aetabl}}</td>
                    <td>{{$infocandidat->diplome}}</td>
                    <td>{{$infocandidat->detabl}}</td>
                    <td>{{$infocandidat->filiere}}</td>
                    <td>{{$infocandidat->pays}}</td>
                    <td>
                    <form method="POST" align="left">
                      <a href="/dossiers/show/{{ $infocandidat->id }}" class="btn btn-primary">Veiw</a>
                    </form>
                    <form method="POST" align="left">
                      <a href="/dossiers/edit/{{ $infocandidat->id }}" class="btn btn-warning">Edit</a>
                    </form>

                    <form method="POST" align="left">
                      <!--<a href="{{ route('dossiers.destroy', $infocandidat->id) }}" class="btn btn-danger">Delete</a>-->
                    </form>
                    </td>
                </tr>


            </table>
        </section>
      </div><!-- /.container-fluid -->
    </section>
    <!--/.main information for etudiant-->
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
