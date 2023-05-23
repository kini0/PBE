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

                <p><h2>20k</h2></p>
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
                <p>Frais de Dossier</p>

                <p><h2>Non Soldé</h2></p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">Faites votre paiement<i class="fas fa-arrow-circle-right"></i>
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
                    <th>Dipôme</th>
                    <th>Etabl destination</th>
                    <th>Filiere</th>
                    <th>Pays</th>
                    <th>Action</th>
                </tr>

                  @foreach($recherches as $recherche)
                <tr>
                    <td>{{$recherche->id}}</td>
                    <td>{{$recherche->nom}}</td>
                    <td>{{$recherche->prenom}}</td>
                    <td>{{$recherche->age}}</td>
                    <td>{{Auth::user()->email}}</td>
                    <td>{{$recherche->phone}}</td>
                    <td>{{$recherche->aetabl}}</td>
                    <td>{{$recherche->diplome}}</td>
                    <td>{{$recherche->detabl}}</td>
                    <td>{{$recherche->filiere}}</td>
                    <td>{{$recherche->pays}}</td>
                    <td>
                      <a href="/admins/show/{{ $recherche->id }}" class="btn btn-primary">Veiw</a>
                    </td>
                </tr>
                @endforeach
              
            </table>
           
        </section>
      </div><!-- /.container-fluid -->
    </section>
    <!--/.main information for etudiant-->
    <br><br><br>
    <!-- actualité et tchat-->

    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-7 col-6">
            <!-- small box -->
            <div id="carousel" class="carousel slide card" data-ride="carousel">
                <h4>Actualités sur la Fondation Benianh International</h4>
                <div class="row">
                    <div class="col-lg-3">
                        <i class="ion ion-refresh"></i>
                        Bourse
                    </div>
                    <div class="col-lg-3"> <i class="ion ion-refresh"></i>Caravane</div>
                    <div class="col-lg-3"><i class="ion ion-refresh"></i>Examen</div>
                </div>
              <ol class="carousel-indicators">
                <li data-target=".carousel" data-slide-to="0" class="active"></li>
                <li data-target=".carousel" data-slide-to="1"></li>
                <li data-target=".carousel" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100 img-fluid img-thumbnail" src="{{asset('dist/img/photo1.png')}}" alt="Un tigre">
                  <div class="carousel-caption">
                    <h1>Un tigre</h1>
                  </div>
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100 img-fluid img-thumbnail" src="{asset('dist/img/photo4.jpg')}}" alt="Un tigre">
                  <div class="carousel-caption">
                    <h1>Un autre tigre</h1>
                  </div>
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100 img-fluid img-thumbnail" src="{asset('dist/img/photo3.jpg')}}" alt="Un tigre">
                  <div class="carousel-caption">
                    <h1>Encore un tigre</h1>
                  </div>
                </div>
              </div>
              <a class="carousel-control-prev" href="#carousel" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
              </a>
              <a class="carousel-control-next" href="#carousel" data-slide="next">
                <span class="carousel-control-next-icon"></span>
              </a> 
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-5 col-6">
            <!-- small box -->
            <!-- DIRECT CHAT -->
                <div class="card direct-chat direct-chat-warning">
                  <div class="card-header">
                    <h3 class="card-title">Direct Chat</h3>

                    <div class="card-tools">
                      <span title="3 New Messages" class="badge badge-warning">3</span>
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" title="Contacts" data-widget="chat-pane-toggle">
                        <i class="fas fa-comments"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <!-- Conversations are loaded here -->
                    <div class="direct-chat-messages">
                      <!-- Message. Default to the left -->
                      <div class="direct-chat-msg">
                        <div class="direct-chat-infos clearfix">
                          <span class="direct-chat-name float-left">Konin kini</span>
                          <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                        </div>
                        <!-- /.direct-chat-infos -->
                        <img class="direct-chat-img" src="{{ asset('dist/img/user1-128x128.jpg')}}" alt="message user image">
                        <!-- /.direct-chat-img -->
                        <div class="direct-chat-text">
                          Comment trouves-tu le travail?
                        </div>
                        <!-- /.direct-chat-text -->
                      </div>
                      <!-- /.direct-chat-msg -->

                      <!-- Message to the right -->
                      <div class="direct-chat-msg right">
                        <div class="direct-chat-infos clearfix">
                          <span class="direct-chat-name float-right">Marie France</span>
                          <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
                        </div>
                        <!-- /.direct-chat-infos -->
                        <img class="direct-chat-img" src="{{ asset('dist/img/user3-128x128.jpg')}}" alt="message user image">
                        <!-- /.direct-chat-img -->
                        <div class="direct-chat-text">
                          Tu ferais mieux j'y croire!
                        </div>
                        <!-- /.direct-chat-text -->
                      </div>
                      <!-- /.direct-chat-msg -->

                      <!-- Message. Default to the left -->
                      <div class="direct-chat-msg">
                        <div class="direct-chat-infos clearfix">
                          <span class="direct-chat-name float-left">Konin</span>
                          <span class="direct-chat-timestamp float-right">23 Jan 5:37 pm</span>
                        </div>
                        <!-- /.direct-chat-infos -->
                        <img class="direct-chat-img" src="{{ asset('dist/img/user1-128x128.jpg')}}" alt="message user image">
                        <!-- /.direct-chat-img -->
                        <div class="direct-chat-text">
                          Travailler sur une nouvelle application géniale ! Veux rejoindre?
                        </div>
                        <!-- /.direct-chat-text -->
                      </div>
                      <!-- /.direct-chat-msg -->

                      <!-- Message to the right -->
                      <div class="direct-chat-msg right">
                        <div class="direct-chat-infos clearfix">
                          <span class="direct-chat-name float-right">Marie France</span>
                          <span class="direct-chat-timestamp float-left">23 Jan 6:10 pm</span>
                        </div>
                        <!-- /.direct-chat-infos -->
                        <img class="direct-chat-img" src="{{ asset('dist/img/user3-128x128.jpg')}}" alt="message user image">
                        <!-- /.direct-chat-img -->
                        <div class="direct-chat-text">
                          J'aimerais bien.
                        </div>
                        <!-- /.direct-chat-text -->
                      </div>
                      <!-- /.direct-chat-msg -->

                    </div>
                    <!--/.direct-chat-messages-->

                    <!-- Contacts are loaded here -->
                    <div class="direct-chat-contacts">
                      <ul class="contacts-list">
                        <li>
                          <a href="#">
                            <img class="contacts-list-img" src="dist/img/user1-128x128.jpg" alt="User Avatar">

                            <div class="contacts-list-info">
                              <span class="contacts-list-name">
                                Count Dracula
                                <small class="contacts-list-date float-right">2/28/2015</small>
                              </span>
                              <span class="contacts-list-msg">How have you been? I was...</span>
                            </div>
                            <!-- /.contacts-list-info -->
                          </a>
                        </li>
                        <!-- End Contact Item -->
                        <li>
                          <a href="#">
                            <img class="contacts-list-img" src="dist/img/user7-128x128.jpg" alt="User Avatar">

                            <div class="contacts-list-info">
                              <span class="contacts-list-name">
                                Sarah Doe
                                <small class="contacts-list-date float-right">2/23/2015</small>
                              </span>
                              <span class="contacts-list-msg">I will be waiting for...</span>
                            </div>
                            <!-- /.contacts-list-info -->
                          </a>
                        </li>
                        <!-- End Contact Item -->
                        <li>
                          <a href="#">
                            <img class="contacts-list-img" src="dist/img/user3-128x128.jpg" alt="User Avatar">

                            <div class="contacts-list-info">
                              <span class="contacts-list-name">
                                Nadia Jolie
                                <small class="contacts-list-date float-right">2/20/2015</small>
                              </span>
                              <span class="contacts-list-msg">I'll call you back at...</span>
                            </div>
                            <!-- /.contacts-list-info -->
                          </a>
                        </li>
                        <!-- End Contact Item -->
                        <li>
                          <a href="#">
                            <img class="contacts-list-img" src="dist/img/user5-128x128.jpg" alt="User Avatar">

                            <div class="contacts-list-info">
                              <span class="contacts-list-name">
                                Nora S. Vans
                                <small class="contacts-list-date float-right">2/10/2015</small>
                              </span>
                              <span class="contacts-list-msg">Where is your new...</span>
                            </div>
                            <!-- /.contacts-list-info -->
                          </a>
                        </li>
                        <!-- End Contact Item -->
                        <li>
                          <a href="#">
                            <img class="contacts-list-img" src="dist/img/user6-128x128.jpg" alt="User Avatar">

                            <div class="contacts-list-info">
                              <span class="contacts-list-name">
                                John K.
                                <small class="contacts-list-date float-right">1/27/2015</small>
                              </span>
                              <span class="contacts-list-msg">Can I take a look at...</span>
                            </div>
                            <!-- /.contacts-list-info -->
                          </a>
                        </li>
                        <!-- End Contact Item -->
                        <li>
                          <a href="#">
                            <img class="contacts-list-img" src="dist/img/user8-128x128.jpg" alt="User Avatar">

                            <div class="contacts-list-info">
                              <span class="contacts-list-name">
                                Kenneth M.
                                <small class="contacts-list-date float-right">1/4/2015</small>
                              </span>
                              <span class="contacts-list-msg">Never mind I found...</span>
                            </div>
                            <!-- /.contacts-list-info -->
                          </a>
                        </li>
                        <!-- End Contact Item -->
                      </ul>
                      <!-- /.contacts-list -->
                    </div>
                    <!-- /.direct-chat-pane -->
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <form action="#" method="post">
                      <div class="input-group">
                        <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                        <span class="input-group-append">
                          <button type="button" class="btn btn-warning">Send</button>
                        </span>
                      </div>
                    </form>
                  </div>
                  <!-- /.card-footer-->
                </div>
                <!--/.direct-chat -->
          </div>
          <!-- ./col -->
        </div>
      </div><!-- /.container-fluid -->
    </section>

</div>
  <!-- /.content-wrapper -->
@endsection
