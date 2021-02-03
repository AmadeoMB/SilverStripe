<div class="container">
    <div class="content-blocks blog showx">
        <section class="content">
            <div class="inline-menu-container style2 showx <% if $Blog %>dark <% end_if %>">
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
                            <li style="display:block" ><a href="$Link" title="$Title.XML">$MenuTitle.XML</a></li>
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
            <div class="block-content">
                <h1 class="block-title">$Title</h1>
                <div class="row">
                    <div class="col-md-10">
                        $Content
                        <% if $GalleryImages %>
                            <% loop $GalleryImages %>
                                <a data-fancybox="gallery" class="gallery" href="$ScaleWidth(700).URL"><img src="$FillMax(150,150).URL"></a>
                            <% end_loop %>    
                        <% end_if %>
                        <% if $Galleries %>
                            <% loop $Galleries %>
                                <h2>$Title</h2>
                                <p><b>$Description</b></p>
                                <% loop $Images %>
                                    <a data-fancybox="gallery" class="gallery" href="$ScaleWidth(700).URL"><img src="$FillMax(150,150).URL"></a>
                                <% end_loop %>    
                            <% end_loop %>    
                        <% end_if %>
                        <% if $ShowContactForm %>
                            <h2>Email us for bookings</h2>
                            $ContactForm
                        <% end_if %> 
                        <% if $ShowMap %>
                            <h2>Our Location</h2>
                            <iframe src="$SiteConfig.GoogleMapsURL" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>  
                        <% end_if %>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>