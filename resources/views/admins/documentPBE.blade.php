@extends('layouts.admin.app')
@section('content')
<div class="wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6"></div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
              <li class="breadcrumb-item active">Documents PBE</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <blockquote class="quote-danger">

    <div class="content-wrapper px-4 py-2" style="min-height: 44px;">
        
        <div class="text-center">
            <img src="{{asset('/assets/img/LOGO_PROGRAMME_BOURSES-removebg-preview.png')}}" class="rounded mx-auto d-block" width="150px" height="150px" alt="logo benianh">
        </div>
        <div class="content-header text-center">
            <h2>
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">
                    DOCUMENTS À FOURNIR POUR L'OBTENTION D'UNE BOURSE BENIANH
                    </font>
                </font>
            </h2>
        </div>
        <div class="content px-2">
            <p>
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">
                    Conformément à ses missions, la Fondation BENIANH International accorde chaque année des bourses d’études d’excellence à des étudiants des Grandes Ecoles ou Universités.
                    Pour être éligible, il faut être de nationalité ivoirienne, avoir moins de trente cinq ans et avoir un parcours scolaire (à partir du Baccalauréat) et universitaire 
                    (jusqu’au Bac+ 4 en attendant l’entrée en vigueur effective du système LMD) qui fait du candidat l’un des meilleurs de sa promotion. En d’autres termes, l’excellence  
                    est le critère essentiel qui gouverne la sélection des candidats.
                    </font>
                </font>
            </p>
            <p>
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">
                    Avant toute sélection, un appel à candidature fait l’objet d’une large diffusion ; en plus de satisfaire au critère d’excellence, les candidats à la bourse BENIANH 
                    doivent bénéficier d’une admission ou d’une préinscription dans une Université ou Grande Ecole de renommée internationale.
                    Des personnes hautement qualifiées issues de différents milieux professionnels constituent le jury ; on y trouve des professeurs d’université, des avocats, des chefs d’entreprises, 
                    pour ne citer que ceux-là. Suivant un faisceau de critères transparents et rigoureux, le jury passe en revue la cohérence du projet professionnel et procède, s’il y a lieu à l’interview 
                    des candidats retenus. Les bourses sont attribuées par ordre de mérite dans la limite du nombre de bourses disponibles.
                    </font>
                </font>
            </p>
            <p>
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">
                    Les bourses d’excellence BENIANH n’ont pas un caractère social. Elles reposent sur des critères de mérite qui tiennent compte  des qualités personnelles, intellectuelles, 
                    et universitaires des candidats. C’est pourquoi, elles sont ouvertes à des étudiants ivoiriens étudiant dans des pays à l’étranger. Le critère de nationalité ne reposant 
                    pas sur une volonté discriminatoire mais lié à ses capacités financières, la Fondation BENIANH International s’attelle à étendre son domaine d’intervention à tout lec ontinent Africain.
                    </font>
                </font>
            </p>
            <p>
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">
                    Le montant maximum de la bourse BENIANH est fixé à 4 million de CFA (6000 €) pour la destination Europe et 5 millions de CFA (7000 €) pour le continent américain. Elle couvre essentiellement
                    les frais de scolarité et est directement versée à la Grande Ecole ou Université d’accueil.
                    Une exception existe, cependant, pour les lauréats admis dans des établissements publics dont les coûts son en deçà des montants ci-dessus indiqués ; il leur est versé directement un montant 
                    correspondant aux frais de livres ou de recherches en plus des frais de scolarité. 
                    La bourse est valable uniquement pour l’année en cours et aucun report n’est autorisé.
                    </font>
                </font>
            </p>
            <h2 class="text-bold text-dark mt-3" id="adminlte-v30"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Comment obtenir une Bourse ?</font></font></h2>
            <p>
                <h3>
                    Documents à fournir pour le programme de bourses d'excéllence de la fondation BENIANH international
                </h3>
                La session de la bourse d’excellence BENIANH s’ouvre du 1er Mars au 15 Juin de chaque année.
            </p>
            <ul>
                <li>
                    
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                            Certificat de nationalité
                            </font>
                        </font>
                    
                </li>
                <li>
                    
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                            CV
                            </font>
                        </font>
                    
                </li>
                <li>
                    
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                            2 Photos d’identité du même tirage
                            </font>
                        </font>
                    
                </li>
                <li>
                    
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                            Etre âgé de moins de 35 ans
                            </font>
                        </font>
                    
                </li>
                <li>
                    
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                            Etre en possession d'une pré-inscription attestant l'admission au sein d'une Institution Académique réputée 
                            pour une formation qui requiert le niveau minimum BAC+4 (Master, Doctorat, MBA, PHD)
                            </font>
                        </font>
                    
                </li>
                <li>
                    
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                            Présenter deux lettres de recommandation des professeurs principaux de l'Université ou Grande Ecole fréquentée, ou de l'employeur pour les postulants qui sont dans la vie professionnelle 
                            (Adressé à l’attention du Président du Jury de la fondation BENIANH International)
                            </font>
                        </font>
                    
                </li>
                <li>
                    
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                            Ecrire une lettre de demande d'aide indiquant les montants des frais de scolarité
                            </font>
                        </font>
                    
                </li>
                <li>
                    
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                            Ecrire une lettre de motivation et d’engagement « au retour en côte d’Ivoire »
                            </font>
                        </font>
                    
                </li>
                <li>
                    
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                            Copies légalisées des diplômes obtenus et relevés de note à partir du BAC
                            </font>
                        </font>
                    
                </li>
                <li>
                    
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                            Projet d’étude ou Projet de recherche en 3 pages maximum
                            </font>
                        </font>
                    </a>
                </li>
                <li>
                    
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                            Faites trois (3) photocopies de votre dossier
                            </font>
                        </font>
                    
                </li>
                <li>
                    
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                            Frais de dossier : 20 000 FCFA
                            </font>
                        </font>
                    
                </li>
            </ul>
            <blockquote class="quote-danger">
                <h5 id="note"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Noter!</font></font></h5>
                <p>
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">
                        Les dossiers sont à uploader sur l'application web <a href="https://pbe.fondationbenianh.org/">ici</a> de la Fondation du 1er Mars au 15 Juin de l'année en cours.
                        Il est possible de déposer votre dossier sous réserve de la lettre d'admission définitive.
                        </font>
                    </font>
                </p>
            </blockquote>
        </div>

    </blockquote>
</div>
@endsection