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
            <input type="search" placeholder="Search here">
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
                                echo (strlen($title) > 50) ? substr($title, 0, 50) . '...' : $title; 
                            ?></h3>
                            <p><?php echo get_the_date('d M Y'); ?> • <?php echo estimate_reading_time(get_the_ID()); ?> mins read</p>
                        </div>
                        <div class="redirectArrow">
                            <img src="<?php bloginfo('template_directory'); ?>/images/right-arrow.svg" alt="">
                        </div>
                    </div>
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
    const searchInput = document.querySelector(".searchWrapper input[type='search']");
    const noPostsMessage = document.createElement("p");
    noPostsMessage.textContent = "No posts found.";
    noPostsMessage.classList.add("no-posts-message");
    noPostsMessage.style.display = "none"; // Hidden by default
    cardGrid.appendChild(noPostsMessage); // Append message to card grid

    // Select all `.cards` inside `.cardGrid`
    let cards = Array.from(cardGrid.querySelectorAll(".cards"));

    // Function to get the number of cards per page based on screen width
    function getCardsPerPage() {
        return window.innerWidth < 680 ? 4 : 6; 
    }

    let cardsPerPage = getCardsPerPage();
    let currentPage = 1;

    // Function to render cards for the current page
    function renderCards(page, filteredCards = cards) {
        cardGrid.innerHTML = "";
        
        // If no cards are found, display the message
        if (filteredCards.length === 0) {
            noPostsMessage.style.display = "block";
            cardGrid.appendChild(noPostsMessage);
            pagination.style.display = "none"; 
            return;
        } else {
            noPostsMessage.style.display = "none";
        }

        const startIndex = (page - 1) * cardsPerPage;
        const endIndex = startIndex + cardsPerPage;
        const visibleCards = filteredCards.slice(startIndex, endIndex);

        visibleCards.forEach((card) => {
            cardGrid.appendChild(card);
        });

        renderPagination(filteredCards);
    }

    // Function to render pagination buttons
    function renderPagination(filteredCards) {
        pagination.innerHTML = ""; 
        const totalPages = Math.ceil(filteredCards.length / cardsPerPage);

        if (totalPages <= 1) {
            pagination.style.display = "none";
            return;
        } else {
            pagination.style.display = "flex";
        }

        // Add "Previous" button
        const prevButton = document.createElement("button");
        prevButton.textContent = "Prev";
        prevButton.disabled = currentPage === 1;
        prevButton.addEventListener("click", () => {
            currentPage--;
            renderCards(currentPage, filteredCards);
        });
        pagination.appendChild(prevButton);

        // Add "Next" button
        const nextButton = document.createElement("button");
        nextButton.textContent = "Next";
        nextButton.disabled = currentPage === totalPages;
        nextButton.addEventListener("click", () => {
            currentPage++;
            renderCards(currentPage, filteredCards);
        });
        pagination.appendChild(nextButton);
    }

    // Function to filter cards based on tab or search input
    function filterCards(query = "", filter = "all") {
        const filteredCards = cards.filter((card) => {
            const title = card.querySelector(".cardContent h3").textContent.toLowerCase();
            const category = card.getAttribute("data-category");

            const matchesFilter = filter === "all" || category === filter;
            const matchesQuery = title.includes(query.toLowerCase());

            return matchesFilter && matchesQuery;
        });

        currentPage = 1; 
        renderCards(currentPage, filteredCards);
    }

    // Tab Click Event
    tabs.forEach((tab) => {
        tab.addEventListener("click", (e) => {
            e.preventDefault();
            tabs.forEach((t) => t.classList.remove("active"));
            tab.classList.add("active");
            const filter = tab.getAttribute("data-filter");
            filterCards(searchInput.value.trim(), filter);
        });
    });

    // Search Event
    searchInput.addEventListener("input", (e) => {
        const query = e.target.value.trim();
        const activeFilter = document.querySelector(".blogsTabWrapper a.active").getAttribute("data-filter");
        filterCards(query, activeFilter);
    });

    // Window Resize Event
    window.addEventListener("resize", () => {
        cardsPerPage = getCardsPerPage();
        renderCards(currentPage);
    });

    // Initial Load
    renderCards(currentPage);
});

</script>
