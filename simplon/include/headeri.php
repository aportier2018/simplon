<header>
  <!-- Top Bar -->
  <div class="top_bar">
    <div class="top_bar_container">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="top_bar_content d-flex flex-row align-items-center justify-content-start">
              <ul class="top_bar_contact_list">
                <li></i><div class="question">Apprendre ?</div></li>
                <li>
                  <div>Proposer un Projet ?</div>
                </li>
                <li>
                  <div>Engager un stagiaire ?</div>
                </li>
                <li>
                  <div>Nous aider ?</div>
                </li>
                <li>
                  <div>Nos Projets et Cours</div>
                </li>
              </ul>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Header Content -->
  <div class="header_container">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="header_content d-flex flex-row align-items-center justify-content-start">
            <div class="logo_container">
              <a href="#">
                <div class="logo_simplon"></div>
              </a>
            </div>
            <nav class="main_nav_contaner">
              <ul class="main_nav">
                <li <?php if ($idpage == "index"){echo 'class="active"';} ?>><a href="index.php">Accueil</a></li>
                <li><a href="simplon/about.php">A propos de nous</a></li>
                <li><a href="simplon/blog.php">Blog</a></li>
                <li><a href="simplon/article.php">Article</a></li>
                <li><a href="simplon/contact.php">Contact</a></li>
                <li><a href="simplon/form_ajout_art.php">Ajouter un article</a></li>
              </ul>
              <!-- <div class="search_button"><i class="fa fa-search" aria-hidden="true"></i></div>

               Hamburger -->

              <!-- <div class="shopping_cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></div>
              <div class="hamburger menu_mm">
                <i class="fa fa-bars menu_mm" aria-hidden="true"></i>
              </div> -->
            </nav>

          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Header Search Panel -->
  <!-- <div class="header_search_container">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="header_search_content d-flex flex-row align-items-center justify-content-end">
            <form action="#" class="header_search_form">
              <input type="search" class="search_input" placeholder="Search" required="required">
              <button class="header_search_button d-flex flex-column align-items-center justify-content-center">
                <i class="fa fa-search" aria-hidden="true"></i>
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div> -->
  <!-- Menu -->

  <div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
    <div class="menu_close_container"><div class="menu_close"><div></div><div></div></div></div>
    <!-- <div class="search">
      <form action="#" class="header_search_form menu_mm">
        <input type="search" class="search_input menu_mm" placeholder="Search" required="required">
        <button class="header_search_button d-flex flex-column align-items-center justify-content-center menu_mm">
          <i class="fa fa-search menu_mm" aria-hidden="true"></i>
        </button>
      </form>
    </div> -->
    <nav class="menu_nav">
      <ul class="menu_mm">
        <li class="menu_mm"><a href="#">Accueil</a></li>
        <li class="menu_mm"><a href="#">A propos de nous</a></li>
        <li class="menu_mm"><a href="#">Blog</a></li>
        <li class="menu_mm"><a href="#">Contact</a></li>
      </ul>
    </nav>
  </div>
</header>
