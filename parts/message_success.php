<?php if (isset($_SESSION["success"])): ?>
          <div class="alert alert-success" role="alert">
                    <?php echo $_SESSION["success"]; ?>
                    <?php
                        // clear succuss message after rendering it
                        unset( $_SESSION["success"] );
                    ?>
                </div>
        <?php endif; ?>