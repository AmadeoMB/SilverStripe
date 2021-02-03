<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=$SiteConfig.GATracking"></script> -->
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', '$SiteConfig.GATracking');
        </script>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>$Title | $SiteConfig.Title</title>
        <meta name="description" content="$MetaDescription">
        <meta name="author" content="LionCoders" />
        <link rel="icon" href="$ThemeDir/favicon.ico" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
        <link rel="stylesheet" href="$ThemeDir/css/plugins.min.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="$ThemeDir/css/style.css" type="text/css" media="screen" />
        <% if $GalleryImages || $Galleries %>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.2/dist/jquery.fancybox.min.css" />
        <% end_if %>
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2&appId=702583676782987&autoLogAppEvents=1';
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
    </head>

    <body class="menu2 $ClassName">
        <div id="google_translate_element"></div><script type="text/javascript">
            function() {}unction googleTranslateElementInit() {
              new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.FloatPosition.BOTTOM_LEFT}, 'google_translate_element');
            }
        </script>
        <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        <div class="preloader">
            <div class="anim pulse"><i class="ion-ios-bolt-outline"></i></div>
        </div>
        <div class="preloader-left"></div>
        <div class="inline-menu-container style2 showx <% if $Blog %>dark <% end_if %>">
            <% if $SiteConfig.Logo %>
                <% loop $SiteConfig.Logo %>
                    <a href="$BaseHref"><img alt="Logo" src="$ScaleWidth(150).URL"/></a>
                <% end_loop %>
            <% else %>
                <a href="$BaseHref"><h3 class="logoH3">$SiteConfig.Title</h3></a>
            <% end_if %>
            <ul class="inline-menu">

                <input id="main-menu-checkbox" type="checkbox">

                <header>
                  <label for="main-menu-checkbox" class="menu-toggle">
                    <span style="top:0"></span>
                    <span style="top:10px" class="fa fa-bars" aria-hidden="true"></span>
                    <span style="top:20px" class=""></span>
                  </label>

                  <nav id="main-menu" role="navigation" class="main-menu" aria-expanded="false" aria-label="Main menu">
                    <label for="main-menu-checkbox"class="menu-close">
                      <span class="">X</span>
                      <span class="fa fa-close" aria-hidden="true"></span>
                    </label>
                    <ul>
                    <% loop $Menu(1) %>
                        <li style="display:block; color: black">$MenuTitle</li>
                    <% end_loop %>
                    </ul>
                  </nav>
                  <label for="main-menu-checkbox"
                     class="backdrop"
                     tabindex="-1"
                     aria-hidden="true" hidden></label>
                </header>
            </ul>
        </div>
        <section class="home" style="background: url($SiteConfig.BackgroundImage.URL); background-size: cover">
            <div class="overlay opacity3"></div>
            <div class="container">
                <div class="name-block reverse">
                    <div class="name-block-container reverse">

                        <% if $ClassName == "HomePage" %>
                            <h1>$SiteConfig.HomePageHeading1<br></h1>
                            <h2>$SiteConfig.HomePageHeading2 $SiteConfig.HomePageHeading3</h2>
                        <% else %>
                            <h2>$SiteConfig.HomePageHeading2</h2>
                        <% end_if %>

                        <% if $ClassName == "HomePage" %>

                        <% else_if $SiteConfig.HomePageHeading3 %>
                            <h2>$SiteConfig.HomePageHeading3</h2>
                        <% end_if %>

                        <% if $SiteConfig.HomePageHeading4 %>
                            <h2>$SiteConfig.HomePageHeading4</h2>
                        <% end_if %>

                        <ul class="CallToActions">
                            <% loop $getHomePageButtons %>
                                <li ><a class="breadcrumb" href="$Link">$LinkText</a></li>
                            <% end_loop %>
                        </ul>
                        <ul class="CallToActionsMobile">
                            <% loop $getHomePageButtons.Limit(2) %>
                                <li ><a class="breadcrumb" href="$Link">$LinkText</a></li>
                            <% end_loop %>
                        </ul>
                        $Layout
                        $Form
                    </div>
                </div>
            </div>
        </section>
        <script src="$ThemeDir/javascript/plugins.min.js"></script>
        <script src="$ThemeDir/javascript/main.js"></script>
        <% if $GalleryImages || $Galleries %>
            <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.2/dist/jquery.fancybox.min.js"></script>
        <% end_if %>
    </body>

</html>
