<?php

    $title = get_sub_field('title');
    $text = get_sub_field('text');
    $items = get_sub_field('items');
    $button = get_sub_field('button');
    $last_item_title = get_sub_field('last_item_title');
    $last_item_link = get_sub_field('last_item_link');

?>

<section class="slider-realizations">
    <div class="container">
        <div class="slider-realizations__heading">
            <div class="slider-realizations__heading-content">
                <?php if ($title): ?>
                    <h2 class="slider-realizations__title"><?php echo $title ?></h2>
                <?php endif; ?>
                <?php if ($text): ?>
                    <div class="slider-realizations__text">
                        <?php echo $text ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="slider-realizations__buttons">
                <div class="controls">
                    <button class="controls__prev swiper-button-prev">
                        <svg width="12" height="22" viewBox="0 0 12 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.245083 11.3485L10.1969 21.2728C10.523 21.5978 11.0509 21.5972 11.3764 21.2711C11.7017 20.9451 11.7008 20.4169 11.3747 20.0916L2.01524 10.758L11.375 1.42444C11.7011 1.09918 11.7019 0.571318 11.3767 0.245216C11.2136 0.0817451 10.9998 7.51998e-06 10.786 7.48227e-06C10.5728 7.44466e-06 10.3598 0.0811975 10.197 0.243534L0.245083 10.1676C0.0880418 10.3238 -8.15402e-05 10.5365 -8.15498e-05 10.758C-8.15594e-05 10.9796 0.0882945 11.192 0.245083 11.3485Z" fill="#747474"/>
                        </svg>
                    </button>
                  <button class="controls__next swiper-button-next">
                      <svg width="12" height="22" viewBox="0 0 12 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M11.6153 10.1676L1.66344 0.243312C1.33737 -0.0816562 0.809475 -0.0811099 0.483961 0.244993C0.158699 0.571053 0.15954 1.09925 0.485642 1.42447L9.84512 10.7581L0.485306 20.0917C0.159245 20.417 0.158405 20.9448 0.483625 21.2709C0.646802 21.4344 0.860576 21.5161 1.07435 21.5161C1.28758 21.5161 1.50051 21.4349 1.66339 21.2726L11.6153 11.3485C11.7723 11.1923 11.8604 10.9796 11.8604 10.7581C11.8604 10.5366 11.7721 10.3242 11.6153 10.1676Z" fill="#747474"/>
                      </svg>
                  </button>
                </div>
            </div>
        </div>
    </div>
    <div class="slider-realizations__container">
        <div class="slider-realizations__wrapper">
            <div class="slider-realizations__slider swiper">
                <div class="swiper-wrapper">
                    <?php foreach($items as $item): ?>
                        <a href="<?php echo $item['item']['link'] ?>" class="slider-realizations__slide swiper-slide">
                            <figure class="slider-realizations__video">
                                <?php if($item['item']['video_or_image'] == 'video'): ?>
                                <video data-src="<?php echo $item['item']['video']['url'] ?>" autoplay muted loop playsinline></video>
                                <?php else: ?>
                                <img src="<?php echo $item['item']['image']['url'] ?>" alt="<?php echo $item['item']['image']['alt'] ?>">
                                <?php endif; ?>
                            </figure>
                            <h3><?php echo $item['item']['title'] ?></h3>
                            <div class="slider-realizations__tags">
                                <?php if ($item['item']['tags']): ?>
                                    <?php foreach($item['item']['tags'] as $item): ?>
                                        <span><?php echo $item['text'] ?></span>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </a>
                    <?php endforeach; ?>
                    <?php if ($last_item_link): ?>
                        <a href="<?php echo $last_item_link['url'] ?>" class="slider-realizations__last-item swiper-slide">
                            <div class="slider-realizations__last-item-box">
                                <div class="slider-realizations__last-item-content">
                                    <h3><?php echo $last_item_title ?></h3>
                                    <div class="slider-realizations__button">
                                         <div class="slider-realizations__button-box">
                                             <span>
                                                 <?php echo $last_item_link['title'] ?>
                                             </span>
                                             <svg width="9" height="15" viewBox="0 0 9 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                 <path d="M8.37935 7.08838L1.44141 0.169625C1.21409 -0.0569268 0.846066 -0.0565459 0.619133 0.170797C0.392376 0.398111 0.392962 0.766342 0.620305 0.993069L7.14528 7.50003L0.620071 14.007C0.392757 14.2337 0.392171 14.6017 0.618899 14.829C0.732658 14.943 0.881691 15 1.03072 15C1.17938 15 1.32782 14.9434 1.44138 14.8302L8.37935 7.91164C8.48883 7.80272 8.55026 7.65448 8.55026 7.50003C8.55026 7.34557 8.48865 7.19751 8.37935 7.08838Z" fill="white"/>
                                             </svg>
                                         </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
