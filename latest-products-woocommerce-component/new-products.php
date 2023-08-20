<?php

    $title = get_sub_field('title');
    $shortcode = get_sub_field('shortcode');

    $params = array(
        'posts_per_page' => 8,
        'post_type' => 'product',
        'meta_key' => 'mark_as_most_buy',
        'orderby' => 'meta_value',
        'ignore_custom_sort' => true,

    );
    $wc_query = new WP_Query($params);

?>


<section class="new-products">
    <div class="new-products__heading">
        <h2 class="new-products__title"><?php echo $title ?></h2>
    </div>
    <div class="container">
        <div class="new-products__additional-wrapper">
            <div class="new-products__wrapper swiper-wrapper">
                <?php if ($wc_query->have_posts()) : // (3) ?>
                    <?php while ($wc_query->have_posts()) : // (4)
                                $wc_query->the_post(); // (5) ?>

                        <?php

                            $product = wc_get_product(get_the_ID());

                            $mark_as_bestseller = get_field('mark_as_bestseller', $product->get_id());

                        ?>
                    <div class="new-products__product swiper-slide">
                        <div class="new-products__product-image-link">
                            <figure class="new-products__figure">
                                <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()), 'thumbnail' ); ?>" alt="">
                                <div class="new-products__menu-box">
                                    <a class="new-products__menu-background" href="<?php echo get_permalink() ?>"></a>
                                    <a class="new-products__menu-title" href="<?php echo get_permalink() ?>"><span><?php the_title(); // (6) ?></span></a>
                                    <a href="<?php echo get_permalink() ?>" class="new-products__menu">Zobacz opis</a>
                                    <a class="new-products__menu" href="<?php echo $product->add_to_cart_url() ?>">
                                        <?php echo $product->add_to_cart_text() ?>
                                    </a>
                                </div>
                                <?php if(isset($mark_as_bestseller[0])): ?>
                    			<div class="bestseller-mark">
                    				<svg width="130" height="25" viewBox="0 0 130 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                    				    <path d="M0 0H130V25H6L0 0Z" fill="#FBCA59"/>
                    				    <path d="M19.0891 18V7.328H23.0891C23.9744 7.328 24.6784 7.46133 25.2011 7.728C25.7344 7.984 26.1184 8.32533 26.3531 8.752C26.5877 9.168 26.7051 9.62133 26.7051 10.112C26.7051 10.56 26.6037 10.944 26.4011 11.264C26.2091 11.584 25.9851 11.8347 25.7291 12.016C25.4837 12.1867 25.2757 12.2933 25.1051 12.336C25.1904 12.3573 25.2864 12.3893 25.3931 12.432C25.5104 12.4747 25.6277 12.5227 25.7451 12.576C26.1824 12.768 26.5451 13.0667 26.8331 13.472C27.1211 13.8773 27.2651 14.368 27.2651 14.944C27.2651 16.0427 26.8864 16.8267 26.1291 17.296C25.3824 17.7653 24.3691 18 23.0891 18H19.0891ZM21.4411 11.6H22.8651C23.2277 11.6 23.5584 11.5147 23.8571 11.344C24.1664 11.1627 24.3211 10.848 24.3211 10.4C24.3211 10.08 24.2464 9.83467 24.0971 9.664C23.9584 9.49333 23.7771 9.376 23.5531 9.312C23.3291 9.23733 23.0997 9.2 22.8651 9.2H21.4411V11.6ZM21.4411 16.144H23.0091C23.2437 16.144 23.4997 16.1173 23.7771 16.064C24.0651 16 24.3104 15.872 24.5131 15.68C24.7157 15.4773 24.8171 15.168 24.8171 14.752C24.8171 14.368 24.7157 14.0747 24.5131 13.872C24.3211 13.6693 24.0811 13.536 23.7931 13.472C23.5157 13.3973 23.2544 13.36 23.0091 13.36H21.4411V16.144ZM29.6372 18V7.328H36.9332V9.44H32.0532V11.52H35.8452V13.568H32.0532V15.872H37.2852V18H29.6372ZM38.8864 16.496L40.4384 14.816C40.7158 15.1147 41.0838 15.408 41.5424 15.696C42.0118 15.984 42.5558 16.128 43.1744 16.128C43.4198 16.128 43.6598 16.0853 43.8944 16C44.1291 15.904 44.3211 15.7707 44.4704 15.6C44.6304 15.4187 44.7104 15.2053 44.7104 14.96C44.7104 14.5653 44.5184 14.256 44.1344 14.032C43.7504 13.808 43.1424 13.5947 42.3104 13.392C41.4998 13.1893 40.8278 12.832 40.2944 12.32C39.7611 11.808 39.4944 11.1467 39.4944 10.336C39.4944 9.73867 39.6384 9.19467 39.9264 8.704C40.2144 8.20267 40.6464 7.80267 41.2224 7.504C41.7984 7.19467 42.5238 7.04 43.3984 7.04C44.1238 7.04 44.7318 7.136 45.2224 7.328C45.7238 7.50933 46.1238 7.712 46.4224 7.936C46.7211 8.16 46.9291 8.34133 47.0464 8.48L45.6544 10.016C45.4198 9.83467 45.1104 9.632 44.7264 9.408C44.3424 9.17333 43.8891 9.056 43.3664 9.056C43.0251 9.056 42.7051 9.15733 42.4064 9.36C42.1184 9.552 41.9744 9.78667 41.9744 10.064C41.9744 10.4267 42.1664 10.72 42.5504 10.944C42.9344 11.168 43.4624 11.3547 44.1344 11.504C44.6571 11.632 45.1584 11.824 45.6384 12.08C46.1291 12.336 46.5291 12.6933 46.8384 13.152C47.1478 13.6107 47.3024 14.208 47.3024 14.944C47.3024 15.584 47.1211 16.1547 46.7584 16.656C46.3958 17.1573 45.9051 17.552 45.2864 17.84C44.6678 18.128 43.9744 18.272 43.2064 18.272C42.5024 18.272 41.8784 18.1867 41.3344 18.016C40.7904 17.8453 40.3158 17.6267 39.9104 17.36C39.5051 17.0827 39.1638 16.7947 38.8864 16.496ZM52.0948 18V9.456H48.6388V7.328H57.9668V9.456H54.5268V18H52.0948ZM59.0296 16.496L60.5816 14.816C60.8589 15.1147 61.2269 15.408 61.6856 15.696C62.1549 15.984 62.6989 16.128 63.3176 16.128C63.5629 16.128 63.8029 16.0853 64.0376 16C64.2722 15.904 64.4642 15.7707 64.6136 15.6C64.7736 15.4187 64.8536 15.2053 64.8536 14.96C64.8536 14.5653 64.6616 14.256 64.2776 14.032C63.8936 13.808 63.2856 13.5947 62.4536 13.392C61.6429 13.1893 60.9709 12.832 60.4376 12.32C59.9042 11.808 59.6376 11.1467 59.6376 10.336C59.6376 9.73867 59.7816 9.19467 60.0696 8.704C60.3576 8.20267 60.7896 7.80267 61.3656 7.504C61.9416 7.19467 62.6669 7.04 63.5416 7.04C64.2669 7.04 64.8749 7.136 65.3656 7.328C65.8669 7.50933 66.2669 7.712 66.5656 7.936C66.8642 8.16 67.0722 8.34133 67.1896 8.48L65.7976 10.016C65.5629 9.83467 65.2536 9.632 64.8696 9.408C64.4856 9.17333 64.0322 9.056 63.5096 9.056C63.1682 9.056 62.8482 9.15733 62.5496 9.36C62.2616 9.552 62.1176 9.78667 62.1176 10.064C62.1176 10.4267 62.3096 10.72 62.6936 10.944C63.0776 11.168 63.6056 11.3547 64.2776 11.504C64.8002 11.632 65.3016 11.824 65.7816 12.08C66.2722 12.336 66.6722 12.6933 66.9816 13.152C67.2909 13.6107 67.4456 14.208 67.4456 14.944C67.4456 15.584 67.2642 16.1547 66.9016 16.656C66.5389 17.1573 66.0482 17.552 65.4296 17.84C64.8109 18.128 64.1176 18.272 63.3496 18.272C62.6456 18.272 62.0216 18.1867 61.4776 18.016C60.9336 17.8453 60.4589 17.6267 60.0536 17.36C59.6482 17.0827 59.3069 16.7947 59.0296 16.496ZM69.9547 18V7.328H77.2507V9.44H72.3707V11.52H76.1627V13.568H72.3707V15.872H77.6027V18H69.9547ZM79.9559 18V7.328H82.3719V15.856H87.4759V18H79.9559ZM89.6134 18V7.328H92.0294V15.856H97.1334V18H89.6134ZM99.2709 18V7.328H106.567V9.44H101.687V11.52H105.479V13.568H101.687V15.872H106.919V18H99.2709ZM109.272 18V7.328H113.24C114.072 7.328 114.766 7.48267 115.32 7.792C115.875 8.09067 116.291 8.496 116.568 9.008C116.846 9.50933 116.984 10.064 116.984 10.672C116.984 11.3547 116.83 11.9573 116.52 12.48C116.222 13.0027 115.795 13.4187 115.24 13.728L117.608 18H114.952L112.968 14.08H111.624V18H109.272ZM111.624 12.144H113.112C113.56 12.144 113.912 12.0107 114.168 11.744C114.424 11.4773 114.552 11.1413 114.552 10.736C114.552 10.2987 114.419 9.952 114.152 9.696C113.896 9.44 113.55 9.312 113.112 9.312H111.624V12.144Z" fill="white"/>
                    				</svg>
                    			</div>
                    			<?php endif; ?>
                            </figure>
                            <div class="new-products__figure-mobile">
                                <a href="<?php echo get_permalink() ?>">
                                    <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()), 'thumbnail' ); ?>" alt="">
                                </a>
                                <a class="new-products__figure-mobile-menu" href="<?php echo $product->add_to_cart_url() ?>">
                                    <svg width="26" height="21" viewBox="0 0 26 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M24.8182 7.72287H19.1573L13.9809 0.4647C13.7564 0.1549 13.3782 0 13 0C12.6218 0 12.2436 0.1549 12.0191 0.475764L6.84273 7.72287H1.18182C0.531818 7.72287 0 8.22076 0 8.82929C0 8.92887 0.0118181 9.02845 0.0472727 9.12803L3.04909 19.3846C3.32091 20.314 4.23091 21 5.31818 21H20.6818C21.7691 21 22.6791 20.314 22.9627 19.3846L25.9645 9.12803L26 8.82929C26 8.22076 25.4682 7.72287 24.8182 7.72287ZM13 3.07587L16.3091 7.72287H9.69091L13 3.07587ZM20.6818 18.7871L5.33 18.7982L2.73 9.93572H23.2818L20.6818 18.7871ZM13 12.1486C11.7 12.1486 10.6364 13.1444 10.6364 14.3614C10.6364 15.5785 11.7 16.5743 13 16.5743C14.3 16.5743 15.3636 15.5785 15.3636 14.3614C15.3636 13.1444 14.3 12.1486 13 12.1486Z" fill="#5891CD"/>
                                    </svg>
                                </a>
                            </div>
                            <a href="<?php echo get_permalink() ?>" class="new-products__bottom-box">
                                <h3><?php the_title(); // (6) ?></h3>
                                <div class="new-products__price-box">
                                    <?php echo $product->get_price_html(); ?>
                                </div>
                            </a>
                        </div>

                    </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); // (7) ?>
                <?php else:  ?>
            </div>
        </div>
        <p><?php _e( 'Brak produktów' ); // (8) ?></p>
        <?php endif; ?>
    </div>
</section>
