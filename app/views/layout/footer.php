<?php
$footerData = explode('|', $layoutModel->getLayout('footer'));

$copyright = trim($footerData[0] ?? '');
$ig        = trim($footerData[1] ?? '');
$tw        = trim($footerData[2] ?? '');
$yt        = trim($footerData[3] ?? '');
$slogan    = trim($footerData[4] ?? '');
?>
    </div>
</main>

<!-- ================= FOOTER ================= -->
<footer class="app-footer">
    <div class="container">
        <div class="row align-items-center text-center text-md-start">

            <div class="col-md-4 small">
                <div><?= $ig ?></div>
                <div><?= $tw ?></div>
                <div><?= $yt ?></div>
            </div>

            <div class="col-md-4 small text-center my-2 my-md-0">
                <?= $copyright ?>
            </div>

            <div class="col-md-4 small fst-italic text-md-end">
                <?= $slogan ?>
            </div>

        </div>
    </div>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
