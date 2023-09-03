<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="{{ route('home') }}" class="logo">Ferhat<em> MOTORS</em></a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="{{ route('home') }}" class="active">Anasayfa</a></li>
                        <li><a href="{{ route('adverts') }}">Araçlar</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Kurumsal</a>

                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="about.html">Hakkımızda</a>
                                <a class="dropdown-item" href="blog.html">Blog</a>
                                <a class="dropdown-item" href="faq.html">FAQ</a>
                                <a class="dropdown-item" href="terms.html">Terms</a>
                            </div>
                        </li>
                        <li><a href="{{ route('contact') }}">İletişim</a></li>

                        <li><a href="tel:5538610029" class="active font-weight-bold">0553 861 0029</a></li>
                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->
