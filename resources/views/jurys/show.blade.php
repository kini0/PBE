@extends('layouts.jury.app')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"></h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('candidat') }}">Home</a></li>
                            <li class="breadcrumb-item active">Dossiers</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-md-9 themed-grid-col">
                        <div class="pb-3">
                            <h1>L'apperçu des dossiers</h1>
                        </div>
                        <div class="row">
                            <div class="col-md-6 themed-grid-col">Nom: <strong>{{ $dossier->nom }}</strong></div>
                            <div class="col-md-6 themed-grid-col">Prénom: <strong>{{ $dossier->prenom }}</strong></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 themed-grid-col">Votre Âge:<strong>{{ $dossier->age }}</strong></div>
                            <div class="col-md-6 themed-grid-col">Contact: <strong>{{ $dossier->phone }}</strong></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 themed-grid-col">Residense: <strong>{{ $dossier->residence }}</strong></div>
                            <div class="col-md-6 themed-grid-col">Etablissement actuel: <strong>{{ $dossier->aetabl }}</strong></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 themed-grid-col">Diplome Obtenu:<strong>{{ $dossier->diplome }}</strong></div>
                            <div class="col-md-6 themed-grid-col">Etablissement Souhaité: <strong>{{ $dossier->detabl }}</strong></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 themed-grid-col">Domaine d'Etude: <strong>{{ $dossier->filiere }}</strong></div>
                            <div class="col-md-6 themed-grid-col">Pays de destination: <strong>{{ $dossier->pays }}</strong></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 themed-grid-col">Email: <strong>{{$dossier->user->email}}</strong></div>
                            <div class="col-md-6 themed-grid-col"> <strong></strong></div>
                        </div>
                    </div>
                    <div class="col-md-3 themed-grid-col">
                        
                        <div class="pb-3">
                            <h1>Add note</h1>
                        </div>
                        <form class="d-flex" method="POST" action="/jurys/show/{{ $dossier->id }}" enctype="multipart/form-data">
                            @csrf
                            <input class="form-control me-2" type="number" name="note" placeholder="La note" aria-label="Send">
                            <button class="btn btn-outline-success" type="submit">Send</button>
                        </form>
                        
                    </div>
                    

                </div>
                <br><br><hr>
                <div class="album py-5 bg-light">
                    <div class="container-fluid">
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                            <div class="col">
                                <div class="card shadow-sm">
                                    <img src="{{ asset('/storage/'.$dossier->certificat)}}" alt=" Votre certificat" width="100%" height="225">
                                    <div class="card-body">
                                        <p class="card-text">Certificat de nationalité.</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <a class="btn btn-primary" href="{{ asset('/storage/'.$dossier->certificat)}}" role="button">View</a>
                                                <!---->
                                            </div>
                                            <small class="text-muted">{{$dossier->created_at}}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card shadow-sm">
                                    <img src="{{ asset('/storage/'.$dossier->cv)}}" alt="Votre cv" width="100%" height="225">
                                    <div class="card-body">
                                        <p class="card-text">Le Curriculum vitæ</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <a class="btn btn-primary" href="{{ asset('/storage/'.$dossier->cv)}}" role="button">View</a>
                                                
                                            </div>
                                            <small class="text-muted">9 mins</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card shadow-sm">
                                    <img src="{{ asset('/storage/'.$dossier->recu)}}" alt="Votre reçu" width="100%" height="225">

                                    <div class="card-body">
                                        <p class="card-text">Etre en possession d'une pré-inscription attestant l'admission au sein d'une Institution Académique réputée pour une formation qui requiert le niveau minimum BAC+4 (Master, Doctorat, MBA, PHD)</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <a class="btn btn-primary" href="{{ asset('/storage/'.$dossier->recu)}}" role="button">View</a>
                                                
                                            </div>
                                            <small class="text-muted">{{$dossier->created_at}}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="card shadow-sm">
                                    <img src="{{ asset('/storage/'.$dossier->lrecommandation)}}" alt="lettre de recommandation" width="100%" height="225">

                                    <div class="card-body">
                                        <p class="card-text">Présenter deux lettres de recommandation des professeurs principaux de l'Université ou Grande Ecole fréquentée, ou de l'employeur pour les postulants qui sont dans la vie professionnelle (Adressé à l’attention du Président du Jury de la fondation BENIANH International)</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <a class="btn btn-primary" href="{{ asset('/storage/'.$dossier->lrecommandation)}}" role="button">View</a>
                                                
                                            </div>
                                            <small class="text-muted">{{$dossier->created_at}}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card shadow-sm">
                                    <img src="{{ asset('/storage/'.$dossier->ldemande)}}" alt="Lettre de demande" width="100%" height="225">

                                    <div class="card-body">
                                        <p class="card-text">Ecrire une lettre de demande d'aide indiquant les montants des frais de scolarité.</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <a class="btn btn-primary" href="{{ asset('/storage/'.$dossier->ldemande)}}" role="button">View</a>
                                                
                                            </div>
                                            <small class="text-muted">{{$dossier->created_at}}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card shadow-sm">
                                    <img src="{{ asset('/storage/'.$dossier->lmotivation)}}" alt="lettre de motivation" width="100%" height="225">

                                    <div class="card-body">
                                        <p class="card-text">Ecrire une lettre de motivation et d’engagement « au retour en côte d’Ivoire ».</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <a class="btn btn-primary" href="{{ asset('/storage/'.$dossier->lmotivation)}}" role="button">View</a>
                                                
                                            </div>
                                            <small class="text-muted">{{$dossier->created_at}}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="card shadow-sm">
                                    <img src="{{ asset('/storage/'.$dossier->imgdiplome)}}" alt="Image diplome" width="100%" height="225">

                                    <div class="card-body">
                                        <p class="card-text">Copies légalisées des diplômes obtenus</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <a class="btn btn-primary" href="{{ asset('/storage/'.$dossier->imgdiplome)}}" role="button">View</a>
                                                
                                            </div>
                                            <small class="text-muted">{{$dossier->created_at}}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card shadow-sm">
                                    <img src="{{ asset('/storage/'.$dossier->note)}}" alt="rélévé de note" width="100%" height="225">

                                    <div class="card-body">
                                        <p class="card-text">Relevés de note à partir du BAC.</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <a class="btn btn-primary" href="{{ asset('/storage/'.$dossier->note)}}" role="button">View</a>
                                                
                                            </div>
                                            <small class="text-muted">{{$dossier->created_at}}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card shadow-sm">
                                    <img src="{{ asset('/storage/'.$dossier->projet)}}" alt="Votre projet" width="100%" height="225">

                                    <div class="card-body">
                                        <p class="card-text">Projet d’étude ou Projet de recherche en 3 pages maximum</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <a class="btn btn-primary" href="{{ asset('/storage/'.$dossier->projet)}}" role="button">View</a>
                                                
                                            </div>
                                            <small class="text-muted">{{$dossier->created_at}}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>

    </div>


@endsection
