<x-app-layout>
    <!--  -->
    <!--  -->
  <div class="card text-center">
    
   <div class="card-body container-fluid">
  
        <div class="">
                <!-- <img class="card-img " style="height: 500px;" src="{{ asset('images/img1.jpg') }}" alt=""> -->
                <img class="card-img " style="height: 500px;" src="{{ asset('images/img1.jpg') }}" alt="">

                <div class="card-img-overlay">
                    
                       <h1 class="text-primary">APPLICATION de GESTION DE PROJETS DE FIN D'ETUDES</h1>
                
                       <div class="row">
                            <div class="col-md-4">
                             <p><a class="btn btn-info  text-sm text-primary -600" href="route('choix.index')">Voir</a></p>

                            </div>
                       </div>
                 </div>
         </div>
            <!--  -->
               <!-- <div class="row">
                            <div class=" card col-md-4">
                                <p class="card-body btn btn-success text-light "  href="{{ route('choix.mesEtudiants') }}">Sujet à validés</p>
                            </div>
                             <div class=" card col-md-4">
                                <p class="card-body btn btn-success text-light "  href="{{ route('choix.mesEtudiants') }}">Choix à validés</p>
                            </div>
                             <div class=" card col-md-4">
                                <p class="card-body btn btn-success text-light "  href="{{ route('choix.mesEtudiants') }}">Mémoires à valides</p>
                            </div>
                             <div class=" card col-md-4">
                                <p class="card-body btn btn-success text-light "  href="{{ route('choix.mesEtudiants') }}">Mes étudiants</p>
                            </div>
                             <div class=" card col-md-4">
                                <p class="card-body btn btn-success text-light "  href="{{ route('choix.mesEtudiants') }}">Liste des choix</p>
                            </div>
                        
                </div> -->
            <!--  -->
      
<footer id="footer" class="py- bg-info text-light">
    <div class="footer-main">
        <div class="container">
            <div class="row">
    
                <div class="col-md-3">
                    <div class="footer-nav">
                        <h4>Liens utiles</h4>
                        <ul>
                           <li><a href="http://www.estm.sn">ESTM</a></li>
                            <!-- <li><a href="http://alumni.estm.sn">ALUMNI</a></li> -->
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="social-media">
                        <h4>Suivez-nous</h4>
                        <ul>
                            <li class="smedia-01">
                                <a href="https://www.facebook.com/EstmSN" target="_blank">
                                    <span class="media-icon">
                                    <i class="fa fa-facebook-f"></i>
                                    </span>
                                    <span class="media-name">Facebook</span>
                                </a>
                            </li>

                            <!-- <li class="smedia-02">
                                <a href="https://twitter.com/mlgoudiaby" target="_blank">
                                    <span class="media-icon">
                                    <i class="fa fa-twitter"></i>
                                    </span>
                                    <span class="media-name">Twitter</span>
                                </a>
                            </li> -->

                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="footer-contact">
                        <h4>Contact</h4>
                        <!-- <p>Dakar - Avenue Cheikh Anta Diop en face hôpital Fann</p> -->
                            <p><i class="fa fa-phone-square"></i>Téléphone: +221 33 825 28 89</p>

                            <p><i class="fa fa-envelope"></i>
                            <!-- Courriel : <a class="mail-link" href="mailto:estm@estm.sn">estm@estm.sn</a> -->
                            </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="footer-foot">
    <div class="container">Copyright © 2019 - Développé par BALDE & RAOUF.</div>
</div>

</footer>
</div>
    </div>
</x-app-layout>
