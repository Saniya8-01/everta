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
            <input type="search" placeholder="Search here">
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
                                <h3><?php echo esc_html(wp_trim_words(get_the_title(), 10, '...')); ?></h3>
                                <p><?php echo get_the_date('d M Y'); ?> • <?php echo estimate_reading_time(get_the_ID()); ?> mins read</p>
                            </div>
                            <div class="redirectArrow">
                                <img src="<?php bloginfo('template_directory'); ?>/images/right-arrow.svg" alt="Right Arrow">
                            </div>
                        </div>
                    </div>
                </a>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const optionMenu = document.querySelector("#customSelect");
    const selectBtn = optionMenu.querySelector("#selectBtn");
    const options = optionMenu.querySelectorAll(".option");
    const sBtn_text = optionMenu.querySelector(".sBtntext");
    const cardGrid = document.getElementById('cardGrid');
    const cards = Array.from(cardGrid.querySelectorAll('.cards'));

    // Toggle Dropdown
    selectBtn.addEventListener("click", (e) => {
        e.stopPropagation();
        optionMenu.classList.toggle("active");
    });

    document.addEventListener("click", (e) => {
        if (!optionMenu.contains(e.target)) {
            optionMenu.classList.remove("active");
        }
    });

    // Sorting Logic
    options.forEach(option => {
        option.addEventListener("click", function () {
            const sortType = this.getAttribute('data-sort');
            sBtn_text.textContent = this.textContent;
            optionMenu.classList.remove("active");

            let sortedCards = [...cards];

            if (sortType === "latest") {
                sortedCards.sort((a, b) => new Date(b.getAttribute('data-date')) - new Date(a.getAttribute('data-date')));
            } else if (sortType === "oldest") {
                sortedCards.sort((a, b) => new Date(a.getAttribute('data-date')) - new Date(b.getAttribute('data-date')));
            } else if (sortType === "az") {
                sortedCards.sort((a, b) => a.getAttribute('data-title').localeCompare(b.getAttribute('data-title')));
            } else if (sortType === "za") {
                sortedCards.sort((a, b) => b.getAttribute('data-title').localeCompare(a.getAttribute('data-title')));
            }

            // Clear existing cards and re-append sorted ones
            cardGrid.innerHTML = "";
            sortedCards.forEach(card => cardGrid.appendChild(card));
        });
    });
});


document.addEventListener('DOMContentLoaded', () => {
    const cardGrid = document.getElementById('cardGrid');
    const pagination = document.getElementById('pagination');
    const searchInput = document.querySelector('.searchWrapper input[type="search"]');

    // Select all `.cards` inside `.cardGrid`
    const cards = Array.from(cardGrid.querySelectorAll('.cards'));

    // Function to get the number of cards per page based on screen width
    function getCardsPerPage() {
        return window.innerWidth < 680 ? 4 : 6; // Mobile: 4, Desktop/iPad: 6
    }

    let cardsPerPage = getCardsPerPage();
    let currentPage = 1;

    // Function to render cards for the current page
    function renderCards(page, filteredCards = cards) {
        cardGrid.innerHTML = ''; // Clear current content
        const startIndex = (page - 1) * cardsPerPage;
        const endIndex = startIndex + cardsPerPage;
        const visibleCards = filteredCards.slice(startIndex, endIndex);

        // Check if there are any visible cards
        if (visibleCards.length === 0) {
            cardGrid.innerHTML = `<p class="no-posts-message">No posts found.</p>`;
            pagination.innerHTML = ''; // Clear pagination if no results
            return;
        }

        // Append the visible cards to the card grid
        visibleCards.forEach((card) => cardGrid.appendChild(card));
        renderPagination(filteredCards);
    }

    // Function to render pagination buttons
    function renderPagination(filteredCards) {
        pagination.innerHTML = ''; // Clear existing pagination
        const totalPages = Math.ceil(filteredCards.length / cardsPerPage);

        if (totalPages <= 1) return;

        const prevButton = document.createElement('button');
        prevButton.textContent = 'Prev';
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
        nextButton.textContent = 'Next';
        nextButton.disabled = currentPage === totalPages;
        nextButton.addEventListener('click', () => {
            currentPage++;
            renderCards(currentPage, filteredCards);
        });
        pagination.appendChild(nextButton);
    }

    // Function to filter cards based on search input
    function filterCards(query) {
        const filteredCards = cards.filter((card) => {
            const title = card.querySelector('.cardContent h3').textContent.toLowerCase();
            const description = card.querySelector('.cardContent p').textContent.toLowerCase();
            const tag = card.querySelector('.cardContent .tag').textContent.toLowerCase();
            return title.includes(query.toLowerCase()) || description.includes(query.toLowerCase()) || tag.includes(query.toLowerCase());
        });
        currentPage = 1; // Reset to the first page after filtering
        renderCards(currentPage, filteredCards);
    }

    // Event Listeners
    searchInput.addEventListener('input', (e) => {
        filterCards(e.target.value.trim());
    });

    window.addEventListener('resize', () => {
        cardsPerPage = getCardsPerPage();
        renderCards(currentPage);
    });

    // Initial render with all cards
    renderCards(currentPage);
});

</script>

