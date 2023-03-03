<div class="banner_bg_main">
         <div class="container">
         </div>
         <div class="logo_section">
            <div class="container">
               <div class="row">
                  <div class="col-sm-12">
                     <!--div class="logo"> <img src="../images/logo.png"> </div>-->
                     <div class="banner_taital"><a class="nomeloja" href="index.php">NATKOS</a></div>
                     <br><br>
                  </div>
               </div>
            </div>
         </div>
         <div class="header_section">
            <div class="container">
               <div class="containt_main">
                  <div id="mySidenav" class="sidenav">
                     <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                     <a href="index.php">Home</a>
                     <a href="addProduto.php">Adicionar novos produtos</a>
                     <a href="ExibirProd.php">Lista de Produtos</a>
                  </div>
                  <div id="mySideUsu" class="sideusu">
                     <a href="javascript:void(0)" class="closebtn" onclick="closeUsu()">&times;</a>
                     <a style="color:white">Bem Vindo, <?php echo $_SESSION["nomeUsuario"]; ?></a>
                     <a href="sair.php">Logout</a>
                  </div>
                  <span class="toggle_icon" onclick="openNav()"><img src="../images/toggle-icon.png"></span>
                  <div class="dropdown">
                  </div>
                  <div class="main">
                     <div class="input-group">

                     <!--pesquisa-->
                        <input type="search" class="form-control" placeholder="Pesquise Aqui!" id="pesquisar">
                        <div class="input-group-append">
                           <button class="btn btn-secondary" onclick="searchData()" type="button" style="background-color: #00c53b; border-color:#00c53b ">
                           <i class="fa fa-search"></i>
                           </button>
                        </div>
                     </div>
                  </div>
                  <div class="header_box">
                     <div class="lang_box ">
                        <a href="#" title="Language" class="nav-link" data-toggle="dropdown" aria-expanded="true">
                        <img src="../images/brasil.png" alt="flag"  height="10px" class="mr-2 " title="United Kingdom"> Portugues <i class="fa fa-angle-down ml-2" aria-hidden="true"></i>
                        </a>
                        <div class="dropdown-menu ">
            
                           <a href="#" class="dropdown-item">
                           <img src="../images/flag-uk.png" class="mr-2" alt="flag">
                           English
                           </a>
                        </div>
                     </div>
                     <div class="login_menu">
                        <ul class="banner_taital">
                           <li><a href="carrinho.php">
                              <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                              <span>ㅤCarrinho</span></a>
                           </li>
                           <li>
                              <a onclick="openUsu()" href="#">
                              <?php
                              if (isset($_SESSION["nomeUsuario"])) {
                              ?>
                              <span class="fa fa-user" aria-hidden="true" class="padding_10">ㅤ<?php echo $_SESSION["nomeUsuario"]; ?></span>
                              <?php
                              } else {
                              ?>
                              <a class="fa fa-user" aria-hidden="true" class="padding_10" href="loginhome.php">ㅤFAZER LOGIN</a>
                              <?php
                              }
                              ?>
                              </a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <script>
            var search = document.getElementById('pesquisar');
         
            search.addEventListener("keydown", function(event){
               if (event.key === "Enter"){
                  searchData();
               }
            });         

            function searchData()
            {
               window.location = 'index.php?search='+search.value; 
            }
         </script>
         
      