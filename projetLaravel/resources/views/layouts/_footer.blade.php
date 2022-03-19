<div class="container-fluid mt-5 bg-gray-100">
    <div class="container">
        <footer class="py-5 hidden-print">
            <div class="row">
                <div class="col-6 col-lg-3 mb-sm-5">
                    <h5 class="ml-3">Liens Utiles</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('welcome')}}">
                                <span class="text-gray-400 hover:text-gray-500">Home</span>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('home')}}">
                                <span class="text-gray-400 hover:text-gray-500">Dashboard</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 col-lg-3 mb-sm-5">
                    <h5 class="ml-3">Autres</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('about')}}">
                                <span class="text-gray-400 hover:text-gray-500">A propos</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('contact')}}">
                                <span class="text-gray-400 hover:text-gray-500">Contact</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('politiqueConf')}}">
                                <span class="text-gray-400 hover:text-gray-500">Politique de confidentialité</span>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('condition')}}">
                                <span class="text-gray-400 hover:text-gray-500">Conditions d'utilisation</span>

                            </a>
                        </li>
                    </ul>
                </div>
                <div class="mb-5 col-lg-6">
                    <h4 class="mb-1"><i class="fa fa-bell-o"></i> Recevez toute l'actualité du site dans votre boîte
                        mail !</h4>
                    <form action="{{route('sendMailNewsletter')}}" method="POST">
                        @csrf
                        <div class="form-group ">
                            <div class="row">
                                @auth
                                <input type="hidden" name="id" value="">
                                @endif
                                <div class="mt-3 mt-lg-0 col-lg-4">
                                    <a class="btn text-white bg-red-800 hover:bg-slate-800"><button type="submit"><i class="fa fa-envelope"></i> S'abonner à la
                                            newsletter</button></a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row">
                <hr>
                <div class="col-10">
                    <p class="copyright text-gray-400 text-center mb-1 my-3">
                        Conçu avec <span class="text-2xl text-pink-400">&hearts;</span>
                        et beaucoup de <i class="fa fa-coffee" style="color: #ccc;"></i>
                        sur <span>LARAVEL</span>
                        &middot; &copy; Copyright 2022 &middot; Tous Droits Réservés. @dar322
                    </p>
                </div>
                <div class="col my-3">
                    <ul class="social-icons list-inline">
                        <li class="list-inline-item">
                            <a href="https://www.facebook.com/groups/djangodevelopersnetwork/" target="_blank">
                                <span class="hover-bg-red"><i class="fa fa-facebook"></i></span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://twitter.com/djangoproject" target="_blank">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://www.youtube.com/watch?v=F5mRW0jo-U4" target="_blank">
                                <i class="fa fa-youtube"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://github.com/amzitoire/laravelProject" target="_blank">
                                <i class="fa fa-github"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>
</div>
