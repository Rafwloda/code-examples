<?php
    $image = get_sub_field('image');
    $link = get_sub_field('link');
    $title = get_sub_field('title');
    $description = get_sub_field('description');
    $items = get_sub_field('items');
    $blue_button = get_sub_field('blue_button');
?>


<section class="image-and-tabs"  data-aos="fade-up">
    <svg class="image-and-tabs__right-svg" width="505" height="1248" viewBox="0 0 505 1248" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M615.573 1208.24H615.46L615.358 1208.29C501.54 1262.45 395.36 1256.54 304.342 1214.74C213.308 1172.94 137.414 1095.21 84.241 1005.71C31.0677 916.207 0.641327 814.967 0.500489 726.171C0.359646 637.372 30.4987 561.105 98.3496 521.367C234.679 441.521 263.74 311.071 287.724 200.782L288.145 198.846C299.976 144.43 310.701 95.1029 332.616 59.2347C343.694 41.1031 357.623 26.4279 375.988 16.2818C394.356 6.13502 417.193 0.5 446.114 0.5C561.88 0.5 666.722 61.3985 742.636 151.312C818.552 241.226 865.5 360.112 865.5 475.993C865.5 591.999 860.867 775.14 827.259 929.269C810.455 1006.34 786.415 1076.11 752.12 1126.6C717.834 1177.08 673.332 1208.24 615.573 1208.24Z" stroke="#0091FF"/>
    </svg>
    <div class="container-left">
        <div class="image-and-tabs__wrapper">
            <div class="image-and-tabs__left">
                <figure class="image-and-tabs__figure">
                    <img data-src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>">
                </figure>
                <a href="<?php echo $link['url'] ?>" target="<?php echo $link['target'] ?>" class="image-and-tabs__left-button">
                    <svg height="800px" width="800px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        viewBox="0 0 504.125 504.125" xml:space="preserve">
                    <path style="fill:#3A7F0D;" d="M339.772,0c0,0,44.536,108.954-146.337,182.138C89.719,221.893,10.059,323.789,105.173,481.193
                        c7.877-70.357,41.653-225.485,186.888-260.884c0,0-135.176,50.546-147.117,279.347c69.459,9.752,232.361,16.305,280.726-125.062
                        C489.536,187.817,339.772,0,339.772,0z"/>
                    <path style="fill:#49A010;" d="M145.007,498.704c147.456-58.849,254.748-196.71,269.556-361.283C384.418,56.107,339.772,0,339.772,0
                        s44.536,108.954-146.337,182.138C89.719,221.893,10.059,323.789,105.173,481.193c7.877-70.357,41.653-225.485,186.888-260.884
                        C292.053,220.31,157.279,270.73,145.007,498.704z"/>
                    <circle style="fill:#3A7F0D;" cx="90.459" cy="171.985" r="13.785"/>
                    <g>
                        <circle style="fill:#49A010;" cx="133.782" cy="158.2" r="9.846"/>
                        <circle style="fill:#49A010;" cx="124.921" cy="64.662" r="24.615"/>
                        <circle style="fill:#49A010;" cx="200.736" cy="120.785" r="7.877"/>
                        <circle style="fill:#49A010;" cx="266.713" cy="76.477" r="22.646"/>
                    </g>
                    </svg>
                    <span><?php echo $link['title'] ?></span>
                </a>
            </div>
            <div class="image-and-tabs__right">
                <div class="our-investments-slider__heading">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <g clip-path="url(#clip0_494_501)">
                        <path d="M10 0L7.77895 7.77895L0 10L7.77895 12.2211L10 20L12.2211 12.2211L20 10L12.2211 7.77895L10 0Z" fill="#005290"/>
                        </g>
                        <defs>
                        <clipPath id="clip0_494_501">
                        <rect width="20" height="20" fill="white"/>
                        </clipPath>
                        </defs>
                    </svg>
                    <h2><?php echo $title ?></h2>
                </div>
                <div class="image-and-tabs__description">
                    <?php echo $description; ?>
                </div>
                <div class="image-and-tabs__tabs">
                    <?php foreach($items as $item) : ?>
                        <div class="image-and-tabs__tab">
                            <div class="image-and-tabs__tab-heading">
                                <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="20.5" cy="20.5" r="20" stroke="#005290"/>
                                    <path class="path" d="M21.5 14C21.5 13.7239 21.2761 13.5 21 13.5C20.7239 13.5 20.5 13.7239 20.5 14L21.5 14ZM20.5 14L20.5 27L21.5 27L21.5 14L20.5 14Z" fill="#005290"/>
                                    <path d="M14 19.5C13.7239 19.5 13.5 19.7239 13.5 20C13.5 20.2761 13.7239 20.5 14 20.5V19.5ZM14 20.5L27 20.5V19.5L14 19.5V20.5Z" fill="#005290"/>
                                </svg>
                                <h3 class="image-and-tabs__tab-title">
                                    <?php echo $item['title']; ?>
                                </h3>
                            </div>
                            <div class="image-and-tabs__tab-box">
                                <div class="image-and-tabs__tab-desc">
                                    <?php echo $item['text']; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <a class="image-and-tabs__right-link" href="<?php echo $blue_button['url'] ?>">
                    <p><?php echo $blue_button['title'] ?></p>
                    <svg xmlns="http://www.w3.org/2000/svg" width="31" height="31" viewBox="0 0 31 31" fill="none">
                        <path d="M22.7071 16.7071C23.0976 16.3166 23.0976 15.6834 22.7071 15.2929L16.3431 8.92893C15.9526 8.53841 15.3195 8.53841 14.9289 8.92893C14.5384 9.31946 14.5384 9.95262 14.9289 10.3431L20.5858 16L14.9289 21.6569C14.5384 22.0474 14.5384 22.6805 14.9289 23.0711C15.3195 23.4616 15.9526 23.4616 16.3431 23.0711L22.7071 16.7071ZM10 17L22 17L22 15L10 15L10 17Z" fill="white"/>
                        <circle cx="15.5" cy="15.5" r="15" stroke="white"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>
