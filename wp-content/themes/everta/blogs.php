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
                            <?php $count = 0; while (have_rows('resources_tabs')) : the_row(); ?>
                                <?php 
                                    $tab_link = get_sub_field('tab_link');
                                    $tab_text = get_sub_field('tab_text');
                                if ($tab_link && $tab_text) : ?>
                                    <a href="<?php echo $tab_link; ?>" class="<?php echo ($count == 2) ? 'active' : ''; ?>">
                                        <?php echo $tab_text; ?>
                                    </a>
                                <?php endif; ?>                    
                            <?php $count++; endwhile; ?>
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
                <!-- Gitsy -->
                <?php
                    $terms = get_categories("categories");
                    foreach ( $terms as $term ) {
                        $termname[] = $term->name;
                    }
                    $termnameunique = array_values(array_unique($termname));
                    for($i=0;$i<count($termnameunique);$i++){
                ?>
                    <a href="#" data-filter="<?php echo strtolower($termnameunique[$i]); ?>"><?php echo strtolower($termnameunique[$i]); ?></a>
                <?php
                    }
                ?>
            </div>
        </div>
        <div class="cardGrid" id="cardGrid">
            <?php $args = array('post_type' => 'post', 'posts_per_page' => -1, 'order' => 'DESC');
                $the_query = new WP_Query($args);
                while ($the_query->have_posts()) : $the_query->the_post();
                $terms = get_the_terms($post->ID, 'category');
                if ($terms && ! is_wp_error($terms)) :
                    $links = array();
                    foreach ($terms as $term) {
                        $links[] = $term->name;
                    }
                    $tax_links = join(",", array_map('strtolower', $links)); // Changed from space to comma
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
                    <span class="tag">
                        <?php
                            $category_detail = get_the_category($post->ID); //$post->ID
                            foreach ($category_detail as $cd) {
                                $nm = $cd->cat_name;
                                echo ' ';
                            }
                            echo $category_detail[0]->name;
                        ?>
                    </span>
                    <div class="cardInfo">
                        <div class="cardTypo">
                            <h3><?php $title = get_the_title(); echo (strlen($title) > 50) ? substr($title, 0, 40) . '...' : $title; ?></h3>
                            <p><?php echo get_the_date('d M Y'); ?> • <?php echo estimate_reading_time(get_the_ID()); ?> mins read</p>
                        </div>
                    </div>
                </div>
                <div class="redirectArrow">
                    <i class="icon-right-arrow  rotateRightArrow"></i>
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
    cardGrid.appendChild(noPostsMessage);
    noPostsMessage.style.display = "none";

    function getCards() {
        return Array.from(cardGrid.querySelectorAll(".cards"));
    }

    function getCardsPerPage() {
        return window.innerWidth < 680 ? 4 : 6;
    }

    let cardsPerPage = getCardsPerPage();
    let currentPage = 1;
    let activeTabFilter = "all"; 

    function renderCards(page, filteredCards = getCards()) {
        const allCards = getCards();
        const startIndex = (page - 1) * cardsPerPage;
        const endIndex = startIndex + cardsPerPage;
        const visibleCards = filteredCards.slice(startIndex, endIndex);

        allCards.forEach((card) => card.style.display = "none");
        visibleCards.forEach((card) => card.style.display = "block");

        if (filteredCards.length === 0) {
            noPostsMessage.style.display = "block";
            pagination.style.display = "none";
        } else {
            noPostsMessage.style.display = "none";
            renderPagination(filteredCards);
        }
    }

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
        prevButton.disabled = currentPage === 1;
        prevButton.addEventListener("click", () => {
            currentPage--;
            renderCards(currentPage, filteredCards);
        });
        pagination.appendChild(prevButton);

        for (let i = 1; i <= totalPages; i++) {
            const pageButton = document.createElement("button");
            pageButton.textContent = i;
            pageButton.classList.toggle("active", i === currentPage);
            pageButton.addEventListener("click", () => {
                currentPage = i;
                renderCards(currentPage, filteredCards);
            });
            pagination.appendChild(pageButton);
        }

        const nextButton = document.createElement("button");
        const nextImage = document.createElement("img");
        nextImage.src = `${theme_vars.template_dir}/images/black-cta-arrow.svg`;
        nextImage.alt = "Next";
        nextButton.appendChild(nextImage);
        nextButton.disabled = currentPage === totalPages;
        nextButton.addEventListener("click", () => {
            currentPage++;
            renderCards(currentPage, filteredCards);
        });
        pagination.appendChild(nextButton);
    }

    function filterCardsBySearch(query = "") {
        return getCards().filter((card) => {
            const title = card.querySelector(".cardContent h3").textContent.toLowerCase();
            return title.includes(query.toLowerCase());
        });
    }

    function filterCardsByCategory(filter = "all") {
    return getCards().filter((card) => {
        const categories = card.getAttribute("data-category").split(","); // Changed from space to comma
        return filter === "all" || categories.includes(filter);
    });
}

    function filterCards(query = "", filter = "all") {
        const filteredByCategory = filterCardsByCategory(filter);
        const filteredCards = filterCardsBySearch(query).filter((card) => filteredByCategory.includes(card));
        currentPage = 1;
        renderCards(currentPage, filteredCards);
    }

    tabs.forEach((tab) => {
        tab.addEventListener("click", (e) => {
            e.preventDefault();
            tabs.forEach((t) => t.classList.remove("active"));
            tab.classList.add("active");
            activeTabFilter = tab.getAttribute("data-filter");
            filterCards(searchInput.value.trim(), activeTabFilter);
        });
    });

    searchInput.addEventListener("input", (e) => {
        filterCards(e.target.value.trim(), activeTabFilter);
    });

    window.addEventListener("resize", () => {
        cardsPerPage = getCardsPerPage();
        renderCards(currentPage);
    });

    renderCards(currentPage);
});

</script>
