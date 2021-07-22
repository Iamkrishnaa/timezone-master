<?php

function showModal($title, $content, $isSecondaryButton, $secondaryButtonLabel, $secondaryButtonScript)
{
?>
    <!-- Modal -->
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <?php echo '<b><h3 class="modal-title">' . $title . "</h3></b>" ?>
                </div>
                <div class="modal-body">
                    <?php echo "<b><h4>" . $content . "</h4></b>" ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <?php
                    if ($isSecondaryButton === true) {
                    ?>
                        <button type="button" onsubmit="modalScript();" class="btn btn-primary"><?php echo $secondaryButtonLabel ?></button>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>


    <script>
        $("#modal").modal('show');
    </script>
    <script>
        <?php echo $secondaryButtonScript; ?>
    </script>
<?php
}
