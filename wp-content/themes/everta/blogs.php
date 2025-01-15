<?php get_header(); /*Template name: Blogs*/ ?>

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
                           class="<?php echo ($count == 2) ? 'active' : ''; ?>">
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
            <h2>Blogs</h2>
        </div>
        <div class="blogsTabs">
            <div class="blogsTabWrapper">
                <a href="#" class="active" data-filter="all">All</a>
                <?php
                        $args = array('post_type' => 'post', 'posts_per_page' => -1, 'order' => 'DESC');
                        $the_query = new WP_Query($args);
                        while ($the_query->have_posts()) : $the_query->the_post();
                            $terms = get_the_terms($post->ID, 'category');
                            if ($terms && ! is_wp_error($terms)) :
                                $links = array();
                                foreach ($terms as $term) {
                                    $links[] = $term->name;
                                }
                                $tax_links = join(" ", str_replace('-', ' ', $links));
                                $tax = strtolower($tax_links);
                            else :
                                $tax = '';
                            endif;
                        ?>
                <a href="#" data-filter="<?php echo $tax; ?>"><?php echo $tax; ?></a>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        </div>
        <div class="cardGrid" id="cardGrid">
            <?php
                        $args = array('post_type' => 'post', 'posts_per_page' => -1, 'order' => 'DESC');
                        $the_query = new WP_Query($args);
                        while ($the_query->have_posts()) : $the_query->the_post();
                            $terms = get_the_terms($post->ID, 'category');
                            if ($terms && ! is_wp_error($terms)) :
                                $links = array();
                                foreach ($terms as $term) {
                                    $links[] = $term->name;
                                }
                                $tax_links = join(" ", str_replace('-', ' ', $links));
                                $tax = strtolower($tax_links);
                            else :
                                $tax = '';
                            endif;
                        ?>
            <a href="<?php the_permalink(); ?>" class="cards" data-category="<?php echo $tax; ?>">
                <div class="cardImg">
                    <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)) ?>" alt="" title="" />
                </div>
                <div class="cardContent">
                    <span class="tag"> <?php echo $tax; ?></span>
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
                        <img src="<?php bloginfo('template_directory'); ?>/images/right-arrow.svg" alt="">
                    </div>
            </a>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
        <div id="pagination" class="pagination"></div>
    </div>
</section>

<?php get_footer(); ?>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const tabs = document.querySelectorAll(".blogsTabWrapper a");
    const cardGrid = document.getElementById("cardGrid");
    const pagination = document.getElementById("pagination");
    const searchInput = document.querySelector(".searchWrapper input[type='text']");
    const noPostsMessage = document.createElement("div");
    noPostsMessage.classList.add("no-posts-message");
    noPostsMessage.textContent = "No posts found.";

    // Function to fetch all cards from the DOM
    function getCards() {
        return Array.from(cardGrid.querySelectorAll(".cards"));
    }

    // Function to get the number of cards per page based on screen width
    function getCardsPerPage() {
        return window.innerWidth < 680 ? 4 : 6; // 4 for mobile, 6 for desktop/iPad
    }

    let cardsPerPage = getCardsPerPage();
    let currentPage = 1;
    let activeTabFilter = "all"; // Default to 'all' for tab filtering

    // Function to render cards for the current page
    function renderCards(page, filteredCards = getCards()) {
        const allCards = getCards();
        const startIndex = (page - 1) * cardsPerPage;
        const endIndex = startIndex + cardsPerPage;
        const visibleCards = filteredCards.slice(startIndex, endIndex);

        allCards.forEach((card) => card.style.display = "none"); // Hide all cards initially
        visibleCards.forEach((card) => card.style.display = "block"); // Show only the filtered cards
        renderPagination(filteredCards);
    }

    // Function to render pagination buttons
    function renderPagination(filteredCards) {
        pagination.innerHTML = "";
        const totalPages = Math.ceil(filteredCards.length / cardsPerPage);

        if (filteredCards.length <= cardsPerPage) {
            pagination.style.display = "none";
            return;
        } else {
            pagination.style.display = "flex";
        }

        const prevButton = document.createElement("button");
        const prevImage = document.createElement("img");
        prevImage.src = `${theme_vars.template_dir}/images/prev-arrow.svg`;
        prevImage.alt = "Previous";
        prevButton.appendChild(prevImage);
        prevButton.classList.add("pagination-prev");
        prevButton.disabled = currentPage === 1;
        prevButton.addEventListener("click", () => {
            currentPage--;
            renderCards(currentPage, filteredCards);
        });
        pagination.appendChild(prevButton);

        const totalPagesButtons = Math.min(totalPages, window.innerWidth <= 680 ? 3 : 6);
        let pageButtons = [];

        if (totalPages <= totalPagesButtons) {
            for (let i = 1; i <= totalPages; i++) {
                pageButtons.push(i);
            }
        } else {
            if (currentPage <= 2) {
                pageButtons = [1, 2, 3, "...", totalPages];
            } else if (currentPage >= totalPages - 1) {
                pageButtons = [1, "...", totalPages - 2, totalPages - 1, totalPages];
            } else {
                pageButtons = [1, "...", currentPage - 1, currentPage, currentPage + 1, "...", totalPages];
            }
        }

        pageButtons.forEach((button) => {
            const pageButton = document.createElement("button");
            if (button === "...") {
                pageButton.textContent = "...";
                pageButton.disabled = true;
            } else {
                pageButton.textContent = button;
                pageButton.classList.toggle("active", button === currentPage);
                pageButton.addEventListener("click", () => {
                    currentPage = button;
                    renderCards(currentPage, filteredCards);
                });
            }
            pagination.appendChild(pageButton);
        });

        const nextButton = document.createElement("button");
        const nextImage = document.createElement("img");
        nextImage.src = `${theme_vars.template_dir}/images/black-cta-arrow.svg`;
        nextImage.alt = "Next";
        nextButton.appendChild(nextImage);
        nextButton.classList.add("pagination-next");
        nextButton.disabled = currentPage === totalPages;
        nextButton.addEventListener("click", () => {
            currentPage++;
            renderCards(currentPage, filteredCards);
        });
        pagination.appendChild(nextButton);
    }

    // Function to filter cards based on search query
    function filterCardsBySearch(query = "") {
        const cards = getCards();
        return cards.filter((card) => {
            const title = card.querySelector(".cardContent h3").textContent.toLowerCase();
            const description = card.querySelector(".cardContent p").textContent.toLowerCase();
            const tag = card.querySelector(".cardContent .tag").textContent.toLowerCase();

            return title.includes(query.toLowerCase()) || description.includes(query.toLowerCase()) || tag.includes(query.toLowerCase());
        });
    }

    // Function to filter cards based on category (tab)
    function filterCardsByCategory(filter = "all") {
        const cards = getCards();
        return cards.filter((card) => {
            const category = card.getAttribute("data-category");
            return filter === "all" || category === filter;
        });
    }

    // Combined function to handle both search and category filter
    function filterCards(query = "", filter = "all") {
        const filteredByCategory = filterCardsByCategory(filter);
        const filteredCards = filterCardsBySearch(query).filter((card) => {
            return filteredByCategory.includes(card);
        });

        renderCards(currentPage, filteredCards);
    }

    // Handle tab switching for category filters
    tabs.forEach((tab) => {
        tab.addEventListener("click", (e) => {
            e.preventDefault();
            tabs.forEach((t) => t.classList.remove("active"));
            tab.classList.add("active");

            const filter = tab.getAttribute("data-filter");
            activeTabFilter = filter; // Store the active tab filter
            const query = searchInput.value.trim(); // Get the current search query
            filterCards(query, filter); // Apply both search query and active tab filter
        });
    });

    // Handle real-time search input changes
    searchInput.addEventListener("input", (e) => {
        const query = e.target.value.trim();
        filterCards(query, activeTabFilter); // Apply the current search query and the active tab filter
    });

    // Resize event for pagination adjustment
    window.addEventListener("resize", () => {
        cardsPerPage = getCardsPerPage();
        renderCards(currentPage); // Re-render cards when window is resized
    });

    // Initial card render
    renderCards(currentPage);
});

</script>
