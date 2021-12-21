<?php 
  session_start();
include'connection/dbconnector.php';


?>
<!DOCTYPE html>
    <head>
          <title>HC APPLICATION</title>
          <link rel="stylesheet" type="text/css"  href="css/bootstrap.css">

          <style type="text/css">
      tr[data-id]{
        cursor: pointer;
      }
    </style>
      </head>
        <body>
          <div class="container">
          <h3> HEALTHY CARE SYSTEM</h3>
         
      <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link <?php if (!isset($_SESSION['sr'])){
              echo 'show active';}?>" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#dashboarddashboard" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Dashboard</button>
        </li>


        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#addpeople" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">  Add Tested/Vacceneted People</button>
        </li>


        <li class="nav-item" role="presentation">
            <button class="nav-link <?php if (isset($_SESSION['sr'])){
              echo 'active';}?>" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#search" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Search For People</button>
        </li>
    </ul>
          <div class="tab-content" id="pills-tabContent">
                  <div class="tab-pane fade <?php if (!isset($_SESSION['sr'])){
                      echo 'show active';}?>" id="dashboard" role="tabpanel" aria-labelledby="pills-home-tab">
                  
                  <h4>Dashboard</h4>

                        <!-- Button trigger HIV/AIDSdmodal -->
                      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#hiv">
                     HIV/AIDS
                      </button>

                       <!-- Modal HIV/AIDS-->
                        <div class="modal fade" id="hiv" tabindex="-1" aria-labelledby="hivModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="hivModalLabel">Details About HIV/AIDS</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>

                              <div class="modal-body">

                                
                                <h4>Causes Of HIV/AIDS</h4>
                            <ol class="list-group list-group-numbered">
                            <li class="list-group-item">A list item</li>
                            <li class="list-group-item">A list item</li>
                            <li class="list-group-item">A list item</li>
                          </ol>


                              </div>
                              
                            </div>
                          </div>
                        </div>


                     
                            <!-- Button trigger COVID-19dmodal -->
                      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#covid">
                     HIV/AIDS
                      </button>

                       <!-- Modal COVID-19-->
                        <div class="modal fade" id="covid" tabindex="-1" aria-labelledby="covidModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="covidModalLabel">Details About COVID-19</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>

                              <div class="modal-body">

                                
                                <h4>Causes Of Covid-19</h4>
                              <ol class="list-group list-group-numbered">
                              <li class="list-group-item">A list item</li>
                              <li class="list-group-item">A list item</li>
                              <li class="list-group-item">A list item</li>
                            </ol>
                             
                             <h4>Measures and Precaustions</h4>
                                <ol class="list-group list-group-numbered">
                              <li class="list-group-item">A list item</li>
                              <li class="list-group-item">A list item</li>
                              <li class="list-group-item">A list item</li>
                              <li class="list-group-item">A list item</li>
                              <li class="list-group-item">A list item</li>
                              <li class="list-group-item">A list item</li>
                              

                            </ol>


                              </div>
                              
                            </div>
                          </div>
                        </div>


                              <!-- Button trigger modal Add categories-->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#category">
                            Add Category
                            </button>

                            <!-- ModalAdd categories -->
                            <div class="modal fade" id="category" tabindex="-1" aria-labelledby="category" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="category">Add Category Here </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                   
                                      <form action="server.php" method="POST">
                                  <input type="text" name="ct_name" placeholder=" Category Name" class="form-control">
                                  <input type="text" name="ct_descr" placeholder="Description" class="form-control">
                                  <br>
                                  <input type="submit" name="ctn" value="save" data-bs-dismiss="modal" class="btn btn-primary">

                                </form>



                                  </div>
                                  
                                </div>
                              </div>
                            </div>


                            <!-- Button trigger modal Enrollment-->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#enroll">
                             Enroll Now
                            </button>

                            <!-- ModalEnrollment -->
                            <div class="modal fade" id="enroll" tabindex="-1" aria-labelledby="enrollModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="enrollModalLabel">Enroll Now</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                

                                    <form action="server.php" method="POST">
                                  <select class="form-select" aria-label="Default select example" name="slctp">
                                  <option selected> Select Person</option>
                                  <?php
                                    //data for selecting tag
                                    $dfst=$dbc->prepare("SELECT * 
                                      FROM people");
                                    $dfst->execute();
                                    foreach ($dfst as $datas) {

                                      ?>

                                  <option value="<?php echo $datas[0];?>"><?php echo $datas[1];?></option>
                                 <?php 
                                    } 
                                  ?>
                                </select>
                                

                                

                                <select class="form-select" aria-label="Default select example" name="prsID">
                                  <option selected> Select Category</option>


                                  <?php
                                  //data for stream 
                                     $dfsream= $dbc->prepare("SELECT *
                                                           FROM categories");
                                     $dfsream->execute();
                                     foreach ($dfsream as $streaminfo) {
                                      
                                     ?>

                                  <option value="<?php echo $streaminfo[0];?>"> <?php echo $streaminfo[1];?></option>

                                  <?php 
                                      }

                                  ?>
                                  
                                </select>
                                <input type="date" name="dateEnrolled" class="form-control">
                                  <br>
                                  <input type="submit" name="enp" value="enroll" data-bs-dismiss="modal" class="btn btn-primary">

                                </form>




                                  
                                  </div>
                                  
                                </div>
                              </div>
                            </div>





                  
                                          <!-- Button trigger modal See All People-->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#person">
                              All People
                            </button>

                            <!-- ModalSee All People -->
                            <div class="modal fade" id="person" tabindex="-1" aria-labelledby="personModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="personModalLabel">See All People Here</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    
                                   <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Full Name</th>
                                    <th scope="col">Location</th>
                                  </tr>

                                </thead>
                                <tbody>

                                  <?php 
                                    $info= $dbc->prepare("SELECT * FROM people");
                                    $info->execute();
                          foreach ($info as $row ) {
                  
                                 
                                  ?>
                                  <tr>
                                    <th scope="row"> <?php print $row[0];?> </th>
                                    <td> <?php print $row[1]; ?> </td>
                                    <td> <?php print $row[2]; ?> </td>
                                  </tr>

                              <?php }?>
                                  
                                </tbody>
                              </table>



                                  </div>
                                  
                                </div>
                              </div>
                            </div>


                                      <table class="table">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Full name</th>
                              <th scope="col">Categories</th>
                            
                              
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                               //$info=$dba->prepare("SELECT s.name, c.s_name, e.e_year_enrolled FROM students as s INNER JOIN enrolment as e ON e.e_student_id = s.id INNER JOIN stream as c ON e.e_stream_id = c.s_id");

                               $info=$dbc->prepare("SELECT p.name, COUNT(*) as `numbers of Categories`, p.id FROM people as p INNER JOIN enrollment as e ON e.e_person_id = p.id INNER JOIN categories as c ON c.c_id = e.e_category_id GROUP BY e.e_person_id");


                                 $info->execute();
                                 $co=1;
                                 foreach ($info as $row) {
                                 
                                  ?>
                             <tr data-id="<?php print $row[2]; ?>">
                              <th scope="row"> <?php print $co; ?></th>
                              <td> <?php print $row[0]; ?> </td>
                              <td> <?php print $row[1];?> </td>
                            
                              </tr>
                              <?php $co++; }?>

                            
                          </tbody>
                        </table>




                </div>

            <div class="tab-pane fade" id="addpeople" role="tabpanel" aria-labelledby="pills-profile-tab">

              <h4>Add New Tested/Vacceneted People</h4>
                  <form action="server.php" method="POST">
                    <input type="text" name="name" class="form-control" placeholder="Provide name">
                    <input type="text" name="location" class="form-control" placeholder="Provide Location">
                    <br>
                    <input type="submit" name="ans" value="submit" class="btn btn-primary">
                    

                  </form>
            
          </div>


          <div class="tab-pane fade <?php if (isset($_SESSION['sr'])){
              echo 'show active';}?>" id="search" role="tabpanel" aria-labelledby="pills-contact-tab">
          
                <h4>Search person From Database</h4>
                <form action="server.php" method="POST">
                  <input type="text" name="search" placeholder="Search For People" <?php if (isset($_SESSION['sp'])) {

                    echo "value=\"".$_SESSION['sp']."\"";}?>>
                  <input type="submit" name="searchp" value="search" class="btn btn-primary">
                  </form>
                  <?php if (isset($_SESSION['sr'])){?>
                    <p>Your Search Result For <b><?php echo $_SESSION['sp'];?> is: </b></p>

                  <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Full name</th>
                      <th scope="col">Location</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      
                        foreach ($_SESSION['sr'] as $row) {
                          
                     ?>
                    <tr>
                      <th scope="row"> <?php print $row[0]?> </th>
                      <td> <?php print $row[1]?> </td>
                      <td> <?php print $row[2]?> </td>
                      </tr>
                      <?php  }
                      ?>
                  </tbody>
                </table>

                <?php unset($_SESSION['sr']);
                      unset($_SESSION['sp']) ; }?>


         </div>
        </div>
        <!-- Modal -->
      <?php if (isset($_SESSION['Notification'])) {

      ?>
      <div class="modal fade" id="notify" tabindex="-1" aria-labelledby="details" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="details">Notification</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

              <?php echo $_SESSION["Notification"];
              ?>
            </div>
         </div>
      </div>
      </div>
      <?php
      unset($_SESSION['Notification']);
        }

      ?>


      <?php if (isset($_SESSION['categories'])) {

      ?>
      <div class="modal fade" id="notify" tabindex="-1" aria-labelledby="details" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="details">CATEGORIES</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <table class="table">
                <thead>
                  <th>
                   Categories
                  </th>
                  <th>Day enrolled</th>

                </thead>
                
                <?php foreach ($_SESSION["categories"] as $rowinfo): ?>
                
                <tr>
                  <td> <?php echo $rowinfo[0] ?> </td>
                  <td> <?php echo $rowinfo[1] ?> </td>

                </tr>


                <?php endforeach ?>

              </table>

             </div>
         </div>
      </div>
      </div>
      <?php
      unset($_SESSION['categories']);
        }

      ?>




  </div>
  
  <script type="text/javascript" src="js/jquery.js"> </script>
  <script type="text/javascript" src="js/bootstrap.js"> </script>
  <script type="text/javascript">
    
      $(window).on('load', function(){
      $('#notify').modal('show');});

      $('tr[data-id]').click(function(){
      window.location= "server.php?pid=" +$(this).data("id");

      //alert($(this).data("id"));
    });

  </script>
  
  </body>
</html>