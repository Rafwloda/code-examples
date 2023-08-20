<?php
    $elements = get_sub_field('elements');
    $title = get_sub_field('title');
    $tiles = get_sub_field('tiles');


    $initial_counter = 0;
?>

<section class="rotating-circles">
    <div id="rotating-circles" class="scroll-div"></div>
    <div class="container">
        <div class="rotating-circles__icons">
         <?php foreach ($tiles as $tile) { ?>
                 <div class="rotating-circles__icons-item">
                    <img src="<?php echo $tile["icon"]['url'] ?>" alt="<?php echo $tile["alt"] ?>">
                    <span><?php echo $tile["text"] ?></span>
                 </div>
         <?php } ?>
        </div>
        <div class="rotating-circles__title">
            <?php echo $title; ?>
        </div>
        <div class="rotating-circles__wrapper">
            <div class="rotating-circles__revolver">
                <svg class="rotating-circles__lt-arrow" width="87" height="105" viewBox="0 0 87 105" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M86.2525 2.0836C86.2987 1.81135 86.1155 1.55318 85.8432 1.50695L81.4067 0.753689C81.1345 0.707472 80.8763 0.890693 80.8301 1.16295C80.7838 1.43519 80.9671 1.69336 81.2393 1.73958L85.1829 2.40915L84.5133 6.35271C84.4671 6.62495 84.6503 6.88313 84.9226 6.92935C85.1948 6.97558 85.453 6.79235 85.4992 6.52011L86.2525 2.0836ZM1.30029 104.164C20.3146 63.3421 49.6495 28.2408 86.0489 2.40765L85.4701 1.59215C48.9294 27.5256 19.4814 62.7624 0.393802 103.742L1.30029 104.164Z" fill="#E3DDCB"/>
                </svg>
                <svg class="rotating-circles__rt-arrow" width="101" height="91" viewBox="0 0 101 91" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M99.4579 90.3165C99.7281 90.3733 99.9932 90.2003 100.05 89.9301L100.976 85.5263C101.033 85.2561 100.86 84.991 100.589 84.9342C100.319 84.8773 100.054 85.0504 99.9973 85.3206L99.1743 89.235L95.2599 88.412C94.9896 88.3552 94.7245 88.5282 94.6677 88.7985C94.6109 89.0687 94.7839 89.3338 95.0541 89.3906L99.4579 90.3165ZM0.771354 1.44466C40.8197 22.0378 74.7493 52.7204 99.142 90.1004L99.9795 89.5539C75.492 52.0288 41.4315 21.2279 1.22865 0.555342L0.771354 1.44466Z" fill="#E3DDCB"/>
                </svg>
                <svg class="rotating-circles__rb-arrow" width="91" height="101" viewBox="0 0 91 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.510659 99.4579C0.453843 99.7281 0.626855 99.9932 0.897088 100.05L5.30081 100.976C5.57105 101.033 5.83618 100.86 5.89299 100.589C5.94981 100.319 5.7768 100.054 5.50656 99.9973L1.59214 99.1743L2.41512 95.2599C2.47193 94.9896 2.29893 94.7245 2.02869 94.6677C1.75845 94.6109 1.49333 94.7839 1.43652 95.0541L0.510659 99.4579ZM89.3825 0.771354C68.7893 40.8197 38.1067 74.7493 0.726716 99.142L1.27321 99.9795C38.7984 75.492 69.5992 41.4315 90.2718 1.22865L89.3825 0.771354Z" fill="#E3DDCB"/>
                </svg>
                <svg class="rotating-circles__lb-arrow" width="96" height="97" viewBox="0 0 96 97" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2.74624 0.518235C2.48014 0.444457 2.20461 0.60037 2.13083 0.866474L0.928566 5.2029C0.854796 5.469 1.0107 5.74453 1.27681 5.81831C1.54292 5.89209 1.81844 5.73617 1.89222 5.47007L2.96089 1.61547L6.81549 2.68415C7.08159 2.75792 7.35713 2.60201 7.4309 2.3359C7.50468 2.0698 7.34877 1.79427 7.08266 1.7205L2.74624 0.518235ZM95.6201 95.4481C56.9529 72.3656 25.0299 39.6004 3.04781 0.753817L2.17749 1.2463C24.2449 40.2438 56.2912 73.1352 95.1075 96.3068L95.6201 95.4481Z" fill="#E3DDCB"/>
                </svg>
                <?php foreach($elements as $element): ?>
                <div data-initialcounter='<?php echo $initial_counter; ?>' class="rotating-circles__bullet rotating-circles__bullet--<?php echo $initial_counter; ?>">
                    <img src="<?php echo $element['icon']['url']; ?>" alt="<?php echo $element['icon']['alt']; ?>">
                    <span><?php echo $element['title'] ?></span>
                    <div class="rotating-circles__content-box">
                        <img src="<?php echo $element['icon']['url']; ?>" alt="<?php echo $element['icon']['alt']; ?>">
                        <div class="rotating-circles__bullet-texts">
                            <span><?php echo $element['title'] ?></span>
                            <div class="rotating-circles__element-desc"><?php echo $element['description'] ?></div>
                        </div>
                    </div>
                </div>
                <?php
                $initial_counter++;
                endforeach;
                ?>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="rotating-circles__pagination">
            <svg class="rotating-circles__left-pag" width="30" height="16" viewBox="0 0 30 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0.292988 7.29289C-0.0975361 7.68341 -0.0975361 8.31658 0.292988 8.7071L6.65695 15.0711C7.04747 15.4616 7.68064 15.4616 8.07116 15.0711C8.46169 14.6805 8.46169 14.0474 8.07116 13.6569L2.41431 8L8.07116 2.34314C8.46169 1.95262 8.46169 1.31945 8.07116 0.92893C7.68064 0.538405 7.04747 0.538405 6.65695 0.928929L0.292988 7.29289ZM29.6001 7L1.0001 7L1.0001 9L29.6001 9L29.6001 7Z" fill="white"/>
            </svg>
            <svg class="rotating-circles__right-pag" width="30" height="16" viewBox="0 0 30 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0.292988 7.29289C-0.0975361 7.68341 -0.0975361 8.31658 0.292988 8.7071L6.65695 15.0711C7.04747 15.4616 7.68064 15.4616 8.07116 15.0711C8.46169 14.6805 8.46169 14.0474 8.07116 13.6569L2.41431 8L8.07116 2.34314C8.46169 1.95262 8.46169 1.31945 8.07116 0.92893C7.68064 0.538405 7.04747 0.538405 6.65695 0.928929L0.292988 7.29289ZM29.6001 7L1.0001 7L1.0001 9L29.6001 9L29.6001 7Z" fill="white"/>
            </svg>
        </div>
    </div>
</section>
