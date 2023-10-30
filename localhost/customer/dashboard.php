<?php include 'header.php'; ?>
<?php
include '../dbconnect.php';
$sql1="  SELECT * FROM tb_feedback
        LEFT JOIN tb_service ON tb_feedback.f_serviceID = tb_service.s_serviceID
        LEFT JOIN tb_customer ON tb_service.s_custID = tb_customer.c_custID
        WHERE s_typeID ='1'";
$sql2="  SELECT * FROM tb_feedback
        LEFT JOIN tb_service ON tb_feedback.f_serviceID = tb_service.s_serviceID
        LEFT JOIN tb_customer ON tb_service.s_custID = tb_customer.c_custID
        WHERE s_typeID ='2'";
$sql3="  SELECT * FROM tb_feedback
        LEFT JOIN tb_service ON tb_feedback.f_serviceID = tb_service.s_serviceID
        LEFT JOIN tb_customer ON tb_service.s_custID = tb_customer.c_custID
        WHERE s_typeID ='3'";
$sql4="  SELECT * FROM tb_feedback
        LEFT JOIN tb_service ON tb_feedback.f_serviceID = tb_service.s_serviceID
        LEFT JOIN tb_customer ON tb_service.s_custID = tb_customer.c_custID
        WHERE s_typeID ='4'";
$sql5="  SELECT * FROM tb_feedback
        LEFT JOIN tb_service ON tb_feedback.f_serviceID = tb_service.s_serviceID
        LEFT JOIN tb_customer ON tb_service.s_custID = tb_customer.c_custID
        WHERE s_typeID ='5'";
$sql6="  SELECT * FROM tb_feedback
        LEFT JOIN tb_service ON tb_feedback.f_serviceID = tb_service.s_serviceID
        LEFT JOIN tb_customer ON tb_service.s_custID = tb_customer.c_custID
        WHERE s_typeID ='6'";
$sql7="  SELECT * FROM tb_feedback
        LEFT JOIN tb_service ON tb_feedback.f_serviceID = tb_service.s_serviceID
        LEFT JOIN tb_customer ON tb_service.s_custID = tb_customer.c_custID
        WHERE s_typeID ='7'";        
$sql8="  SELECT * FROM tb_feedback
        LEFT JOIN tb_service ON tb_feedback.f_serviceID = tb_service.s_serviceID
        LEFT JOIN tb_customer ON tb_service.s_custID = tb_customer.c_custID
        WHERE s_typeID ='8'";
$result1=mysqli_query($con,$sql1);
$result2=mysqli_query($con,$sql2);
$result3=mysqli_query($con,$sql3);
$result4=mysqli_query($con,$sql4);
$result5=mysqli_query($con,$sql5);
$result6=mysqli_query($con,$sql6);
$result7=mysqli_query($con,$sql7);
$result8=mysqli_query($con,$sql8);

?> 
<!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Homepage</h4>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->

      <div class="container-fluid">
          <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">

                <div class="row" style="display:flex;">
            
                  <div class="col-lg-3 col-md-12">
                  <a href="profile.php">
                    <div class="dash1 white-box analytics-info">
                      <h3 class="box-title">Profile</h3>
                      <ul class="list-inline two-part d-flex align-items-center mb-0">
                        <li class="ms-auto">
                          <span class="counter text"><i class="fa fa-user fa-2x"></i></span>
                        </li>
                      </ul>
                    </div>
                  </a>
                  </div>
                  
                  <div class="col-lg-3 col-md-12">
                  <a href="customer.php">
                    <div class="dash2 white-box analytics-info">
                      <h3 class="box-title">Customers</h3>
                      <ul class="list-inline two-part d-flex align-items-center mb-0">
                        <li class="ms-auto">
                          <span class="counter text"><i class="fas fa-address-book fa-2x"></i></span>
                        </li>
                      </ul>
                    </div>
                  </a>
                  </div>

                  <div class="col-lg-3 col-md-12">
                  <a href="service.php">
                    <div class="dash3 white-box analytics-info">
                      <h3 class="box-title">Services</h3>
                      <ul class="list-inline two-part d-flex align-items-center mb-0">
                        <li class="ms-auto">
                          <span class="counter text"><i class="fas fa-cogs fa-2x" ></i></span>
                        </li>
                      </ul>
                    </div>
                    </a>
                  </div>

                  <div class="col-lg-3 col-md-12">
                  <a href="contact.php">
                    <div class="dash4 white-box analytics-info">
                      <h3 class="box-title">Contact Us</h3>
                      <ul class="list-inline two-part d-flex align-items-center mb-0">
                        <li class="ms-auto">
                          <span class="counter text"><i class=" fas fa-phone fa-2x"></i></span>
                        </li>
                      </ul>
                    </div>
                    </a>
                  </div>
                  
                </div>


              </div>
            </div>

            <br><br>
        <div class="container">
          <h3 class="header1">Customers Recommended Services</h3>
          <ul id="content">
            
            <li class="box">
                <a href="service.php" class="css-4rbku5 r-xyw6el r-1oji4za">
                  <div class="css-1dbjc4n r-vvn4in r-4gszlv r-kdyh1x r-da5iq2 r-1loqt21 r-132bva r-1udh08x r-bnwqim" style="background-color: rgb(255, 255, 255); background-image: url(../assets/img/airconditioning.jpg);">
                    <div class="css-1dbjc4n r-1pi2tsx r-u8s1d r-zchlnj r-ipm5af r-13qz1uu" style="background: rgba(80, 80, 80, 0.5); transition: all 300ms ease 0s;">
                    </div>
                    <div class="css-1dbjc4n r-ctyi22 r-u8s1d r-19lq7b1">
                      <div dir="auto" class="css-901oao r-jwli3a r-1sixt3s r-adyw6z r-b88u0q r-135wba7 r-15zivkp r-fdjqy7">Air Conditioning</div>
                        <div dir="auto" class="css-901oao r-jwli3a r-1sixt3s r-ubezar r-majxgm r-135wba7 r-fdjqy7"><?php
                        $total1 = 0;
                        $n1 = 0;
                        $average1 = 0;

                          while($row1 = mysqli_fetch_array($result1)){
                            $n1++;
                            $total1 += $row1['f_rating'];
                          }
                        if($n1 == 0){
                          $n1 = 1;
                          $average1 = "0.0";
                        }
                        else{
                          $average1 = round($total1/$n1,2);
                        }
    
    echo"<span class='css-901oao r-jwli3a r-1sixt3s r-ubezar r-majxgm r-135wba7 r-fdjqy7'>Customer's Rating : 
".$average1."</span>".str_repeat('<i class="fa fa-star" aria-hidden="true" style=" color: #fbc634;"></i>', $average1) ."";
                         ?>
                        </div>
                      </div>
                    </div>
                </a>
              </li>

          <li class="box">
              <a href="service.php" class="css-4rbku5 r-xyw6el r-1oji4za">
                <div class="css-1dbjc4n r-vvn4in r-4gszlv r-kdyh1x r-da5iq2 r-1loqt21 r-132bva r-1udh08x r-bnwqim" style="background-color: rgb(255, 255, 255); background-image: url(../assets/img/electrical.jpg);">
                  <div class="css-1dbjc4n r-1pi2tsx r-u8s1d r-zchlnj r-ipm5af r-13qz1uu" style="background: rgba(80, 80, 80, 0.5); transition: all 300ms ease 0s;"></div>
                  <div class="css-1dbjc4n r-ctyi22 r-u8s1d r-19lq7b1">
                    <div dir="auto" class="css-901oao r-jwli3a r-1sixt3s r-adyw6z r-b88u0q r-135wba7 r-15zivkp r-fdjqy7">Electrical & Electronic</div>
                    <div dir="auto" class="css-901oao r-jwli3a r-1sixt3s r-ubezar r-majxgm r-135wba7 r-fdjqy7"><?php
                    $total2 = 0;
                    $n2 = 0;
                      while($row2 = mysqli_fetch_array($result2)){
                        $n2++;
                        $total2 += $row2['f_rating'];
                      }
                       if($n2 == 0){
                          $n2 = 1;
                          $average2 = "0.0";
                        }
                        else{
                          $average2 = round($total2/$n2,2);
                        }
echo"<span class='css-901oao r-jwli3a r-1sixt3s r-ubezar r-majxgm r-135wba7 r-fdjqy7'>Customer's Rating : 
".$average2."</span>".str_repeat('<i class="fa fa-star" aria-hidden="true" style=" color: #fbc634;"></i>', $average2) ."";

                     ?></div>
</div>

                </div>
              </a>
          </li>

          <li class="box">
              <a href="service.php" class="css-4rbku5 r-xyw6el r-1oji4za">
                <div class="css-1dbjc4n r-vvn4in r-4gszlv r-kdyh1x r-da5iq2 r-1loqt21 r-132bva r-1udh08x r-bnwqim" style="background-color: rgb(255, 255, 255); background-image: url(../assets/img/pestcontrol.jpg);">
                  <div class="css-1dbjc4n r-1pi2tsx r-u8s1d r-zchlnj r-ipm5af r-13qz1uu" style="background: rgba(80, 80, 80, 0.5); transition: all 300ms ease 0s;"></div>
                  <div class="css-1dbjc4n r-ctyi22 r-u8s1d r-19lq7b1">
                    <div dir="auto" class="css-901oao r-jwli3a r-1sixt3s r-adyw6z r-b88u0q r-135wba7 r-15zivkp r-fdjqy7">Pest Control</div>
                    <div dir="auto" class="css-901oao r-jwli3a r-1sixt3s r-ubezar r-majxgm r-135wba7 r-fdjqy7"><?php
                    $total3 = 0;
                    $n3 = 0;
                      while($row3 = mysqli_fetch_array($result3)){
                        $n3++;
                        $total3 += $row3['f_rating'];
                      }
                       if($n3 == 0){
                          $n3 = 1;
                          $average3 = "0.0";
                        }
                        else{
                          $average3 = round($total3/$n3,2);
                        }

                        echo"<span class='css-901oao r-jwli3a r-1sixt3s r-ubezar r-majxgm r-135wba7 r-fdjqy7'>Customer's Rating : 
".$average3."</span>".str_repeat('<i class="fa fa-star" aria-hidden="true" style=" color: #fbc634;"></i>', $average3) ."";

                     ?></div>
</div>

                </div>
              </a>
            </li>

            <li class="box">
              <a href="service.php" class="css-4rbku5 r-xyw6el r-1oji4za">
                <div class="css-1dbjc4n r-vvn4in r-4gszlv r-kdyh1x r-da5iq2 r-1loqt21 r-132bva r-1udh08x r-bnwqim" style="background-color: rgb(255, 255, 255); background-image: url(../assets/img/cleaning.jpg);">
                  <div class="css-1dbjc4n r-1pi2tsx r-u8s1d r-zchlnj r-ipm5af r-13qz1uu" style="background: rgba(80, 80, 80, 0.5); transition: all 300ms ease 0s;"></div>
                  <div class="css-1dbjc4n r-ctyi22 r-u8s1d r-19lq7b1">
                    <div dir="auto" class="css-901oao r-jwli3a r-1sixt3s r-adyw6z r-b88u0q r-135wba7 r-15zivkp r-fdjqy7">Cleaning and Sanitary</div>
                    <div dir="auto" class="css-901oao r-jwli3a r-1sixt3s r-ubezar r-majxgm r-135wba7 r-fdjqy7"><?php
                    $total4 = 0;
                    $n4 = 0;
                      while($row4 = mysqli_fetch_array($result4)){
                        $n4++;
                        $total4 += $row4['f_rating'];
                      }
                       if($n4 == 0){
                          $n4 = 1;
                          $average4 = "0.0";
                        }
                        else{
                          $average4 = round($total4/$n4,2);
                        }
echo"<span class='css-901oao r-jwli3a r-1sixt3s r-ubezar r-majxgm r-135wba7 r-fdjqy7'>Customer's Rating : 
".$average4."</span>".str_repeat('<i class="fa fa-star" aria-hidden="true" style=" color: #fbc634;"></i>', $average4) ."";

                     ?></div>
                  </div>

                </div>
              </a>
          </li>

          <li class="box">
              <a href="service.php" class="css-4rbku5 r-xyw6el r-1oji4za">
                <div class="css-1dbjc4n r-vvn4in r-4gszlv r-kdyh1x r-da5iq2 r-1loqt21 r-132bva r-1udh08x r-bnwqim" style="background-color: rgb(255, 255, 255); background-image: url(../assets/img/firefighting.jpg);">
                  <div class="css-1dbjc4n r-1pi2tsx r-u8s1d r-zchlnj r-ipm5af r-13qz1uu" style="background: rgba(80, 80, 80, 0.5); transition: all 300ms ease 0s;"></div>
                  <div class="css-1dbjc4n r-ctyi22 r-u8s1d r-19lq7b1">
                    <div dir="auto" class="css-901oao r-jwli3a r-1sixt3s r-adyw6z r-b88u0q r-135wba7 r-15zivkp r-fdjqy7">Fire Fighting and Alarm System</div>
                    <div dir="auto" class="css-901oao r-jwli3a r-1sixt3s r-ubezar r-majxgm r-135wba7 r-fdjqy7"><?php
                    $total5 = 0;
                    $n5 = 0;
                      while($row5 = mysqli_fetch_array($result5)){
                        $n5++;
                        $total5 += $row5['f_rating'];
                      }
                       if($n5 == 0){
                          $n5 = 1;
                          $average5 = "0.0";
                        }
                        else{
                          $average5 = round($total5/$n5,2);
                        }

                        echo"<span class='css-901oao r-jwli3a r-1sixt3s r-ubezar r-majxgm r-135wba7 r-fdjqy7'>Customer's Rating : 
".$average5."</span>".str_repeat('<i class="fa fa-star" aria-hidden="true" style=" color: #fbc634;"></i>', $average5) ."";

                     ?></div>
</div>

                </div>
              </a>
</li>
<li class="box">
              <a href="service.php" class="css-4rbku5 r-xyw6el r-1oji4za">
                <div class="css-1dbjc4n r-vvn4in r-4gszlv r-kdyh1x r-da5iq2 r-1loqt21 r-132bva r-1udh08x r-bnwqim" style="background-color: rgb(255, 255, 255); background-image: url(../assets/img/pump.jpg);">
                  <div class="css-1dbjc4n r-1pi2tsx r-u8s1d r-zchlnj r-ipm5af r-13qz1uu" style="background: rgba(80, 80, 80, 0.5); transition: all 300ms ease 0s;"></div>
                  <div class="css-1dbjc4n r-ctyi22 r-u8s1d r-19lq7b1">
                    <div dir="auto" class="css-901oao r-jwli3a r-1sixt3s r-adyw6z r-b88u0q r-135wba7 r-15zivkp r-fdjqy7">Pump</div>
                    <div dir="auto" class="css-901oao r-jwli3a r-1sixt3s r-ubezar r-majxgm r-135wba7 r-fdjqy7"><?php
                    $total6 = 0;
                    $n6 = 0;
                      while($row6 = mysqli_fetch_array($result6)){
                        $n6++;
                        $total6 += $row6['f_rating'];
                      }
                       if($n6 == 0){
                          $n6 = 1;
                          $average6 = "0.0";
                        }
                        else{
                          $average6 = round($total6/$n6,2);
                        }
                        echo"<span class='css-901oao r-jwli3a r-1sixt3s r-ubezar r-majxgm r-135wba7 r-fdjqy7'>Customer's Rating : 
".$average6."</span>".str_repeat('<i class="fa fa-star" aria-hidden="true" style=" color: #fbc634;"></i>', $average6) ."";

                     ?></div>
</div>

                </div>
              </a>
          </li>

          <li class="box">
              <a href="service.php" class="css-4rbku5 r-xyw6el r-1oji4za">
                <div class="css-1dbjc4n r-vvn4in r-4gszlv r-kdyh1x r-da5iq2 r-1loqt21 r-132bva r-1udh08x r-bnwqim" style="background-color: rgb(255, 255, 255); background-image: url(../assets/img/sewage.jpg);">
                  <div class="css-1dbjc4n r-1pi2tsx r-u8s1d r-zchlnj r-ipm5af r-13qz1uu" style="background: rgba(80, 80, 80, 0.5); transition: all 300ms ease 0s;"></div>
                  <div class="css-1dbjc4n r-ctyi22 r-u8s1d r-19lq7b1">
                    <div dir="auto" class="css-901oao r-jwli3a r-1sixt3s r-adyw6z r-b88u0q r-135wba7 r-15zivkp r-fdjqy7">Sewage</div>
                    <div dir="auto" class="css-901oao r-jwli3a r-1sixt3s r-ubezar r-majxgm r-135wba7 r-fdjqy7"><?php
                    $total7 = 0;
                    $n7 = 0;
                      while($row7 = mysqli_fetch_array($result7)){
                        $n7++;
                        $total7 += $row7['f_rating'];
                      }
                       if($n7 == 0){
                          $n7 = 1;
                          $average7 = "0.0";
                        }
                        else{
                          $average7 = round($total7/$n7,2);
                        }
echo"<span class='css-901oao r-jwli3a r-1sixt3s r-ubezar r-majxgm r-135wba7 r-fdjqy7'>Customer's Rating : 
".$average7."</span>".str_repeat('<i class="fa fa-star" aria-hidden="true" style=" color: #fbc634;"></i>', $average7) ."";

                     ?></div>
</div>

                </div>
              </a>
            </li>
              <li class="box">
              <a href="service.php" class="css-4rbku5 r-xyw6el r-1oji4za">
                <div class="css-1dbjc4n r-vvn4in r-4gszlv r-kdyh1x r-da5iq2 r-1loqt21 r-132bva r-1udh08x r-bnwqim" style="background-color: rgb(255, 255, 255); background-image: url(../assets/img/civil.jpg);">
                  <div class="css-1dbjc4n r-1pi2tsx r-u8s1d r-zchlnj r-ipm5af r-13qz1uu" style="background: rgba(80, 80, 80, 0.5); transition: all 300ms ease 0s;"></div>
                  <div class="css-1dbjc4n r-ctyi22 r-u8s1d r-19lq7b1">
                    <div dir="auto" class="css-901oao r-jwli3a r-1sixt3s r-adyw6z r-b88u0q r-135wba7 r-15zivkp r-fdjqy7">Civil</div>
                    <div dir="auto" class="css-901oao r-jwli3a r-1sixt3s r-ubezar r-majxgm r-135wba7 r-fdjqy7"><?php
                    $total8 = 0;
                    $n8= 0;
                      while($row8 = mysqli_fetch_array($result8)){
                        $n8++;
                        $total8 += $row8['f_rating'];
                      }
                       if($n8 == 0){
                          $n8 = 1;
                          $average8 = "0.0";
                        }
                        else{
                          $average8 = round($total8/$n8,2);
                        }

                        echo"<span class='css-901oao r-jwli3a r-1sixt3s r-ubezar r-majxgm r-135wba7 r-fdjqy7'>Customer's Rating : 
".$average8."</span>".str_repeat('<i class="fa fa-star" aria-hidden="true" style=" color: #fbc634;"></i>', $average8) ."";

                     ?></div>
</div>

                </div>
              </a>
          </li>



        </div>
      </div>




      </div>


<?php include 'footer.php'?>