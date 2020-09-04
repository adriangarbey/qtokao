<?php

get_header();

?>
    <section id="page-header" class="page-header-404">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-head">
                        <div class="page-head-title">
                            <h1>404</h1>
                        </div>
                            <div class="page-head-description text-center">
                                <p>Page not found. Go to <a href="<?php echo esc_url(home_url('/')); ?>" title="Home">Home page</a> or select another page from main menu.</p>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
get_footer();
