 <!doctype html>
 <html lang="en">

 <head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
         integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <link href="{{'css/sidebar.css'}}" rel='stylesheet' type='text/css'>
     <title>Dashboard</title>

     <!-- Optional JavaScript -->
     <!-- jQuery first, then Popper.js, then Bootstrap JS -->
     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
         integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
     </script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
         integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
     </script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
         integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
     </script>
 </head>

 <body>

     <div class="wrapper">
         <!-- Sidebar Holder -->
         <nav id="sidebar">
             <div class="sidebar-header">
                 <img src="img/paperlogowhite.svg" alt="paper logo" class="mx-auto d-block paper-logo">
             </div>

             <ul style="margin-top: 52px; margin-left: 25px;" class="list-unstyled components">
                 <li>
                     <a href="/dashboard">
                         <i style="margin-right:10px"><img src="img/finance.svg"></i>
                         <span>Dashboard</span></a>
                 </li>
                 <li>
                     <a href="/finance">
                         <i style="margin-right:10px"><img src="img/finance.svg"></i>
                         <span>Finance</span></a>
                 </li>
             </ul>

         </nav>
         <div id="content">
             <nav class="navbar navbar-expand-lg navbar-light bg-light">
                 <div class="container-fluid">
                     <div class="row">
                         <button type="button" id="sidebarCollapse" class="navbar-btn">
                             <span></span>
                             <span></span>
                             <span></span>
                         </button>
                         
                     </div>

                     <div class="row">

                         <div class="btn-group user-dropdown">
                             <button type="button" class="btn btn-user-dropdown" data-toggle="dropdown"
                                 data-display="static" aria-haspopup="true" aria-expanded="false">
                                 <i class="user-name"><img src="img/users.svg"
                                         style="margin-right: 10px;"></i>{{ Session::get('name')}}
                             </button>
                             <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                                 <div class="dropdown-item">
                                     <label>Name</label>
                                     <p>{{ Session::get('name')}}</p>
                                 </div>
                                 <div class="dropdown-item">
                                     <label>Last Login</label>
                                     <p>{{ Session::get('last_login')}}</p>
                                 </div>
                                 <div class="dropdown-item">
                                    <a class="dropdown-item" href="/logout">Logout</a>

                                </div>
                             </div>
                         </div>

                     </div>
                 </div>
             </nav>
             <h3 class="page-title">DASHBOARD</h3>
                 <div class="row">
                     <div class="col">
                         Transaction Summary
                     </div>
                     <div class="col">
                         Finance Account
                     </div>
                 </div>
             
             
         </div>
     </div>




 </body>

 <script type="text/javascript">
     $(document).ready(function () {
         $('#sidebarCollapse').on('click', function () {
             $('#sidebar').toggleClass('active');
             $(this).toggleClass('active');
         });
     });

     function myFunction() {
         document.getElementById("myDropdown").classList.toggle("show");
     }

     // Close the dropdown menu if the user clicks outside of it
     window.onclick = function (event) {
         if (!event.target.matches('.dropbtn')) {
             var dropdowns = document.getElementsByClassName("dropdown-content");
             var i;
             for (i = 0; i < dropdowns.length; i++) {
                 var openDropdown = dropdowns[i];
                 if (openDropdown.classList.contains('show')) {
                     openDropdown.classList.remove('show');
                 }
             }
         }
     }

 </script>

 </html>
