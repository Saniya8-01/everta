<?php get_header(); /*Template name: News*/ ?>

<Section class="resourcesBanner">
    <?php if (have_rows('resources_banner')) : ?>
    <?php while (have_rows('resources_banner')) : the_row(); ?>
    <div class="resorucesBannerWrapper">
        <h1><?php echo get_sub_field('banner_heading'); ?></h1>
        <p><?php echo get_sub_field('banner_subheading'); ?></p>
        <div class="resourcesTabs">
            <div class="resourcesTabWrapper">
                <?php if (have_rows('resources_tabs')) : ?>
                    <?php 
                    $count = 0;
                    while (have_rows('resources_tabs')) : the_row(); 
                    ?>
                    <?php 
                    $tab_link = get_sub_field('tab_link');
                    $tab_text = get_sub_field('tab_text');
                    
                    if ($tab_link && $tab_text) : ?>
                        <a href="<?php echo $tab_link; ?>" 
                           class="<?php echo ($count == 0) ? 'active' : ''; ?>">
                            <?php echo $tab_text; ?>
                        </a>
                    <?php endif; ?>                    
                    <?php 
                    $count++;
                    endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="searchWrapper">
            <img src="<?php bloginfo('template_directory'); ?>/images/search-icon.svg" alt="">
            <input type="text" placeholder="Search here">
        </div>
    </div>
    <?php endwhile; ?>
    <?php endif; ?>
</Section>

<section class="cardSection">
    <div class="cardSectionWrapper">
        <div class="heading">
            <h2>News</h2>
        </div>
        <!-- Custom Select Dropdown -->
        <div class="customSelect" id="customSelect">
            <div class="selectBtn" id="selectBtn">
                <span class="sBtntext">Latest first</span>
                <img src="<?php bloginfo('template_directory'); ?>/images/dropdown-icon.svg" alt="Dropdown Icon">
            </div>
            <ul class="options" id="options">
                <li class="option" data-sort="latest">Latest first</li>
                <li class="option" data-sort="oldest">Oldest first</li>
                <li class="option" data-sort="az">A-Z</li>
                <li class="option" data-sort="za">Z-A</li>
            </ul>
        </div>
        <div class="cardGrid" id="cardGrid">
            <?php
            $args = array('post_type' => 'news-post', 'posts_per_page' => -1, 'order' => 'DESC');
            $the_query = new WP_Query($args);
            while ($the_query->have_posts()) : $the_query->the_post();
                $terms = get_the_terms($post->ID, 'news_categories');
                $tax = ($terms && !is_wp_error($terms)) ? strtolower(join(", ", wp_list_pluck($terms, 'name'))) : '';
            ?>
                <a href="<?php the_permalink(); ?>" class="cards" data-date="<?php echo get_the_date('Y-m-d'); ?>" data-title="<?php echo esc_attr(get_the_title()); ?>">
                    <div class="cardImg">
                        <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>" alt="<?php the_title_attribute(); ?>">
                    </div>
                    <div class="cardContent">
                        <span class="tag"><?php echo esc_html($tax); ?></span>
                        <div class="cardInfo">
                            <div class="cardTypo">
                                <h3><?php 
                                    $title = get_the_title(); 
                                    echo (strlen($title) > 50) ? substr($title, 0, 40) . '...' : $title; 
                                ?></h3>
                                <p><?php echo get_the_date('d M Y'); ?> • <?php echo estimate_reading_time(get_the_ID()); ?> mins read</p>
                            </div>
                        </div>
                    </div>
                    <div class="redirectArrow">
                        <img src="<?php bloginfo('template_directory'); ?>/images/right-arrow.svg" alt="Right Arrow">
                    </div>
                </a>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
        <div id="pagination" class="pagination"></div>
    </div>
</section>

<?php get_footer(); ?>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const cardGrid = document.getElementById('cardGrid');
    const pagination = document.getElementById('pagination');
    const searchInput = document.querySelector('.searchWrapper input[type="text"]');
    const optionMenu = document.querySelector("#customSelect");
    const selectBtn = optionMenu.querySelector("#selectBtn");
    const options = optionMenu.querySelectorAll(".option");
    const sBtn_text = optionMenu.querySelector(".sBtntext");

    const noPostsMessage = document.createElement('div');
    noPostsMessage.classList.add('no-posts-message');
    noPostsMessage.textContent = "No posts found.";

    function getCards() {
        return Array.from(cardGrid.querySelectorAll('.cards'));
    }

    function getCardsPerPage() {
        return window.innerWidth < 680 ? 4 : 6;
    }

    let cardsPerPage = getCardsPerPage();
    let currentPage = 1;
    let allCards = getCards();
    let sortedCards = [...allCards];
    let filteredCards = [...sortedCards];

    function renderCards(page, filteredCards = sortedCards) {
        cardGrid.innerHTML = '';

        if (filteredCards.length === 0) {
            cardGrid.appendChild(noPostsMessage);
            pagination.style.display = 'none';
            return;
        }

        const startIndex = (page - 1) * cardsPerPage;
        const endIndex = startIndex + cardsPerPage;
        const visibleCards = filteredCards.slice(startIndex, endIndex);

        visibleCards.forEach(card => cardGrid.appendChild(card));
        renderPagination(filteredCards);
    }

    function renderPagination(filteredCards) {
        pagination.innerHTML = '';
        const totalPages = Math.ceil(filteredCards.length / cardsPerPage);

        if (totalPages <= 1) {
            pagination.style.display = 'none';
            return;
        }

        pagination.style.display = 'flex';

        const prevButton = document.createElement('button');
        const prevImage = document.createElement('img');
        prevImage.src = `${theme_vars.template_dir}/images/prev-arrow.svg`;
        prevImage.alt = 'Previous';
        prevButton.appendChild(prevImage);
        prevButton.classList.add('pagination-prev');
        prevButton.disabled = currentPage === 1;
        prevButton.addEventListener('click', () => {
            currentPage--;
            renderCards(currentPage, filteredCards);
        });
        pagination.appendChild(prevButton);

        for (let i = 1; i <= totalPages; i++) {
            const pageButton = document.createElement('button');
            pageButton.textContent = i;
            pageButton.classList.toggle('active', i === currentPage);
            pageButton.addEventListener('click', () => {
                currentPage = i;
                renderCards(currentPage, filteredCards);
            });
            pagination.appendChild(pageButton);
        }

        const nextButton = document.createElement('button');
        const nextImage = document.createElement('img');
        nextImage.src = `${theme_vars.template_dir}/images/black-cta-arrow.svg`;
        nextImage.alt = 'Next';
        nextButton.appendChild(nextImage);
        nextButton.classList.add('pagination-next');
        nextButton.disabled = currentPage === totalPages;
        nextButton.addEventListener('click', () => {
            currentPage++;
            renderCards(currentPage, filteredCards);
        });
        pagination.appendChild(nextButton);
    }

    function filterCards(query) {
        filteredCards = sortedCards.filter(card => {
            const title = card.querySelector('.cardContent h3').textContent.toLowerCase();
            const description = card.querySelector('.cardContent p').textContent.toLowerCase();
            const tag = card.querySelector('.cardContent .tag').textContent.toLowerCase();
            return title.includes(query.toLowerCase()) || description.includes(query.toLowerCase()) || tag.includes(query.toLowerCase());
        });
        currentPage = 1;
        renderCards(currentPage, filteredCards);
    }

    searchInput.addEventListener('input', (e) => {
        filterCards(e.target.value.trim());
    });

    function sortCards(sortType) {
        sortedCards = [...allCards];
        if (sortType === "latest") {
            sortedCards.sort((a, b) => new Date(b.getAttribute('data-date')) - new Date(a.getAttribute('data-date')));
        } else if (sortType === "oldest") {
            sortedCards.sort((a, b) => new Date(a.getAttribute('data-date')) - new Date(b.getAttribute('data-date')));
        } else if (sortType === "az") {
            sortedCards.sort((a, b) => a.getAttribute('data-title').localeCompare(b.getAttribute('data-title')));
        } else if (sortType === "za") {
            sortedCards.sort((a, b) => b.getAttribute('data-title').localeCompare(a.getAttribute('data-title')));
        }
        filterCards(searchInput.value.trim());
    }

    options.forEach(option => {
        option.addEventListener("click", function () {
            const sortType = this.getAttribute('data-sort');
            sBtn_text.textContent = this.textContent;
            optionMenu.classList.remove("active");
            sortCards(sortType);
        });
    });

    selectBtn.addEventListener('click', () => {
        optionMenu.classList.toggle('active');
    });

    window.addEventListener('resize', () => {
        cardsPerPage = getCardsPerPage();
        renderCards(currentPage, filteredCards);
    });

    renderCards(currentPage);
});

</script>

