<?php get_header(); /*Template name: resources*/ ?>

<section class="resourceBannerSec">
    <div class="secWrapper">
        <div class="secHeading">
            <h1>EV knowledge hub</h1>
            <p>Your go-to source for insights, tools, and the latest in e-mobility</p>
        </div>
        <div class="filterTabs">
            <div class="tabBox">
                <ul>
                    <li><button class="tab tabActive" data-filter="news">News</button></li>
                    <li><button class="tab tabActive" data-filter="news">Manuals & Brochures</button></li>
                    <li><button class="tab tabActive" data-filter="news">Blogs</button></li>
                    <li><button class="tab tabActive" data-filter="news">FAQs</button></li>
                </ul>
            </div>
            <div class="searchBox" id="searchBox">
                <input type="text" name="blogSearch" id="blogSearch" placeholder="Search here...">
                <button>
                    <img src="<?php bloginfo('template_directory'); ?>/images/search-icon.svg" alt="Search Icon" />
                </button>
            </div>
        </div>
    </div>
</section>


<?php get_footer(); ?>