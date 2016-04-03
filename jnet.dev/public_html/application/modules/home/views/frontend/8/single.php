
    <article id="page-detail"  class="col-sm-9 col-md-10 affix-content">

        <div class="container">

            <div class="content">
                <h1 class="page-title">
                    <a href="<?php echo ((isset($url_site) && !empty($url_site))?$url_site:base_url()) ?>">Trang Chủ</a> > <?php echo $page->page_name;?>
                </h1>
                <div class="page-content">
                    <?php echo $page->page_content;?>
                </div>
            </div>


        </div>
    </article>
