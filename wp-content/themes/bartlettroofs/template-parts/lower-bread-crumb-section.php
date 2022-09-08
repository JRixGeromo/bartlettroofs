<?php
    $uri_segments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    $url1 = '/'.$uri_segments[1];
    $url2 = '/'.$uri_segments[1].'/'.$uri_segments[2];
    $url3 = '/'.$uri_segments[1].'/'.$uri_segments[2].'/'.$uri_segments[3];
?>
<div class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb" itemscope="" itemtype="http://schema.org/BreadcrumbList">
            <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                <a itemprop="item" href="<?php echo $url1 ?>">
                    <span class="hidden-lg">
                        <i class="fas fa-home" aria-hidden="true"></i>
                    </span>
                    <span class="visible-lg" itemprop="name">Home</span>
                </a>
                <meta itemprop="position" content="1">
            </li>
            <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                <a itemprop="item" href="<?php echo $url2 ?>">
                    <span itemprop="name"><?php the_field('bread_crumb_1') ?></span>
                </a>
                <meta itemprop="position" content="2">
            </li>
            <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                <a itemprop="item" href="<?php echo $url3 ?>">
                    <span itemprop="name"><?php the_field('bread_crumb_2') ?></span>
                </a>
                <meta itemprop="position" content="2">
            </li>
        </ol>
    </div>
</div>