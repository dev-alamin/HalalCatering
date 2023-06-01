<?php
    $data = getData();
?>

<footer>
    <div class="container">
        <div class="footer-des">
            <?php if( !empty( $data['footer_logo'] ) ): ?>
                <a href="<?php echo the_permalink(); ?>" class="logo"><img src="<?php echo wp_get_attachment_image_url($data['footer_logo'],'full'); ?>" alt="<?php the_title(); ?>"></a>
            <?php endif; ?>
            <?php if( !empty( $data['footer_short_des'] ) ): ?>
                <p>
                    <?php echo $data['footer_short_des']; ?>
                </p>
            <?php endif; ?>
            <!-- <form action="">
                <input type="text" placeholder="Enter Email">
                <button type="submit">Subscriber</button>
            </form> -->

            <?php if( !empty( $data['copyright'] ) ): ?>
                <p class="copyright">
                    &copy; <?php echo date('Y'); ?> <?php echo $data['copyright']; ?>
                </p>
            <?php endif; ?>
        </div>
    </div>
</footer>