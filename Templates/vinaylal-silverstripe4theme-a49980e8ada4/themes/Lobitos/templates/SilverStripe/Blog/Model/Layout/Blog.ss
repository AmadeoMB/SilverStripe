<div class="container">
    <div class="content-blocks blog showx">
        <section class="content">
            <div class="block-content">
                <h1 class="block-title">$Title</h1>
                <div class="row">
                    <div class="col-md-10">
                        <% loop $getBlogs %>
                            <div class="post">
                                <div class="post-thumbnail">
                                    <a href="$Link"><h3 class="block-title">$Title</h3></a>
                                    <a href="$Link">
                                        <img src="$FeaturedImage.FitMax(768,575).URL" alt="$FeaturedImage.Title">
                                    </a>
                                </div>
                                <div class="post-title">
                                    <p class="post-info">
                                        <span class="post-author">Posted by Vinay Lal</span>
                                        <span class="slash"></span>
                                        <span class="post-date">$PublishDate.Nice</span>
                                        
                                        <% if $Categories.exists %>
                                            <span class="slash"></span>
                                            <%t SilverStripe\\Blog\\Model\\Blog.PostedIn "Posted in" %>
                                            <% loop $Categories %>
                                                <a href="$Link" title="$Title">$Title</a>
                                                <span class="post-catetory">
                                                    <a href="$Link" title="$Title">$Title</a>
                                                </span><% if not Last %>, <% else %>;<% end_if %>
                                            <% end_loop %>
                                        <% end_if %>
                                    </p>
                                </div>
                                <div class="post-body">
                                    $Summary                                     
                                </div>
                            </div>
                        <% end_loop %>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>