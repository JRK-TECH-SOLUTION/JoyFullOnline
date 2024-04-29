<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Joyfull</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{asset('jinja/css/bootstrap.min.css')}}">
    <!-- owl css -->
    <link rel="stylesheet" href="{{asset('jinja/css/owl.carousel.min.css')}}">
    <!-- style css -->
    <link rel="stylesheet" href="{{asset('jinja/css/style.css')}}">
    <!-- responsive-->
    <link rel="stylesheet" href="{{asset('jinja/css/responsive.css')}}">
    <!-- awesome fontfamily -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->

<body class="main-layout">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="{{asset('images/logo.png')}}" alt="" /></div>
    </div>

    <div class="wrapper">
    <!-- end loader -->

     <div class="sidebar">
            <!-- Sidebar  -->
            <nav id="sidebar">

                <div id="dismiss">
                    <i class="fa fa-arrow-left"></i>
                </div>

                <ul class="list-unstyled components">

                    <li class="active">
                        <a href="index.html">Home</a>
                    </li>
                    <li>
                        <a href="about.html">About</a>
                    </li>
                    <li>
                        <a href="recipe.html">Recipe</a>
                    </li>
                    <li>
                        <a href="blog.html">Blog</a>
                    </li>
                    <li>
                        <a href="contact.html">Contact Us</a>
                    </li>
                </ul>

            </nav>
        </div>

    <div id="content">
    <!-- header -->
    <header>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="full">
                        <a class="logo" href="/"><img src="{{asset('images/logo.png')}}" style="height: 75px;width:75px;" alt="#" /></a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="full">
                        <div class="right_header_info">
                            <ul>

                                <li class="button_user"><a class="button active" href="#">Login</a><a class="button" href="#">Register</a></li>


                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- end header -->
    <!-- start slider section -->
    <div class="slider_section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div id="main_slider" class="carousel vert slide" data-ride="carousel" data-interval="5000">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="slider_cont">
                                                <h3>Discover Restaurants<br>That deliver near You</h3>
                                                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                                                <a class="main_bt_border" href="#">Order Now</a>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="slider_image full text_align_center">
                                                <img class="img-responsive" src="{{asset('jinja/images/Other_Maha Blanca - 550.PNG')}}" style="height:500px;width:500px;" alt="#" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="slider_cont">
                                                <h3>Discover Restaurants<br>That deliver near You</h3>
                                                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                                                <a class="main_bt_border" href="#">Order Now</a>
                                            </div>
                                        </div>
                                        <div class="col-md-7 full text_align_center">
                                            <div class="slider_image">
                                                <img class="img-responsive" src="{{asset('jinja/images/Packs_creamychicken - 170.PNG')}}" style="height:500px;width:500px;" alt="#" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
                                <i class="fa fa-angle-up"></i>
                            </a>
                            <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
                                <i class="fa fa-angle-down"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end slider section -->













    <!-- section -->
    <section class="resip_section">
        <div class="container">
            <div class="row">
         <div class="col-md-12">
       <div class="ourheading">
    <h2>Our Recipes</h2>
  </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="owl-carousel owl-theme">

                <div class="item">
                    <div class="product_blog_img">
                        <img src="{{asset('jinja/images/Packs_creamychicken - 170.PNG')}}" alt="#" />
                    </div>
                    <div class="product_blog_cont">
                        <h3>Homemade</h3>
                        <h4><span class="theme_color">$</span>10</h4>
                    </div>
                </div>
                <div class="item">
                    <div class="product_blog_img">
                        <img src="{{asset('jinja/images/Packs_creamychicken - 170.PNG')}}" alt="#" />
                    </div>
                    <div class="product_blog_cont">
                        <h3>Noodles</h3>
                        <h4><span class="theme_color">$</span>20</h4>
                    </div>
                </div>
                <div class="item">
                    <div class="product_blog_img">
                        <img src="{{asset('jinja/images/Packs_creamychicken - 170.PNG')}}" alt="#" />
                    </div>
                    <div class="product_blog_cont">
                        <h3>Egg</h3>
                        <h4><span class="theme_color">$</span>30</h4>
                    </div>
                </div>
                <div class="item">
                    <div class="product_blog_img">
                        <img src="{{asset('jinja/images/Packs_creamychicken - 170.PNG')}}" alt="#" />
                    </div>
                    <div class="product_blog_cont">
                        <h3>Sushi Dizzy</h3>
                        <h4><span class="theme_color">$</span>40</h4>
                    </div>
                </div>
                <div class="item">
                    <div class="product_blog_img">
                        <img src="{{asset('jinja/images/Packs_creamychicken - 170.PNG')}}" alt="#" />
                    </div>
                    <div class="product_blog_cont">
                        <h3>The Coffee Break</h3>
                        <h4><span class="theme_color">$</span>50</h4>
                    </div>
                </div>
                <div class="item">
                    <div class="product_blog_img">
                        <img src="{{asset('jinja/images/Packs_creamychicken - 170.PNG')}}" alt="#" />
                    </div>
                    <div class="product_blog_cont">
                        <h3>Homemade</h3>
                        <h4><span class="theme_color">$</span>10</h4>
                    </div>
                </div>
                <div class="item">
                    <div class="product_blog_img">
                        <img src="{{asset('jinja/images/Packs_creamychicken - 170.PNG')}}" alt="#" />
                    </div>
                    <div class="product_blog_cont">
                        <h3>Noodles</h3>
                        <h4><span class="theme_color">$</span>20</h4>
                    </div>
                </div>
                <div class="item">
                    <div class="product_blog_img">
                        <img src="{{asset('jinja/images/Packs_creamychicken - 170.PNG')}}" alt="#" />
                    </div>
                    <div class="product_blog_cont">
                        <h3>Egg</h3>
                        <h4><span class="theme_color">$</span>30</h4>
                    </div>
                </div>
                <div class="item">
                    <div class="product_blog_img">
                        <img src="{{asset('jinja/images/Packs_creamychicken - 170.PNG')}}" alt="#" />
                    </div>
                    <div class="product_blog_cont">
                        <h3>Sushi Dizzy</h3>
                        <h4><span class="theme_color">$</span>40</h4>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
</div>
</div>
</section>
<div class="bg_bg">






    </div>
    </div>
    <div class="overlay"></div>
    <!-- Javascript files-->
    <script src="{{asset('jinja/js/jquery.min.js')}}"></script>
    <script src="{{asset('jinja/js/popper.min.js')}}"></script>
    <script src="{{asset('jinja/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('jinja/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('jinja/js/custom.js')}}"></script>
     <script src="{{asset('jinja/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>

     <script src="js/jquery-3.0.0.min.js"></script>
   <script type="text/javascript">
        $(document).ready(function() {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#dismiss, .overlay').on('click', function() {
                $('#sidebar').removeClass('active');
                $('.overlay').removeClass('active');
            });

            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').addClass('active');
                $('.overlay').addClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>

    <style>
    #owl-demo .item{
        margin: 3px;
    }
    #owl-demo .item img{
        display: block;
        width: 100%;
        height: auto;
    }
    </style>


      <script>
         $(document).ready(function() {
           var owl = $('.owl-carousel');
           owl.owlCarousel({
             margin: 10,
             nav: true,
             loop: true,
             responsive: {
               0: {
                 items: 1
               },
               600: {
                 items: 2
               },
               1000: {
                 items: 5
               }
             }
           })
         })
      </script>

</body>

</html>
