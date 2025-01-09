<?php

session_start();

require_once 'include/config.php';

if (empty($_SESSION['isLogin'])) {

    echo "<script>alert('Kindly login to proceed');location.href='index.php'</script>";
}

require_once 'include/header.php';

?>


  <!-- slider section -->
  <section class=" slider_section">
    <div id="carouselExampleIndicators" class="carousel slide vert" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="slider_box" style="background-image: url(images/guards.jpg);">
            <div class="fixed_company-detail">
              <p>
                Security Guard Company
              </p>
            </div>
            <div class="slider-detail">
              <div class="slider_detail-heading">
                <h2>
                  We Are
                </h2>
                <h1>
                  Provided law enforcement services
                </h1>
              </div>
              <div class="slider_detail-text">
                <p>
                Policing in general and specially in a metropolitan city is an extremely complex job.
                 Whereas, we consider it is our honour to be entrusted with this responsibility, 
                 we are well aware of the fact that fulfillment of expectations is not possible 
                 without the active support of the citizens.
                </p>
              </div>
              <div class="slider_detail-btn">
                <a href="">
                  <span>
                    Read More
                  </span>
                  <img src="images/arrow.png" alt="" class="ml-2" />
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="slider_box" style="background-image: url(images/banner.jpg);">
            <div class="fixed_company-detail">
              <p>
                Security Guard Company
              </p>
            </div>
            <div class="slider-detail">
              <div class="slider_detail-heading">
                <h2>
                  We Are
                </h2>
                <h1>
                  Provided law enforcement services
                </h1>
              </div>
              <div class="slider_detail-text">
                <p>
                Challenges are many; expectations are high but resources are limited.
                We have no doubt that your support will come in handy in filling this gap.
                What could be better way of supporting the police than doing some introspection and abiding by laws and rules by oneself!.
                </p>
              </div>
              <div class="slider_detail-btn">
                <a href="">
                  <span>
                    Read More
                  </span>
                  <img src="images/arrow.png" alt="" class="ml-2" />
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="slider_box" style="background-image: url(images/banner.jpg);">
            <div class="fixed_company-detail">
              <p>
                Security Guard Company
              </p>
            </div>
            <div class="slider-detail">
              <div class="slider_detail-heading">
                <h2>
                  We Are
                </h2>
                <h1>
                  Provided law enforcement services
                </h1>
              </div>
              <div class="slider_detail-text">
                <p>
                While safety of citizens with focus on women and children remains high on our priority,
                we have to pay attention towards rising number and complex nature of cyber-crimes also.
                For this, a cyber-crime police station is  working since 25/03/2017 and 8 CEN police stations also working in city.
                </p>
              </div>
              <div class="slider_detail-btn">
                <a href="">
                  <span>
                    Read More
                  </span>
                  <img src="images/arrow.png" alt="" class="ml-2" />
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </section>

  <!-- end slider section -->

  <!-- welcome section -->
  <section class="welcome_section layout_padding">
    <div class="container-fluid">
      <div class="row">
        <div class=" col-md-6">
          <div>
            <img class="img-fluid" src="images/welcome.jpg" alt="" />
          </div>
        </div>
        <div class=" col-md-6">
          <div class="welcome_detail">
            <h3>
              Welcome
            </h3>
            <h2>
             Welcome Law Enforcement Agency
            </h2>
            <p>
            Our foremost task is to raise the morale of the force so that they abhor cynicism,
             develop a positive attitude and work for the welfare of the citizen.
              Our next objective is to reduce the gestation period for the implementation of technology-driven initiatives 
              and utilization of funds especially under B-track and Megacity schemes.
            </p>
            <div class="welcome_detail-btn">
              <a href="">
                <span>
                  Read More
                </span>
                <img src="images/arrow-black.png" alt="" class="ml-2" />
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end welcome section -->



  

<?php
require_once 'include/footer.php';
?>