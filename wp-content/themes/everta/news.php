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
    
    // Create and add the "No posts found" message
    const noPostsMessage = document.createElement('div');
    noPostsMessage.classList.add('no-posts-message');
    noPostsMessage.textContent = "No posts found.";

    // Select all `.cards` inside `.cardGrid`
    const cards = Array.from(cardGrid.querySelectorAll('.cards'));

    // Function to get the number of cards per page based on screen width
    function getCardsPerPage() {
        if (window.innerWidth < 680) {
            return 4; // 4 cards per page for mobile
        } else {
            return 6; // 6 cards per page for desktop/iPad
        }
    }

    // Initial cards per page based on screen size
    let cardsPerPage = getCardsPerPage();
    let currentPage = 1; // Start at page 1

    // Function to render cards for the current page
    function renderCards(page, filteredCards = cards) {
        // Clear the current content in the card grid
        cardGrid.innerHTML = '';

        // If no filtered cards, display "No posts found"
        if (filteredCards.length === 0) {
            cardGrid.appendChild(noPostsMessage); // Show "No posts found" message
            pagination.style.display = 'none'; // Hide pagination
            return;
        }

        // Calculate the start and end index for cards to display
        const startIndex = (page - 1) * cardsPerPage;
        const endIndex = startIndex + cardsPerPage;

        // Get the cards for the current page
        const visibleCards = filteredCards.slice(startIndex, endIndex);

        // Append the visible cards to the card grid
        visibleCards.forEach((card) => {
            cardGrid.appendChild(card);
        });

        // Render the pagination buttons
        renderPagination(filteredCards);
    }

    // Function to render pagination buttons
    function renderPagination(filteredCards) {
        pagination.innerHTML = ''; // Clear existing pagination

        const totalPages = Math.ceil(filteredCards.length / cardsPerPage);

        if (totalPages > 1) {
            // Add "Previous" button with image and extra class
            const prevButton = document.createElement('button');
            const prevImage = document.createElement('img');
            prevImage.src = `${theme_vars.template_dir}/images/prev-arrow.svg`;
            prevImage.alt = 'Previous';
            prevButton.appendChild(prevImage);
            prevButton.classList.add('pagination-prev'); // Extra class for styling
            prevButton.disabled = currentPage === 1; // Disable if on the first page
            prevButton.addEventListener('click', () => {
                currentPage--;
                renderCards(currentPage, filteredCards);
            });
            pagination.appendChild(prevButton);

            // Pagination logic with ellipsis for mobile
            const maxVisiblePages = window.innerWidth <= 680 ? 3 : 6; // 3 pages for mobile, 6 for desktop/tablet
            let pageButtons = [];

            // Show the first and last page buttons, and a few neighboring ones
            if (totalPages <= maxVisiblePages) {
                // If total pages are less than or equal to maxVisiblePages, show all page numbers
                for (let i = 1; i <= totalPages; i++) {
                    pageButtons.push(i);
                }
            } else {
                // Show first page, current page, and last page with ellipsis
                if (currentPage <= 2) {
                    // Show first 3 pages (1, 2, 3 and ... if needed)
                    pageButtons = [1, 2, 3, '...', totalPages];
                } else if (currentPage >= totalPages - 1) {
                    // Show last 3 pages (..., second last, last page)
                    pageButtons = [1, '...', totalPages - 2, totalPages - 1, totalPages];
                } else {
                    // Show 1 page before and after the current page with ellipsis
                    pageButtons = [1, '...', currentPage - 1, currentPage, currentPage + 1, '...', totalPages];
                }
            }

            // Add the page number buttons to pagination
            pageButtons.forEach((button) => {
                const pageButton = document.createElement('button');
                if (button === '...') {
                    pageButton.textContent = '...';
                    pageButton.disabled = true; // Disable the ellipsis button
                } else {
                    pageButton.textContent = button;
                    pageButton.classList.toggle('active', button === currentPage); // Highlight the active page
                    pageButton.addEventListener('click', () => {
                        currentPage = button;
                        renderCards(currentPage, filteredCards);
                    });
                }
                pagination.appendChild(pageButton);
            });

            // Add "Next" button with image and extra class
            const nextButton = document.createElement('button');
            const nextImage = document.createElement('img');
            nextImage.src = `${theme_vars.template_dir}/images/black-cta-arrow.svg`;
            nextImage.alt = 'Next';
            nextButton.appendChild(nextImage);
            nextButton.classList.add('pagination-next'); // Extra class for styling
            nextButton.disabled = currentPage === totalPages; // Disable if on the last page
            nextButton.addEventListener('click', () => {
                currentPage++;
                renderCards(currentPage, filteredCards);
            });
            pagination.appendChild(nextButton);
        }
    }

    // Function to filter cards based on search input
    function filterCards(query) {
        const filteredCards = cards.filter((card) => {
            const title = card.querySelector('.cardContent h3').textContent.toLowerCase();
            const description = card.querySelector('.cardContent p').textContent.toLowerCase();
            const tag = card.querySelector('.cardContent .tag').textContent.toLowerCase();

            // Check if any of the three elements contains the search query
            return title.includes(query.toLowerCase()) || description.includes(query.toLowerCase()) || tag.includes(query.toLowerCase());
        });
        renderCards(currentPage, filteredCards);
    }

    // Listen for input changes in the search field
    searchInput.addEventListener('input', (e) => {
        const query = e.target.value.trim(); // Get the search query
        filterCards(query); // Filter cards based on the query
    });

    // Listen for window resize events to update cards per page
    window.addEventListener('resize', () => {
        // Update the cards per page when the window is resized
        cardsPerPage = getCardsPerPage();
        renderCards(currentPage); // Re-render cards based on the new screen size
    });

    // Initial render of the first page with all cards
    renderCards(currentPage);
});

</script>

