<?php
    $title = get_sub_field('title');
    $text = get_sub_field('text');
    $dropdowns = get_sub_field('dropdowns');
    $contact_link = get_sub_field('contact_link');
    $settings = get_sub_field('settings');
?>


<section class="pricing-dropdowns <?php echo $settings['smaller_padding_top'] ? 'pricing-dropdowns--smaller-padding-top' : '' ?>">
    <?php if (!$settings['pattern_disabled']): ?>
    <img class="pricing-dropdowns__background" src="<?php echo get_template_directory_uri(); ?>/assets/images/leaf-pattern.png" alt="">
    <?php endif; ?>
    <div class="container">
        <?php if ($title): ?>
        <div class="pricing-dropdowns__title">
            <?php echo $title; ?>
        </div>
        <?php endif; ?>
        <?php if ($text): ?>
        <div class="pricing-dropdowns__text">
            <?php echo $text; ?>
        </div>
        <?php endif; ?>
        <div class="pricing-dropdowns__wrapper">
        <?php foreach($dropdowns as $dropdown): ?>
            <div class="pricing-dropdowns__dropdown-box">
                <div class="pricing-dropdowns__dropdown-title-box">
                    <span class="pricing-dropdowns__dropdown-title"><?php echo $dropdown['element']['title']; ?></span>
                    <div class="pricing-dropdowns__shortcuts">
                        <?php if ($dropdown['element']['time_range']): ?>
                        <div class="pricing-dropdowns__time-range">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="12" cy="12" r="10" stroke="#DEB562" stroke-width="2"/>
                                <path d="M12 5V12H19" stroke="#DEB562" stroke-width="2" stroke-linejoin="round"/>
                            </svg>
                            <span><?php echo $dropdown['element']['time_range']; ?></span>
                        </div>
                        <?php endif; ?>
                        <?php if ($dropdown['element']['price_range']): ?>
                        <div class="pricing-dropdowns__price-range">
                            <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 7C1 5.89543 1.89543 5 3 5H23C24.1046 5 25 5.89543 25 7V20C25 21.1046 24.1046 22 23 22H3C1.89543 22 1 21.1046 1 20V7Z" stroke="#DEB562" stroke-width="2" stroke-linejoin="round"/>
                                <path d="M1 10H25" stroke="#DEB562" stroke-width="2" stroke-linejoin="round"/>
                                <circle cx="6" cy="16" r="2" stroke="#DEB562" stroke-width="2"/>
                                <circle cx="10" cy="16" r="2" stroke="#DEB562" stroke-width="2"/>
                            </svg>
                            <span><?php echo $dropdown['element']['price_range']; ?></span>
                        </div>
                        <?php endif; ?>
                        <div class="pricing-dropdowns__svg-box">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 7L12 17.9375L23 7" stroke="#16523C" stroke-linejoin="round"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="pricing-dropdowns__text-wrapper">
                    <div class="pricing-dropdowns__text-box">
                        <div class="pricing-dropdowns__drop-text">
                            <?php echo $dropdown['element']['desc']; ?>
                        </div>
                        <div class="pricing-dropdowns__custom-table">
                            <?php if($dropdown['element']['pricing']): foreach($dropdown['element']['pricing'] as $item): ?>
                            <div class="pricing-dropdowns__row">
                                <div class="pricing-dropdowns__col">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="12" cy="12" r="10" stroke="#DEB562" stroke-width="2"/>
                                        <path d="M12 5V12H19" stroke="#DEB562" stroke-width="2" stroke-linejoin="round"/>
                                    </svg>
                                    <span><?php echo $item['czas']; ?></span>
                                </div>
                                <div class="pricing-dropdowns__col">
                                    <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 7C1 5.89543 1.89543 5 3 5H23C24.1046 5 25 5.89543 25 7V20C25 21.1046 24.1046 22 23 22H3C1.89543 22 1 21.1046 1 20V7Z" stroke="#DEB562" stroke-width="2" stroke-linejoin="round"/>
                                        <path d="M1 10H25" stroke="#DEB562" stroke-width="2" stroke-linejoin="round"/>
                                        <circle cx="6" cy="16" r="2" stroke="#DEB562" stroke-width="2"/>
                                        <circle cx="10" cy="16" r="2" stroke="#DEB562" stroke-width="2"/>
                                    </svg>
                                    <span><?php echo $item['price']; ?></span>
                                </div>
                            </div>
                        <?php endforeach; endif; ?>
                        </div>
                    </div>
                    <div class="pricing-dropdowns__button-box">
                        <a href="<?php echo $contact_link['url']; ?>" class="pricing-dropdowns__button">
                            <div>
                                <span><?php echo $contact_link['title']; ?></span>
                                <span>Przejdź</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
    </div>
</section>
