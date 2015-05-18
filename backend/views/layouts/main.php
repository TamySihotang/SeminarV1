
<?php

use yii\helpers\Html;
use yii\widgets\Menu;
use yii\widgets\Breadcrumbs;
use yii\debug\Toolbar;
use backend\assets\AppAsset;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use backend\controllers\SiteController;
use common\models\News;
use kmergen\jssorSlider\SliderWidget;
use yii\web\JsExpression;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $content string */
/* @var $this yii\web\View */
/* @var $News common\models\News */
/* @var $News common\models\NewsSearch */
/* @var $News backend\controllers\SiteController */
/* @var $dataProvider yii\data\ActiveDataProvider */

AppAsset::register($this);


// You can use the registerAssetBundle function if you'd like
//$this->registerAssetBundle('app');
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="description" content="Fedora - Responsive Html5 Template" />
        <meta name="author" content="Linethemes - linethemes.com" />
        <meta name="keywords" content="wordpress, themes, wordpress themes, premium wordpress themes, premium themes, wordpress theme shop, free themes, wordpress templates" />
        <title>Fedora - Responsive Html5 Template</title>
        <link rel="shortcut icon" href='admin/assets/img/favico.ico'>
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href='admin/assets/img/apple-icon-114x114px.png' />
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href='admin/assets/img/apple-icon-144x144px.png' />
        <link rel="stylesheet" type="text/css" href='admin/assets/style.css' />
        <link rel="stylesheet" type="text/css" href='admin/assets/css/shortcode.css' />
        <link rel="stylesheet" type="text/css" href='admin/assets/css/woocommerce.css' />
        <link rel="stylesheet" type="text/css" href='admin/assets/css/responsive.css' />
        <link rel="stylesheet" type="text/css" href='admin/assets/3rd/font-awesome/font-awesome.css' />
        <link rel="stylesheet" type="text/css" href='admin/assets/3rd/pretty-photo/pretty-photo.css' />
        <link rel="stylesheet" type="text/css" href='admin/assets/3rd/layerslider/css/layerslider.css' />
        <link rel="stylesheet" type="text/css" href='admin/css/bootstrap.css' />
        <script type="text/javascript" src="admin/assets/3rd/jquery/jquery-core.js"></script>
        <script type="text/javascript" src="admin/assets/3rd/jquery/jquery-ui.js"></script>
        <script type="text/javascript" src="admin/assets/3rd/jquery/jquery-tinynav.js"></script>
        <script type="text/javascript" src="admin/assets/3rd/jquery/jquery-isotope.js"></script>
        <script type="text/javascript" src="admin/assets/3rd/jquery/jquery-flexslider.js"></script>
        <script type="text/javascript" src="admin/assets/3rd/jquery/jquery-countdown.js"></script>
        <script type="text/javascript" src="admin/assets/3rd/jquery/jquery-masonry.js"></script>
        <script type="text/javascript" src="admin/assets/3rd/jquery/jquery.leanModal.min.js"></script>
        <script type="text/javascript" src="admin/assets/3rd/jquery/jquery-validate.js"></script>
        <script type="text/javascript" src="admin/assets/3rd/pretty-photo/pretty-photo.js"></script>
        <script type="text/javascript" src="admin/assets/3rd/layerslider/js/greensock.js"></script>
        <script type="text/javascript" src="admin/assets/3rd/layerslider/js/layerslider_kreaturamedia_jquery.js"></script>
        <script type="text/javascript" src="admin/assets/3rd/layerslider/js/layerslider_transitions.js"></script>
        <script type="text/javascript" src="admin/assets/js/theme.js"></script>
        <!--[if IE]>
        <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
        <![endif]-->

        <script>
            (function(i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function() {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '../../../www.google-analytics.com/analytics.js', 'ga');

            ga('create', 'UA-49137267-2', 'linethemes.com');
            ga('send', 'pageview');

        </script>


    </head>
    <body>

        <header>
            <div id="tm-header-top">
                <div class="tm-wrap tm-table">
                    <div class="tm-logo">
                        <a href="index-2.html" class="tm-logo-simple">
                            <img alt="Logo" src="admin/assets/img/logo.jpg">
                        </a>
                        <a href="index-2.html" class="tm-logo-retina">
                            <img alt="Logo" width="142" height="60" src="admin/assets/img/logo%402x.jpg">
                        </a>
                    </div>

                    <div class="tm-search">
                        <form>
                            <input type="text" autocomplete="off" placeholder="Search..." name="s" class="tm-input">
                            <button role="button" type="submit" class="tm-button">Search</button>
                        </form>
                    </div>
                </div>
                <!--tm-wrap-->
            </div>
            <!--tm-header-top-->


        </dv>
        <div id="tm-header-nav" class="tm-menu-style1 tm-sticky-menu">
            <div class="tm-wrap tm-table">
                <nav class="tm-nav">
                    <ul class="tm-menu tm-menu-simple">
                        <li class="current-menu-item parent">
                            <!--<a href="index-2.html">Home</a>-->
                            <?php
                            NavBar::begin([
//                                                                    'brandLabel' => 'Seminar',
                                'brandUrl' => Yii::$app->homeUrl,
                                'options' => [
                                    'class' => 'navbar-nav navbar-fixed-top',
                                ],
                            ]);

                            if (Yii::$app->user->isGuest) {

                                $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
                                ['label' => 'Home', 'url' => ['/site/index']];
                            } else {
                                $menuItems[] = ['label' => 'Home', 'url' => ['/site/index']];
                                $menuItems[] = ['label' => 'My Paper', 'url' => ['/paper']];
                                $menuItems[] = ['label' => 'News', 'url' => ['/news']];
                                $menuItems[] = ['label' => 'MyProfil', 'url' => ['/user/view', 'id' => Yii::$app->user->identity->id]];

                                $menuItems[] = [
                                    'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                                    'url' => ['/site/logout'],
                                    'linkOptions' => ['data-method' => 'post']
                                ];
                            }
//                                                                echo Nav::widget([
//                                                                    'options' => ['class' => 'navbar-nav navbar-right'],
//                                                                    'items' => $menuItems,
//                                                                ]);
                            NavBar::end();
                            ?>    
                        </li>
                        <li class="parent">
                            <a href=<?php
                            echo Nav::widget([
                                'options' => ['class' => 'navbar-nav navbar-right'],
                                'items' => $menuItems,
                            ]);
                            ?></a>

                        </li>

                    </ul>
                </nav>

                <!--tm-nav-->
                <div class="tm-social-icons">
                    <a href="#" class="tm-icon-facebook">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a href="#" class="tm-icon-twitter">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a href="#" class="tm-icon-dribbble">
                        <i class="fa fa-dribbble"></i>
                    </a>
                </div>

                <!--tm-social-icons-->
            </div>
        </div>
        <!--tm-header-nav-->
    </header>
<!--    <div id="tm-page-body">
        <div id="tm-template-default-fullwidth" class="tm-container">-->
            <!-- it works the same with all jquery version from 1.x to 2.x -->

            <?php
            $var = url::current();
//echo $var;
            if ($var == '/advanced/backend/web/index.php?r=site%2Findex') {
                $this->beginContent('../views/layouts/slide.php');
                $this->endContent();
            }
            ?>

<!--                                    
                                    <!--TEST-->
                <div id="tm-page-body">
			<div id="tm-blog" class="tm-container tm-blog-style-list tm-wrap tm-sidebar-left">
				<div class="page-content">
					<div class="tm-content page-content-inner">
                                            <article style="text-align: justify;">
						<div class="tm-content-inner">
							
							<div class="entry-container">
								<!--<div class="time">August 13th, 2013</div>-->
								<h3>
                                                                    <?=
                                                                    Breadcrumbs::widget([
                                                                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                                                                    ])
                                                                    ?>    
                                                                    <?= $content ?>
                                                                    </h3>
							</div>
						</div>
						</article>
					
					</div>
				</div>
				<!--page-content-->
				<div class="page-sidebar">
					<aside class="widget box-white widget_nav_menu tm-list-style2">
						
						<ul >
							   <?php
                                        $News = new News;
                                        $News = News::find()->limit(5)->orderBy('date ASC')
                                                ->all();
                                        ?>
                                                    
                                                    <h1 style="font-size: 28px; padding: 5px;margin: 2.5%">News</h1>
                                    <?php foreach ($News as $New) {
                                        ?>
                                        <div style="border-bottom:2px solid #ddd; padding:3.5px;margin:5%;text-align: justify">
                                        <?= Html::a("$New->title", ['news/view', 'id' => $New->id]); ?>
                                        --
                                        <?= Html::encode(implode(' ', array_slice(explode(' ', $New->content), 0, 20))) ?>  --
                                        <!--<hr style="padding-bottom: 5px;">-->
                                        </div>
                                        <?php
                                    }//LinkPager::widget(['pagination' => $pagination]) 
                                    ?>
                                    
						</ul>
                                            <br>
						<div class="textwidget">
                                                    <h1 style="font-size: 20px; padding: 5px;margin: 2.5%">Tanggal Penting</h1>
                                    <?php foreach ($News as $New) {
                                        ?>
                                        <div style="border-bottom:3px solid #ddd; padding:3.5px;margin:5%;text-align: left">
                                        <?= Html::encode("$New->tanggal_penting", 'news/view'); ?> 
                                        <?php echo ":"; ?>
                                        <?= Html::encode(implode(' ', array_slice(explode(' ', $New->judul_tanggal_penting), 0, 20))) ?>                                        
                                        <br>
                                        </div>
                                        <?php
                                    }//LinkPager::widget(['pagination' => $pagination]) 
                                    ?>
						</div>
					</aside>
				</div>
				<!--page-sidebar-->
			</div>
                      
			<!--tm-container-->
		</div>
                                    
<!--                               SPONSOR     -->
                    <div class="coba">
                    <div class="setanimate" style=" text-align:center">
                        <div class="tm-wrap">
                            <div class="title">
                                
                                    Di dukung oleh
                                
                            </div>
                            <div class="one-third tm-animate slide-from-left">
                                <img alt="img" style="margin:30px 0" src="admin/assets/img/sample/home/comment/telkom.png">
                                <div class="tm-testimonial tm-style2">
                                    <div class="testimonial-content">
                                        <p>
                                            Telkomsel    
                                        </p>
                                    </div>
                                    <div class="info">
                                        <div class="name">
                                            <h3>- Telkomsel -</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="one-third ">
                                <img alt="img" style="margin:30px 0" src="admin/assets/img/sample/home/comment/itn.png">
                                <div class="tm-testimonial tm-style2">
                                    <div class="testimonial-content">
                                        <p>
                                            Institut Teknologi Bandung    
                                        </p>
                                    </div>
                                    <div class="info">
                                        <div class="name">
                                            <h3>- Institut Teknologi Bandung -</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="one-third last tm-animate slide-from-right">
                                <img alt="img" style="margin:30px 0" src="admin/assets/img/sample/home/comment/huawei.png">
                                <div class="tm-testimonial tm-style2">
                                    <div class="testimonial-content">
                                        <p>
                                            Huawei
                                        </p>
                                    </div>
                                    <div class="info">
                                        <div class="name">
                                            <h3>- Huawei -</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>                  

                        </div>
                    </div>
                </div>
<!--                     END OF SPONSOR              -->
                                    <!--END OF TEST-->
        

        <!--tm-page-body-default-box-->
        <div id="tm-page-footer">
            <div class="tm-sidebar-footer">
                <div class="tm-wrap">
                    <div class="tm-sidebar-footer-inner">
                        <div class="tm-column tm3">
                            
                        </div>
                        
                        
                        
                    </div>
                </div>
            </div>
        </div>
        <!--tm-page-page-footer-->
        <footer>
            <div class="tm-wrap tm-table">
                <div class="copyright">
                    <p>© Copyright - Linethemes.com - Fedora theme by Linethemes</p>
                </div>
                <div class="tm-social-icons">
                    <a class="tm-icon-facebook" href="#">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a class="tm-icon-twitter" href="#">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a class="tm-icon-dribbble" href="#">
                        <i class="fa fa-dribbble"></i>
                    </a>
                </div>
            </div>
        </footer>

        <div id="loginmodal" style="display:none;">
            <div class="header-line-bottom">
                <h3 class="tm-title">User Login</h3>
            </div>
            <form id="loginform" name="loginform" method="post">
                <p>
                    <label for="user_login">Username<br>
                        <input type="text" size="20" value="" class="input" id="user_login" name="log"></label>
                </p>     
                <p>
                    <label for="user_pass">Password<br>
                        <input type="password" size="20" value="" class="input" id="user_pass" name="pwd"></label>
                </p>

                <p class="submit">
                    <input type="submit" value="Log In" class="tm-btn hidemodal" id="wp-submit" name="wp-submit">
                </p>
            </form>
        </div>

        <!-- Go to top -->
        <a href="#" id="tm-gotop">
            <i class="fa fa-chevron-up"></i>
        </a>

        <script>
            jQuery("#layerslider").layerSlider({
                responsive: false,
                responsiveUnder: 1100,
                layersContainer: 1100,
                skin: 'v5',
                hoverPrevNext: false,
                skinsPath: 'admin/assets/3rd/layerslider/skins/'
            });
        </script>
</body>
</html>