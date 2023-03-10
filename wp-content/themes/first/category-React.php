<?php get_header() ?>

<main class="container mt-3">
    <div class="row">
        <aside class="col-3">
            <h2 class="fs-4">filtrer les resultats :</h2>
            <form>
                <input type="date" name="date" class="form-control mb-3">
                <select name="order" class="form-select">
                    <option value="">choisir</option>
                    <option value="ASC">date croissante</option>
                    <option value="DESC">date décroissante</option>
                </select>
                <input type="submit" class="btn btn-primary mt-3 btn-sm" value="trier">
            </form>
            <?php $query =  get_article_filtered_by_date("React") ?>
        </aside>
        <div class="col">
            <?php // var_dump($query) 
            ?>
            <div class="row">
                <?php while ($query->have_posts()) : ?>
                    <?php $query->the_post() ?>
                    <div class="col-6 mb-4">
                        <h2><?php the_title() ?></h2>
                        <div class="d-flex justify-content-between">
                            <p>⌚ : <?php the_date() ?></p>
                            <p>🚒 : <?php the_author() ?></p>
                        </div>
                        <?php edit_post_link("modifier", "<div>", "</div>") ?>
                        <?php the_post_thumbnail("large", ["class" => "img-fluid"]) ?>
                        <div>
                            <?php the_excerpt() ?>
                        </div>
                        <?= categorie_badge(get_the_ID())  ?>
                    </div>
                    <?php wp_reset_postdata(); ?><!--  libérer la mémoire si j'ai besoin de faire une requête WP_Query() supplémentaire après -->
                <?php endwhile ?>
            </div>
        </div>
    </div>
</main>
<?php get_footer() ?>