<?php
  /** Template Name: HomePage */  
    get_header();
?>

<?php
//GET ACF FIELDS FOR HOMEPAGE
$slug = 'homepage-acf';
$post = get_page_by_path( $slug, OBJECT, 'post' ); 
// var_dump($post);
// die();

if( $post ) {
    $post_id = $post->ID;
    //$post_id to get ACF fields
    $hero_title = get_field('titre_principal', $post_id);
    $hero_description = get_field('paragraphe_intro', $post_id);
    $hero_button_text = get_field('bouton_cta_link', $post_id) ? get_field('bouton_cta_link', $post_id)["title"] : "" ;
    $hero_button_link = get_field('bouton_cta_link', $post_id) ? get_field('bouton_cta_link', $post_id)["url"] : "";
    $hero_image = get_field('image_illustrative', $post_id);
    // die($hero_button_text);

    $vous_etes = get_field('vous_etes', $post_id);
    $questions = get_field('questions', $post_id);
} else {
    // Handle the case where the post is not found
    $hero_title = '';
    $hero_description = '';
    $hero_button_text = '';
    $hero_button_link = '';
    $hero_image = '';  
}

?>

  <main>
    <!-- Section Hero -->
    <section class="hero-section position-relative overflow-hidden">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/path.png" class="path" alt="">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/Intersect.png" class="intra" alt="">
        <div class="container-fluid">
            <div class="row align-items-center min-vh-75">
                <div class="col-lg-7">
                    <div class="hero-content ps-lg-5">
                      
                        <h1 class="hero-title mb-4">
                            <?php echo esc_html( $hero_title ); ?></p>
                        </h1>
                        <p class="lead text-muted mb-4">
                            <?php echo esc_html( wp_strip_all_tags( $hero_description ) ); ?>
                        </p>
                        <a href="#expertises" class="btn btn-expertise" href="<?php echo esc_url( $hero_button_link ); ?>" target="_blank" rel="noopener">
                            <?php echo esc_html( $hero_button_text ); ?>

                            <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="hero-image position-relative">
                        <div class="hero-shapes">
                            <div class="shape-plus"></div>
                            <div class="shape-rectangle"></div>
                        </div>
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/plus.png" class="plus" alt="">
                        <img src="<?php echo esc_url( $hero_image ); ?>" alt="Équipe professionnelle" class="img-fluid rounded-3 shadow-lg">  
                    </div>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/path194.png" class="p194" alt="">    
                </div>
            </div>
        </div>
    </section>

    <!-- Section Vous êtes -->
    <section id="vous-etes" class="py-5 bg-light">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12">
                    <h2 class="h2">Vous <span>êtes</span></h2>
                </div>
            </div>
            
            <!-- Carousel Bootstrap 5 -->
            <div id="categoriesCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <!-- Slide 1 -->
                    <div class="carousel-item active">
                        <div class="row g-4">
                            <?php
                            foreach($vous_etes as $vous):
                                if(!$vous) continue;
                                $post_id = $vous->ID;
                                $title = get_the_title($vous);
                                $button_text = get_field('lien', $post_id) ? get_field('lien', $post_id)["title"] : "" ;
                                $button_link = get_field('lien', $post_id) ? get_field('lien', $post_id)["url"] : "";
                                $image = get_the_post_thumbnail_url( $post_id, 'full');
                            ?>
                                <div class="col-md-6 col-lg-3">
                                    <div class="card h-100 border-0 shadow-sm">
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title text-primary"><?php echo esc_html($title); ?></h5>
                                            <div class="mt-auto">
                                                <a href="<?php echo esc_url($button_link); ?>" class="btn btn-outline-primary">
                                                    <span><?php echo esc_html($button_text); ?></span>
                                                    <i class="fas fa-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="card-img-wrapper">
                                            <img src="<?php echo esc_url($image); ?>" 
                                                class="card-img-top" 
                                                alt="<?php echo esc_attr($title); ?>">
                                        </div>
                                    </div>
                                </div>
                            <?php
                            endforeach;
                            ?>
                        </div>
                    </div>
                    <!-- <div class="carousel-item">
                        <div class="row g-4">
                            
                            <div class="col-md-6 col-lg-3">
                                <div class="card h-100 border-0 shadow-sm">
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title text-primary">Gestionnaire de copropriété</h5>
                                        <div class="mt-auto">
                                            <a href="#" class="btn btn-outline-primary">
                                                <span>En savoir plus</span>
                                                <i class="fas fa-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-img-wrapper">
                                        <img src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                                             class="card-img-top" 
                                             alt="Gestionnaire de copropriété">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="card h-100 border-0 shadow-sm">
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title text-primary">Entreprise générale et promoteurs</h5>
                                        <div class="mt-auto">
                                            <a href="#" class="btn btn-outline-primary">
                                                <span>En savoir plus</span>
                                                <i class="fas fa-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-img-wrapper">
                                        <img src="https://images.unsplash.com/photo-1541888946425-d81bb19240f5?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                                             class="card-img-top" 
                                             alt="Entreprise générale et promoteurs">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="card h-100 border-0 shadow-sm">
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title text-primary">Établissement de santé</h5>
                                        <div class="mt-auto">
                                            <a href="#" class="btn btn-outline-primary">
                                                <span>En savoir plus</span>
                                                <i class="fas fa-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-img-wrapper">
                                        <img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1f?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                                             class="card-img-top" 
                                             alt="Établissement de santé">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="card h-100 border-0 shadow-sm">
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title text-primary">Établissement public</h5>
                                        <div class="mt-auto">
                                            <a href="#" class="btn btn-outline-primary">
                                                <span>En savoir plus</span>
                                                <i class="fas fa-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-img-wrapper">
                                        <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                                             class="card-img-top" 
                                             alt="Établissement public">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/Frame1.png" class="frame" alt="">
                </div>
                
                <!-- Contrôles du carousel -->
                <button class="carousel-control-prev" type="button" data-bs-target="#categoriesCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon rounded-circle p-3"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#categoriesCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon rounded-circle p-3"></span>
                </button>
            </div>
        </div>
    </section>

    <!-- Section FAQ -->
    <section class="faq-section py-5 position-relative">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/path206.png" class="a-img" alt="">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-5 d-flex align-items-center">
                    <div class="faq-intro position-relative ps-lg-5">
                        <div class="faq-shape"></div>
                        <h2 class="h2">Questions <span>fréquentes</span></h2>
                        <p class="lead text-muted mb-4">
                            Tal est in sini hre dolore fugiat qui praesentium accusantium
                            corrupti dolore est dolore fugiat qui praesentium accusantium
                            corrup dolore nemo fugiat in dolore fugtlat qui praesentium
                            accusantium fault aut seq tan do lorem uke dolor ut mollit
                            laudant lorem. Ut enim ad minim veniam, quis nostrud et
                            shuis dolore est tentur officia. Excepteur sint occaecat cupidatat
                        </p>
                        <a href="#expertises" class="btn btn-expertise">
                            Voir toutes les FAQ
                            <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="faq-image-wrapper position-relative">
                        <div class="faq-accordion-wrapper">
                            <div class="accordion" id="faqAccordion">
                                <?php
                                foreach($questions as $key => $question):
                                    if(!$question) continue;
                                    $post_id = $question->ID;
                                    $title = get_the_title($question);
                                    $reponse =  wp_strip_all_tags( get_field('reponse', $post_id) );
                                    $category = get_the_category( $post_id ) ? get_the_category( $post_id )[0] : [];

                                ?>
                                <div class="accordion-item border-0 rounded-3 mb-3 shadow-sm">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button bg-warning text-dark fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#faq<?php echo esc_attr($key+1); ?>">
                                            <span class="badge bg-warning text-dark me-3"><?php echo esc_html($category->name); ?></span>
                                            <?php echo esc_html($title); ?>
                                        </button>
                                    </h2>
                                    <div id="faq<?php echo esc_attr($key+1); ?>" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                        <div class="accordion-body">
                                            <?php echo esc_html($reponse); ?>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                endforeach;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  </main>
  
<?php
    get_footer();
?>
