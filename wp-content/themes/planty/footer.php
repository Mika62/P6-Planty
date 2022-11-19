    </main>
    <!-- /Main -->

    <!-- Footer -->
    <footer id="footer" class="footer
        <?php if (($id = get_the_ID()) === 13): ?>
            footer--drawn
        <?php elseif ($id === 87): ?>
            footer--colored footer--drawn
        <?php endif; ?>
    ">
        <a href="#" class="footer__link">Mentions légales</a>
    </footer>
    <!-- /Footer -->

    <?php wp_footer() ?>
</body>
</html>