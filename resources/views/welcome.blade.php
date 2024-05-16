<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Yoga Studio Template">
    <meta name="keywords" content="Yoga, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Yummy | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('homepage/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('homepage/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('homepage/css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('homepage/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('homepage/css/style.css')}}" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="container">
            <div class="logo">
                <a href="/"><img src="{{asset('images/logo.png')}}" style="height: 150px;width:150px;" alt=""></a>
            </div>
            <div class="nav-menu">
                <nav class="main-menu mobile-menu">
                    <ul>
                        <li class="active"><a href="#">Home</a></li>
                        
                        <li><a href="login">Order Online</a></li>
                    </ul>
                </nav>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Page Top Recipe Section Begin -->
    <section class="page-top-recipe">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 order-lg-2">
                    <div class="pt-recipe-item large-item">
                        <div class="pt-recipe-img set-bg" data-setbg="{{asset('homepage/images/chickenwings2.jpg')}}">
                            <i class="fa fa-plus"></i>
                        </div>
                        <div class="pt-recipe-text">
                            <h3>Special Chicken Wings</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 order-lg-1">
                    <div class="pt-recipe-item">
                        <div class="pt-recipe-img set-bg" data-setbg="{{asset('homepage/images/IMG_2484.JPG')}}">
                            <i class="fa fa-plus"></i>
                        </div>
                        <div class="pt-recipe-text">
                            <h4>Special Shainghai</h4>
                        </div>
                    </div>
                    <div class="pt-recipe-item">
                        <div class="pt-recipe-img set-bg" data-setbg="{{asset('homepage/images/chickenceasar.jpg')}}">
                            <i class="fa fa-plus"></i>
                        </div>
                        <div class="pt-recipe-text">
                            <h4>Chicken Ceasar</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 order-lg-3">
                    <div class="pt-recipe-item">
                        <div class="pt-recipe-img set-bg" data-setbg="{{asset('homepage/images/chapsuy.jpg')}}">
                            <i class="fa fa-plus"></i>
                        </div>
                        <div class="pt-recipe-text">
                            <h4>Special Chapsuy</h4>
                        </div>
                    </div>
                    <div class="pt-recipe-item">
                        <div class="pt-recipe-img set-bg" data-setbg="{{asset('homepage/images/IMG_2486.jpg')}}">
                            <i class="fa fa-plus"></i>
                        </div>
                        <div class="pt-recipe-text">
                            <h4>Bake Macaroni</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Page Top Recipe Section End -->

    <!-- Top Recipe Section Begin -->
    <section class="top-recipe spad">
        <div class="section-title">
            <h5>Top Recipes this Week</h5>
        </div>
        <div class="container po-relative">
            <div class="plus-icon">
                <i class="fa fa-plus"></i>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="top-recipe-item large-item">
                        <div class="top-recipe-img set-bg" data-setbg="{{asset('homepage/images/IMG_2486.jpg')}}">
                            <i class="fa fa-plus"></i>
                        </div>
                        <div class="top-recipe-text">
                            <div class="cat-name">Desert</div>
                            
                                <h4>Bake Macaroni</h4>
                            
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="top-recipe-item">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="top-recipe-img set-bg" data-setbg="{{asset('homepage/images/IMG_6447.jpg')}}">
                                    <i class="fa fa-plus"></i>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="top-recipe-text">
                                    <div class="cat-name">Main Course</div>
                                    
                                        <h4>Special Adobo</h4>
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="top-recipe-item">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="top-recipe-img set-bg" data-setbg="{{asset('homepage/images/IMG_2479.jpg')}}">
                                    <i class="fa fa-plus"></i>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="top-recipe-text">
                                    <div class="cat-name">Meat lover</div>
                                   
                                        <h4>Letchon Manok</h4>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="top-recipe-item">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="top-recipe-img set-bg" data-setbg="{{asset('homepage/images/IMG_6446.jpg')}}">
                                    <i class="fa fa-plus"></i>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="top-recipe-text">
                                    <div class="cat-name">Seafoods</div>
                                    
                                        <h4>Garlic Butter Shrimp</h4>
                                   
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="top-recipe-item">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="top-recipe-img set-bg" data-setbg="{{asset('homepage/images/IMG_2490.jpg')}}">
                                    <i class="fa fa-plus"></i>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="top-recipe-text">
                                    <div class="cat-name">Vegan</div>
                                    <a href="#">
                                        <h4>Tokwa</h4>
                                    </a>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Top Recipe Section End -->

    <!-- Categories Filter Section Begin -->
    
    <!-- Feature Recipe Section Begin -->
    <section class="feature-recipe">
        <div class="section-title">
            <h5>Featured Recipes</h5>
        </div>
        <div class="container po-relative">
            <div class="plus-icon">
                <i class="fa fa-plus"></i>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="fr-item">
                        <div class="fr-item-img">
                            <img src="{{asset('homepage/images/IMG_2480.jpg')}}" alt="">
                        </div>
                        <div class="fr-item-text">
                            <h4>Barbeque</h4>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="fr-item">
                        <div class="fr-item-img">
                            <img src="{{asset('homepage/images/IMG_2489.jpg')}}" alt="">
                        </div>
                        <div class="fr-item-text">
                            <h4>Special Maja</h4>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Feature Recipe Section End -->

    <!-- Footer Section Begin -->
    
    <!-- Footer Section End -->

    

    <!-- Js Plugins -->
    <script src="{{asset('homepage/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('homepage/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('homepage/js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('homepage/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('homepage/js/mixitup.min.js')}}"></script>
    <script src="{{asset('homepage/js/main.js')}}"></script>
</body>

</html>